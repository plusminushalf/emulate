<?php
/**
 * Created by PhpStorm.
 * User: garvit
 * Date: 6/11/14
 * Time: 11:34 PM
 */

namespace project\emulate\Emulators\Emulate8086\Src\Domain\Model\Commands;

use TYPO3\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;
use project\emulate\Emulators\Emulate8086\Src\Domain\Model\CommandInterface;

class DEC implements CommandInterface {

    /**
     * @var \project\emulate\Emulators\Emulate8086\Src\Domain\Repository\MemoryRepository
     * @Flow\Inject
     */
    protected $memoryRepository;

    /**
     * @var \project\emulate\Emulators\Emulate8086\Src\Domain\Model\Memory
     */
    protected $memory;

    /**
     * user session
     * @var \project\emulate\Domain\Model\User
     * @Flow\Inject
     */
    protected $user;

    /**
     * @var \project\emulate\Emulators\Emulate8086\Src\Domain\Model\Validator
     * @Flow\Inject
     */
    protected $validator;

    /**
     * Controller
     * @var \project\emulate\Emulators\Emulate8086\Src\Controllers\StandardController
     * @Flow\Inject
     */
    protected $controller;

    /**
     * operand1 extracted from line
     * @var string
     */
    protected $operand1;

    /**
     * operand1 extracted from line
     * @var string
     */
    protected $operand1Type;

    /**
     * operand2 extracted from line
     * @var \project\emulate\Emulators\Emulate8086\Src\Domain\Model\Flags
     */
    protected $flags;

    /**
     * Errors that occured during processing
     * @var string
     */
    public $error = '';

    /**
     * Injects Memory Repository and Memory for the specific user
     * @param  \project\emulate\Emulators\Emulate8086\Src\Domain\Repository\MemoryRepository $memoryRepository
     * @return void
     */
    public function initializeObject() {
        $this->memory = $this->memoryRepository->getMemory($this->user->getUserAccount()->getUsername())->getFirst();
    }

    /**
     * executes the command with given parameters.
     * @param  string $operand1
     * @param  string $operand2
     * @return boolean|int|array true if executed successfully, false on software interept, -1 if problem occurs arrar for jump
     */
    public function execute($operand1, $operand2) {
        $this->operand1 = $operand1;
        $this->operand1Type = $this->validator->getType($operand1);
        $this->flags = $this->memory->getFlags();
        return $this->getFunctionToExecute();
    }

    /**
     * @param int $value
     */
    protected function setFlags($value) {
        $flags = $this->memory->getFlags();
        if($value == 0) $flags->setZero(1);
        else $flags->setZero(0);
        if($value > 0xffff) $flags->setOverflow(1);
        else $flags->setOverflow(0);
        if($value < 0) $flags->setSign(1);
        else $flags->setSign(0);
        try {
            $this->memory->setFlags($flags);
            $this->memoryRepository->update($this->memory);
        } catch(\TYPO3\Flow\Persistence\Exception\IllegalObjectTypeException $e) {
            throw $e;
        }
    }

    /**
     * executes the specifuc function and returns it's result
     * @return boolean
     */
    protected function getFunctionToExecute() {
        switch ($this->operand1Type) {
            case 1:
                return $this->regDec();
                break;
            case 2:
                return $this->reg8bitDec();
                break;
            case 6:
                return $this->memoryDec();
                break;
            default:
                return -1;
                break;
        }
    }

    /**
     * Decrease memory block's value.
     * @return bool|int
     */
    protected function memoryDec() {
        $this->operand1 = substr($this->operand1, 1, -1);
        $type = $this->validator->getType($this->operand1);
        if($type == 1) {
            //register
            $offset = json_decode($this->controller->getRegisterValueAction(["register"=> $this->operand1]), true)['value'];
            $value = json_decode($this->controller->getMemoryValueAction(["segment"=> 0x1000, "offset"=> hexdec($offset)]), true)['value'];
            $value = hexdec($value);
            $this->controller->setMemoryValueAction(["segment"=> 0x1000, "offset"=> $offset, "value"=>$value - 1]);
            return true;
        } elseif($type == 4 || $type == 5) {
            //immediate
            $value = json_decode($this->controller->getMemoryValueAction(["segment"=> 0x1000, "offset"=> $this->operand1]), true)['value'];
            $value = hexdec($value);
            $this->controller->setMemoryValueAction(["segment"=> 0x1000, "offset"=> hexdec($this->operand1), "value"=>$value - 1]);
            $this->setFlags($value - 1);
            return true;
        }
        return -1;
    }

