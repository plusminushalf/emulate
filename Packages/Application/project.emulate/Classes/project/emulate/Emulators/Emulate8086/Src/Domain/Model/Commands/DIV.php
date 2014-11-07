<?php
/**
 * Created by PhpStorm.
 * User: garvit
 * Date: 7/11/14
 * Time: 9:17 AM
 */

namespace project\emulate\Emulators\Emulate8086\Src\Domain\Model\Commands;

use TYPO3\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;
use project\emulate\Emulators\Emulate8086\Src\Domain\Model\CommandInterface;

class DIV implements CommandInterface {

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
     * executes the specifuc function and returns it's result
     * @return boolean
     */
    protected function getFunctionToExecute() {
        switch ($this->operand1Type) {
            case 1:
                return $this->regDiv();
                break;
            case 2:
                return $this->reg8bitDiv();
                break;
            case 6:
                return $this->memoryDiv();
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
    protected function memoryDiv() {
        $this->operand1 = substr($this->operand1, 1, -1);
        $type = $this->validator->getType($this->operand1);
        $AX = hexdec(json_decode($this->controller->getRegisterValueAction(["register"=> "AX"]), true)['value']);
        if($type == 1) {
            //register
            $offset = json_decode($this->controller->getRegisterValueAction(["register"=> $this->operand1]), true)['value'];
            $value = json_decode($this->controller->getMemoryValueAction(["segment"=> 0x1000, "offset"=> $offset]), true)['value'];
            $value = hexdec($value);
            $AL = $AX / $value;
            $AH = $AX % $value;
            $AX = $AH . $AL;
            $this->controller->setRegisterValueAction([ "register"=> "AX", "value"=> $AX]);
            return true;
        } elseif($type == 4 || $type == 5) {
            //immediate
            $value = json_decode($this->controller->getMemoryValueAction(["segment"=> 0x1000, "offset"=> $this->operand1]), true)['value'];
            $value = hexdec($value);
            $AL = dechex($AX / $value);
            $c = 2 - strlen($AL);
            while($c--) {
                $AL = '0' . $AL;
            }
            $AH = dechex($AX % $value);
            $AX = $AH . $AL;
            $this->controller->setRegisterValueAction([ "register"=> "AX", "value"=> $AX]);
            return true;
        }
        return -1;
    }

    /**
     * Register Decrement
     * @return bool
     */
    protected function regDiv() {
        $AX = json_decode($this->controller->getRegisterValueAction(["register"=>"AX"]), true)['value'];
        $DX = json_decode($this->controller->getRegisterValueAction(["register"=>"DX"]), true)['value'];
        $c = 4 - strlen($AX);
        while($c--) {
            $AX = '0' . $AX;
        }
        $DXAX = hexdec($DX . $AX);
        $value = hexdec(json_decode($this->controller->getRegisterValueAction(["register"=>$this->operand1]), true)['value']);
        $AX = $DXAX / $value;
        $DX = $DXAX % $value;
        $this->controller->setRegisterValueAction([ "register"=> "AX", "value"=> $AX]);
        $this->controller->setRegisterValueAction([ "register"=> "DX", "value"=> $DX]);
        return true;
    }

    /**
     * register bit Decrement
     * @return bool|int
     */
    protected function reg8bitDiv() {
        switch ($this->operand1) {
            case 'AH':
                $register = 'AX';
                $value = json_decode($this->controller->getRegisterValueAction(["register"=> $register]), true)['value'];
                $AX = hexdec(json_decode($this->controller->getRegisterValueAction(["register"=> "AX"]), true)['value']);
                $c = 4 - strlen($value);
                while ($c--) {
                    $value = '0' . $value;
                }
                $valueMSB = hexdec(substr($value, 0, 2));
                $AL = $AX / $valueMSB;
                $c = 2 - strlen($AL);
                while($c--) {
                    $AL = '0' . $AL;
                }
                $AH = dechex($AX % $valueMSB);
                $value = $AH . $AL;
                $this->controller->setRegisterValueAction([ "register"=> 'AX', "value"=> hexdec($value)]);
                return true;
                break;
            case 'AL':
                $register = 'AX';
                $value = json_decode($this->controller->getRegisterValueAction(["register"=> $register]), true)['value'];
                $AX = hexdec(json_decode($this->controller->getRegisterValueAction(["register"=> "AX"]), true)['value']);
                $c = 4 - strlen($value);
                while ($c--) {
                    $value = '0' . $value;
                }
                $valueLSB = hexdec(substr($value, 2));
                $AL = $AX / $valueLSB;
                $c = 2 - strlen($AL);
                while($c--) {
                    $AL = '0' . $AL;
                }
                $AH = dechex($AX % $valueLSB);
                $value = $AH . $AL;
                $this->controller->setRegisterValueAction([ "register"=> 'AX', "value"=> hexdec($value)]);
                return true;
                break;
            case 'BH':
                $register = 'BX';
                $value = json_decode($this->controller->getRegisterValueAction(["register"=> $register]), true)['value'];
                $AX = hexdec(json_decode($this->controller->getRegisterValueAction(["register"=> "AX"]), true)['value']);
                $c = 4 - strlen($value);
                while ($c--) {
                    $value = '0' . $value;
                }
                $valueMSB = hexdec(substr($value, 0, 2));
                $AL = $AX / $valueMSB;
                $c = 2 - strlen($AL);
                while($c--) {
                    $AL = '0' . $AL;
                }
                $AH = dechex($AX % $valueMSB);
                $value = $AH . $AL;
                $this->controller->setRegisterValueAction([ "register"=> 'AX', "value"=> hexdec($value)]);
                return true;
                break;
            case 'BL':
                $register = 'BX';
                $value = json_decode($this->controller->getRegisterValueAction(["register"=> $register]), true)['value'];
                $AX = hexdec(json_decode($this->controller->getRegisterValueAction(["register"=> "AX"]), true)['value']);
                $c = 4 - strlen($value);
                while ($c--) {
                    $value = '0' . $value;
                }
                $valueLSB = hexdec(substr($value, 2));
                $AL = dechex($AX / $valueLSB);
                $c = 2 - strlen($AL);
                while($c--) {
                    $AL = '0' . $AL;
                }
                $AH = dechex($AX % $valueLSB);
                $value = $AH . $AL;
                $this->controller->setRegisterValueAction([ "register"=> 'AX', "value"=> hexdec($value)]);
                return true;
                break;
            case 'CH':
                $register = 'CX';
                $value = json_decode($this->controller->getRegisterValueAction(["register"=> $register]), true)['value'];
                $AX = hexdec(json_decode($this->controller->getRegisterValueAction(["register"=> "AX"]), true)['value']);
                $c = 4 - strlen($value);
                while ($c--) {
                    $value = '0' . $value;
                }
                $valueMSB = hexdec(substr($value, 0, 2));
                $AL = $AX / $valueMSB;
                $c = 2 - strlen($AL);
                while($c--) {
                    $AL = '0' . $AL;
                }
                $AH = dechex($AX % $valueMSB);
                $value = $AH . $AL;
                $this->controller->setRegisterValueAction([ "register"=> 'AX', "value"=> hexdec($value)]);
                return true;
                break;
            case 'CL':
                $register = 'CX';
                $value = json_decode($this->controller->getRegisterValueAction(["register"=> $register]), true)['value'];
                $AX = hexdec(json_decode($this->controller->getRegisterValueAction(["register"=> "AX"]), true)['value']);
                $c = 4 - strlen($value);
                while ($c--) {
                    $value = '0' . $value;
                }
                $valueLSB = hexdec(substr($value, 2));
                $AL = $AX / $valueLSB;
                $c = 2 - strlen($AL);
                while($c--) {
                    $AL = '0' . $AL;
                }
                $AH = dechex($AX % $valueLSB);
                $value = $AH . $AL;
                $this->controller->setRegisterValueAction([ "register"=> 'AX', "value"=> hexdec($value)]);
                return true;
                break;
            case 'DH':
                $register = 'DX';
                $value = json_decode($this->controller->getRegisterValueAction(["register"=> $register]), true)['value'];
                $AX = hexdec(json_decode($this->controller->getRegisterValueAction(["register"=> "AX"]), true)['value']);
                $c = 4 - strlen($value);
                while ($c--) {
                    $value = '0' . $value;
                }
                $valueMSB = hexdec(substr($value, 0, 2));
                $AL = $AX / $valueMSB;
                $c = 2 - strlen($AL);
                while($c--) {
                    $AL = '0' . $AL;
                }
                $AH = dechex($AX % $valueMSB);
                $value = $AH . $AL;
                $this->controller->setRegisterValueAction([ "register"=> 'AX', "value"=> hexdec($value)]);
                return true;
                break;
            case 'DL':
                $register = 'DX';
                $value = json_decode($this->controller->getRegisterValueAction(["register"=> $register]), true)['value'];
                $AX = hexdec(json_decode($this->controller->getRegisterValueAction(["register"=> "AX"]), true)['value']);
                $c = 4 - strlen($value);
                while ($c--) {
                    $value = '0' . $value;
                }
                $valueLSB = hexdec(substr($value, 2));
                $AL = $AX / $valueLSB;
                $c = 2 - strlen($AL);
                while($c--) {
                    $AL = '0' . $AL;
                }
                $AH = dechex($AX % $valueLSB);
                $value = $AH . $AL;
                $this->controller->setRegisterValueAction([ "register"=> 'AX', "value"=> hexdec($value)]);
                return true;
                break;
            default:
                $this->error = "{$this->operand1} is not correct operand for DEC instruction";
                return -1;
        }
    }
}