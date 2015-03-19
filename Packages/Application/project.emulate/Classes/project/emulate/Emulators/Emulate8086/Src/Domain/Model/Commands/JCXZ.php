<?php
/**
 * Created by PhpStorm.
 * User: garvit
 * Date: 7/11/14
 * Time: 9:03 PM
 */

namespace project\emulate\Emulators\Emulate8086\Src\Domain\Model\Commands;

use TYPO3\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;
use project\emulate\Emulators\Emulate8086\Src\Domain\Model\CommandInterface;

class JCXZ implements CommandInterface {

    /**
     * Controller
     * @var \project\emulate\Emulators\Emulate8086\Src\Controllers\StandardController
     * @Flow\Inject
     */
    protected $controller;

    /**
     * Errors that occured during processing
     * @var string
     */
    public $error = '';

    /**
     * executes the command with given parameters.
     * @param  string $operand1
     * @param  string $operand2
     * @return boolean|int|array true if executed successfully, false on software interept, -1 if problem occurs arrar for jump
     */
    public function execute($operand1, $operand2) {
        $CX = hexdec(json_decode($this->controller->getRegisterValueAction(["register"=> "CX"]), true)['value']);
        if($CX == 0) {
            return ["offset"=>$operand1];
        }
        return true;
    }
}