    /**
     * Register Decrement
     * @return bool
     */
    protected function regDec() {
        $value = json_decode($this->controller->getRegisterValueAction(["register"=>$this->operand1]), true)['value'];
        $value = hexdec($value);
        $this->controller->setRegisterValueAction([ "register"=> $this->operand1, "value"=> $value-1]);
        $this->setFlags($value - 1);
        return true;
    }

    /**
     * register bit Decrement
     * @return bool|int
     */
    protected function reg8bitDec() {
        switch ($this->operand1) {
            case 'AH':
                $register = 'AX';
                $value = json_decode($this->controller->getRegisterValueAction(["register"=> $register]), true)['value'];
                $c = 4 - strlen($value);
                while ($c--) {
                    $value = '0' . $value;
                }
                $valueMSB = hexdec(substr($value, 0, 2));
                $valueMSB = dechex($valueMSB - 1);
                $value = $valueMSB . substr($value, 2);
                $this->controller->setRegisterValueAction([ "register"=> $register, "value"=> $value]);
                $this->setFlags($value);
                return true;
                break;
            case 'AL':
                $register = 'AX';
                $value = json_decode($this->controller->getRegisterValueAction(["register"=> $register]), true)['value'];
                $value = hexdec($value);
                $this->controller->setRegisterValueAction([ "register"=> $register, "value"=> $value-1]);
                $this->setFlags($value - 1);
                return true;
                break;
            case 'BH':
                $register = 'BX';
                $value = json_decode($this->controller->getRegisterValueAction(["register"=> $register]), true)['value'];
                $c = 4 - strlen($value);
                while ($c--) {
                    $value = '0' . $value;
                }
                $valueMSB = hexdec(substr($value, 0, 2));
                $valueMSB = dechex($valueMSB - 1);
                $value = $valueMSB . substr($value, 2);
                $this->controller->setRegisterValueAction([ "register"=> $register, "value"=> $value]);
                $this->setFlags($value);
                return true;
                break;
            case 'BL':
                $register = 'BX';
                $value = json_decode($this->controller->getRegisterValueAction(["register"=> $register]), true)['value'];
                $value = hexdec($value);
                $this->controller->setRegisterValueAction([ "register"=> $register, "value"=> $value-1]);
                $this->setFlags($value - 1);
                return true;
                break;
            case 'CH':
                $register = 'CX';
                $value = json_decode($this->controller->getRegisterValueAction(["register"=> $register]), true)['value'];
                $c = 4 - strlen($value);
                while ($c--) {
                    $value = '0' . $value;
                }
                $valueMSB = hexdec(substr($value, 0, 2));
                $valueMSB = dechex($valueMSB - 1);
                $value = $valueMSB . substr($value, 2);
                $this->controller->setRegisterValueAction([ "register"=> $register, "value"=> $value]);
                $this->setFlags($value);
                return true;
                break;
            case 'CL':
                $register = 'CX';
                $value = json_decode($this->controller->getRegisterValueAction(["register"=> $register]), true)['value'];
                $value = hexdec($value);
                $this->controller->setRegisterValueAction([ "register"=> $register, "value"=> $value-1]);
                $this->setFlags($value - 1);
                return true;
                break;
            case 'DH':
                $register = 'DX';
                $value = json_decode($this->controller->getRegisterValueAction(["register"=> $register]), true)['value'];
                $c = 4 - strlen($value);
                while ($c--) {
                    $value = '0' . $value;
                }
                $valueMSB = hexdec(substr($value, 0, 2));
                $valueMSB = dechex($valueMSB - 1);
                $value = $valueMSB . substr($value, 2);
                $this->controller->setRegisterValueAction([ "register"=> $register, "value"=> $value]);
                $this->setFlags($value);
                return true;
                break;
            case 'DL':
                $register = 'DX';
                $value = json_decode($this->controller->getRegisterValueAction(["register"=> $register]), true)['value'];
                $value = hexdec($value);
                $this->controller->setRegisterValueAction([ "register"=> $register, "value"=> $value-1]);
                $this->setFlags($value - 1);
                return true;
                break;
            default:
                $this->error = "{$this->operand1} is not correct operand for DEC instruction";
                return -1;
        }
    }
}