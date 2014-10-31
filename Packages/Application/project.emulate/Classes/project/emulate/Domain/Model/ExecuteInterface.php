<?php

namespace project\emulate\Domain\Model;

use TYPO3\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;

/**
* Interface to Execute Code
*/
interface ExecuteInterface {

	/**
	 * Gets the line of code from memory check it's validity.
	 * @param  int $offset
	 * @return int
	 */
	public function executeOffset($offset);

	/**
	 * executes the line that is sent by executeOffset
	 * @param  string $line
	 * @return array
	 */
	public function executeLine($line);

	/**
	 * Gets the memory status before execution
	 * @return type
	 */
	// public function getMemoryValueBeforeExecution();

	/**
	 * Gets the memory status after execution
	 * @return type
	 */
	// public function getMemoryValueAfterExecution();

}

?>