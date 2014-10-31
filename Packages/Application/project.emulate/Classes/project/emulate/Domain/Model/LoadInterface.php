<?php

namespace project\emulate\Domain\Model;

use TYPO3\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;

/**
* Interface to Execute Code
*/
interface LoadInterface {

	/**
	 * Gets the line of code from memory check it's validity.
	 * @return void
	 */
	public function boot();

	/**
	 * ready state of the emulator
	 * @return boolean
	 */
	public function ready();

}

?>