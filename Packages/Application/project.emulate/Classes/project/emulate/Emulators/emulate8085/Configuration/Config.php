<?php

namespace  project\emulate\Emulators\emulate8085\Configuration;

use TYPO3\Flow\Annotation as Flow;

/**
* Configuration of 8086 emulator
*/
class Config {

	/**
	 * Name of the emulator
	 * @var string
	 */
	protected $name = "Emulator 8085";

	/**
	 * Description of emulator
	 * @var string
	 */
	protected $description = "This is a virtual emulator for 8085 microprocessor.
				 				For further help regarding this emulator you may refer it's help section.";

	/**
	 * emulator key
	 * @var string
	 */
	protected $key = 'emulate8085';

	/**
	 * returns Name
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * set the name of the emulator
	 * @param string $name'
	 * @return void
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * returns Name
	 * @return string
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * set the description of the emulator
	 * @param string $description'
	 * @return void
	 */
	public function setDescription($description) {
		$this->description = $description;
	}
}

?>