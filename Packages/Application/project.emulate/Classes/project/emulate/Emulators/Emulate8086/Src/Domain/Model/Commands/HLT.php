<?php
namespace project\emulate\Emulators\Emulate8086\Src\Domain\Model\Commands;

use TYPO3\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;
use project\emulate\Emulators\Emulate8086\Src\Domain\Model\CommandInterface;

/**
* AAD Class
*/
class HLT implements CommandInterface {

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
		return false;
	}

}