<?php

namespace  project\emulate\Emulators\emulate8086\Configuration;

use TYPO3\Flow\Annotation as Flow;

/**
* Configuration of 8086 emulator
*/
class Config {

	/**
	 * Name of the emulator
	 * @var string
	 */
	protected $name = "Emulator 8086";

	/**
	 * Description of emulator
	 * @var string
	 */
	protected $description = "This is a virtual emulator for 8086 microprocessor.
				 				For further help regarding this emulator you may refer it's help section.";

	/**
	 * mods of execution
	 * @var array
	 */
	protected $mods = ['simple', 'debug'];

	/**
	 * emulator key
	 * @var string
	 */
	protected $key = "emulate8086";

	/**
	 * returns Name
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * set the name of the emulator
	 * @param string $name
	 * @return void
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * returns key
	 * @return string
	 */
	public function getKey() {
		return $this->key;
	}

	/**
	 * set the key of the emulator
	 * @param string $key
	 * @return void
	 */
	public function setKey($key) {
		$this->key = $key;
	}

	/**
	 * returns mods
	 * @return array
	 */
	public function getMods() {
		return $this->mods;
	}

	/**
	 * set the mods of the emulator
	 * @param array $mods
	 * @return void
	 */
	public function setMods($mods) {
		$this->mods = $mods;
	}

	/**
	 * returns Description
	 * @return string
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * set the description of the emulator
	 * @param string $description
	 * @return void
	 */
	public function setDescription($description) {
		$this->description = $description;
	}
}

?>