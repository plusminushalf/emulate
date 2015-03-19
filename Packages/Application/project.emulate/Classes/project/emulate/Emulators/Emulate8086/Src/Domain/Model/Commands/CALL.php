<?php
/**
 * Created by PhpStorm.
 * User: garvit
 * Date: 1/11/14
 * Time: 12:17 AM
 */

namespace project\emulate\Emulators\Emulate8086\Src\Domain\Model\Commands;

use TYPO3\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;
use project\emulate\Domain\Model\ExecuteInterface;
use project\emulate\Emulators\Emulate8086\Src\Domain\Model\CommandInterface;

class CALL implements CommandInterface {

    /**
     * executes the command with given parameters.
     * @param  string $operand1
     * @param  string $operand2
     * @return boolean|int|array true if executed successfully, false on software interept, -1 if problem occurs arrar for jump
     */
    public function execute($operand1, $operand2) {

    }
}