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
	 * @var array
	 */
	protected $flags;

	/**
	 * Registers
	 * @var array
	 */
	protected $registers;

	/**
	 * Memory
	 * @var array
	 */
	protected $segments;

	/**
	 * Username of the user
	 * @var string
	 * @Flow\Identity
	 */
	protected $username;

	public function __construct() {
		$this->flags = [
			'carry' => 0x0,
			'parity' => 0x0,
			'auxilary' => 0x0,
			'zero' => 0x0,
			'sign' => 0x0,
			'trace' => 0x0,
			'interept' => 0x0,
			'direction' => 0x0,
			'overflow'  => 0x0
		];

		$this->registers = [
			'ax' => 0x0,
			'bx' => 0x0,
			'cx' => 0x0,
			'dx' => 0x0,
			'sp' => 0x0,
			'bp' => 0x0,
			'si' => 0x0,
			'di' => 0x0,
		];

		$this->segments = [
			'code' => [0x0000 => 0x000A, 0xffff => 0x0000],
			'data' => [0x0000 => 0x000A, 0xffff => 0x0000],
			'stack' => [0x0000 => 0x000A, 0xffff => 0x0000],
			'extra' => [0x0000 => 0x000A, 0xffff => 0x0000]
		];

	}

	/**
	 * sets the flags
	 * @param \project\emulate\Emulators\Emulate8086\Src\Domain\Model\Flags $flags
	 */
	public function setFlags($flags) {
		$this->flags = $flags;
	}

	/**
	 * returns the flags
	 * @return array
	 */
	public function getFlags() {
		return $this->flags;
	}

	/**
	 * sets the username
	 * @param string $username
	 */
	public function setUsername($username) {
		$this->username = $username;
	}

	/**
	 * returns the username
	 * @return string
	 */
	public function getUsername() {
		return $this->username;
	}

	/**
	 * sets the registers
	 * @param array
	 */
	public function setRegisters($registers) {
		$this->registers = $registers;
	}

	/**
	 * returns the registers
	 * @return array
	 */
	public function getRegisters() {
		return $this->registers;
	}

	/**
	 * sets the segments
	 * @param array
	 */
	public function setSegments($segments) {
		$this->segments = $segments;
	}

	/**
	 * returns the segments
	 * @return array
	 */
	public function getSegments() {
		return $this->segments;
	}

}

?>