<?php

namespace project\emulate\Emulators\emulate8086\Classes\Domain\Model;

use TYPO3\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;

/**
* Registers
* @Flow\Entity
*/
class Registers {

	/**
	 * ax register
	 * @var int
	 */
	protected $ax = 0x0000;

	/**
	 * bx register
	 * @var int
	 */
	protected $bx = 0x0000;

	/**
	 * cx register
	 * @var int
	 */
	protected $cx = 0x0000;

	/**
	 * dx register
	 * @var int
	 */
	protected $dx = 0x0000;

	/**
	 * sp register
	 * @var int
	 */
	protected $sp = 0x0000;

	/**
	 * bp register
	 * @var int
	 */
	protected $bp = 0x0000;

	/**
	 * si register
	 * @var int
	 */
	protected $si = 0x0000;

	/**
	 * di register
	 * @var int
	 */
	protected $di = 0x0000;

	/**
	 * return ax register
	 * @return int
	 */
	public function getAx() {
		return $this->ax;
	}

	/**
	 * set ax register
	 * @param int $ax
	 */
	public function setAx($ax) {
		if($ax < 0x0000 && $ax > 0x9999) {
			throw new \Exception("Wrong Value Of AX register", 1409603810);
		}
		$this->ax = $ax;
	}

	/**
	 * return bx register
	 * @return int
	 */
	public function getBx() {
		return $this->bx;
	}

	/**
	 * set bx register
	 * @param int $bx
	 */
	public function setBx($bx) {
		if($bx < 0x0000 && $bx > 0x9999) {
			throw new \Exception("Wrong Value Of BX register", 1409603878);
		}
		$this->bx = $bx;
	}

	/**
	 * return cx register
	 * @return int
	 */
	public function getCx() {
		return $this->cx;
	}

	/**
	 * set cx register
	 * @param int $cx
	 */
	public function setCx($cx) {
		if($cx < 0x0000 && $cx > 0x9999) {
			throw new \Exception("Wrong Value Of CX register", 1409603918);
		}
		$this->cx = $cx;
	}

	/**
	 * return dx register
	 * @return int
	 */
	public function getDx() {
		return $this->dx;
	}

	/**
	 * set dx register
	 * @param int $dx
	 */
	public function setDx($dx) {
		if($dx < 0x0000 && $dx > 0x9999) {
			throw new \Exception("Wrong Value Of DX register", 1409603959);
		}
		$this->dx = $dx;
	}

	/**
	 * return sp register
	 * @return int
	 */
	public function getSp() {
		return $this->sp;
	}

	/**
	 * set sp register
	 * @param int $sp
	 */
	public function setSp($sp) {
		if($sp < 0x0000 && $sp > 0x9999) {
			throw new \Exception("Wrong Value Of SP register", 1409603998);
		}
		$this->sp = $sp;
	}

	/**
	 * return bp register
	 * @return int
	 */
	public function getBp() {
		return $this->bp;
	}

	/**
	 * set bp register
	 * @param int $bp
	 */
	public function setBp($bp) {
		if($bp < 0x0000 && $bp > 0x9999) {
			throw new \Exception("Wrong Value Of BP register", 1409604024);
		}
		$this->bp = $bp;
	}

	/**
	 * return si register
	 * @return int
	 */
	public function getSi() {
		return $this->si;
	}

	/**
	 * set si register
	 * @param int $si
	 */
	public function setSi($si) {
		if($si < 0x0000 && $si > 0x9999) {
			throw new \Exception("Wrong Value Of SI register", 1409604075);
		}
		$this->si = $si;
	}

	/**
	 * return di register
	 * @return int
	 */
	public function getDi() {
		return $this->di;
	}

	/**
	 * set di register
	 * @param int $di
	 */
	public function setDi($di) {
		if($di < 0x0000 && $di > 0x9999) {
			throw new \Exception("Wrong Value Of DI register", 1409604093);
		}
		$this->di = $di;
	}

}

?>