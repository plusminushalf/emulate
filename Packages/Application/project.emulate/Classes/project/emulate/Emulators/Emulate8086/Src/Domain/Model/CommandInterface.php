<?php

namespace project\emulate\Emulators\Emulate8086\Src\Domain\Model;

use TYPO3\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;

/**
* Interface to Execute Code
*/
interface CommandInterface {

	/**
	 * executes the command with given parameters.
	 * @param  string $operand1
	 * @param  string $operand2
	 * @return boolean|int|array true if executed successfully, false on software interept, -1 if problem occurs arrar for jump
	 */
	public function execute($operand1, $operand2);

}

?>