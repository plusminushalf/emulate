<?php

namespace project\emulate\Emulators\Emulate8086\Src\Domain\Model;

use TYPO3\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;
/**
* Memory of emulator
* @Flow\Entity
*/
class Memory {

	/**
	 * All flags
	 * @var object
	 * @ORM\OneToOne(targetEntity="project\emulate\Emulators\Emulate8086\Src\Domain\Model\Flags", mappedBy="Memory")
	 */
	protected $flags;

	/**
	 * Registers
	 * @var object
	 * @ORM\OneToOne(targetEntity="project\emulate\Emulators\Emulate8086\Src\Domain\Model\Registers", mappedBy="Memory")
	 */
	protected $registers;

	/**
	 * Memory
	 * @var object
	 * @ORM\OneToOne(targetEntity="project\emulate\Emulators\Emulate8086\Src\Domain\Model\Segments", mappedBy="Memory")
	 */
	protected $segments;

	/**
	 * Username of the usesr
	 * @var string
	 * @Flow\Identity
	 */
	protected $username;

	/**
	 * sets the flags
	 * @param \project\emulate\Emulators\Emulate8086\Src\Domain\Model\Flags $flags
	 */
	public function setFlags($flags) {
		$this->flags = $flags;
	}

	/**
	 * returns the flags
	 * @return \project\emulate\Emulators\Emulate8086\Src\Domain\Model\Flags
	 */
	public function getFlags() {
		return $this->flags;
	}

	/**
	 * sets the username
	 * @param string $username
	 */
	public function setusername($username) {
		$this->username = $username;
	}

	/**
	 * returns the username
	 * @return string
	 */
	public function getusername() {
		return $this->username;
	}

	/**
	 * sets the registers
	 * @param \project\emulate\Emulators\Emulate8086\Src\Domain\Model\Registers $registers
	 */
	public function setRegisters($registers) {
		$this->registers = $registers;
	}

	/**
	 * returns the registers
	 * @return \project\emulate\Emulators\Emulate8086\Src\Domain\Model\registers
	 */
	public function getRegisters() {
		return $this->registers;
	}

	/**
	 * sets the segments
	 * @param \project\emulate\Emulators\Emulate8086\Src\Domain\Model\Segments $segments
	 */
	public function setSegments($segments) {
		$this->segments = $segments;
	}

	/**
	 * returns the segments
	 * @return \project\emulate\Emulators\Emulate8086\Src\Domain\Model\Segments
	 */
	public function getSegments() {
		return $this->segments;
	}

}

?>