<?php

namespace project\emulate\Emulators\Emulate8086\Src\Domain\Model;

use TYPO3\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;

/**
* Register Class
* @Flow\Entity
*/
class Flags {

	/**
	 * carry flag
	 * @var int
	 */
	protected $carry = 0x0000;

	/**
	 * parity flag
	 * @var int
	 */
	protected $parity = 0x0000;

	/**
	 * auxilary flag
	 * @var int
	 */
	protected $auxilary = 0x0000;

	/**
	 * zero flag
	 * @var int
	 */
	protected $zero = 0x0000;

	/**
	 * sign flag
	 * @var int
	 */
	protected $sign = 0x0000;

	/**
	 * trace flag
	 * @var int
	 */
	protected $trace = 0x0000;

	/**
	 * interept flag
	 * @var int
	 */
	protected $interept = 0x0000;

	/**
	 * direction flag
	 * @var int
	 */
	protected $direction = 0x0000;

	/**
	 * overflow flag
	 * @var int
	 */
	protected $overflow = 0x0000;

	/**
	 * return carry flag
	 * @return int
	 */
	public function getCarry() {
		return $this->carry;
	}

	/**
	 * set carry flag
	 * @param int $carry
	 */
	public function setCarry($carry) {
		$carry = ($carry)?0x0001:0x0000;
		$this->carry = $carry;
	}

	/**
	 * return parity flag
	 * @return int
	 */
	public function getParity() {
		return $this->parity;
	}

	/**
	 * set parity flag
	 * @param int $parity
	 */
	public function setParity($parity) {
		$parity = ($parity)?0x0001:0x0000;
		$this->parity = $parity;
	}

	/**
	 * return auxilary flag
	 * @return int
	 */
	public function getAuxilary() {
		return $this->auxilary;
	}

	/**
	 * set auxilary flag
	 * @param int $auxilary
	 */
	public function setAuxilary($auxilary) {
		$auxilary = ($auxilary)?0x0001:0x0000;
		$this->auxilary = $auxilary;
	}

	/**
	 * return zero flag
	 * @return int
	 */
	public function getZero() {
		return $this->zero;
	}

	/**
	 * set zero flag
	 * @param int $zero
	 */
	public function setZero($zero) {
		$zero = ($zero)?0x0001:0x0000;
		$this->zero = $zero;
	}

	/**
	 * return sign flag
	 * @return int
	 */
	public function getSign() {
		return $this->sign;
	}

	/**
	 * set sign flag
	 * @param int $sign
	 */
	public function setSign($sign) {
		$sign = ($sign)?0x0001:0x0000;
		$this->sign = $sign;
	}

	/**
	 * return trace flag
	 * @return int
	 */
	public function getTrace() {
		return $this->trace;
	}

	/**
	 * set trace flag
	 * @param int $trace
	 */
	public function setTrace($trace) {
		$trace = ($trace)?0x0001:0x0000;
		$this->trace = $trace;
	}

	/**
	 * return interept flag
	 * @return int
	 */
	public function getInterept() {
		return $this->interept;
	}

	/**
	 * set interept flag
	 * @param int $interept
	 */
	public function setInterept($interept) {
		$interept = ($interept)?0x0001:0x0000;
		$this->interept = $interept;
	}

	/**
	 * return direction flag
	 * @return int
	 */
	public function getDirection() {
		return $this->direction;
	}

	/**
	 * set direction flag
	 * @param int $direction
	 */
	public function setDirection($direction) {
		$direction = ($direction)?0x0001:0x0000;
		$this->direction = $direction;
	}

	/**
	 * return overflow flag
	 * @return int
	 */
	public function getOverflow() {
		return $this->overflow;
	}

	/**
	 * set overflow flag
	 * @param int $overflow
	 */
	public function setOverflow($overflow) {
		$overflow = ($overflow)?0x0001:0x0000;
		$this->overflow = $overflow;
	}


}

?>