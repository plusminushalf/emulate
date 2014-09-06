<?php

namespace project\emulate\Emulators\emulate8086\Classes\Domain\Model;

use TYPO3\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;

/**
* Segments Class
* @Flow\Entity
*/
class Segments {

	/**
	 * code segment
	 * @var array
	 */
	protected $code;

	/**
	 * data segment
	 * @var array
	 */
	protected $data;

	/**
	 * stack segment
	 * @var array
	 */
	protected $stack;

	/**
	 * extra segment
	 * @var array
	 */
	protected $extra;

	/**
	 * returns the code at a particular ofset
	 * @return array
	 */
	public function getCode() {
		return $this->code;
	}

	/**
	 * returns the data at a particular ofset
	 * @return array
	 */
	public function getData() {
		return $this->data;
	}

	/**
	 * returns the stack at a particular ofset
	 * @return array
	 */
	public function getStack() {
		return $this->stack;
	}

	/**
	 * returns the extra at a particular ofset
	 * @return array
	 */
	public function getExtra() {
		return $this->extra;
	}

	/**
	 * set the code segment
	 * @param int $ofset
	 * @param int $value
	 * @return void
	 */
	public function setCode($ofset, $value) {
		if($ofset < 0x0000 && $ofset > 0x9999) {
			throw new \Exception("Wrong Value Of Ofset", 1409603810);
		}
		if($value < 0x0000 && $value > 0x9999) {
			throw new \Exception("Wrong Value Of value", 1409603810);
		}
		$this->code[$ofset] = $value;
	}

	/**
	 * set the data segment
	 * @param int $ofset
	 * @param int $value
	 * @return void
	 */
	public function setData($ofset, $value) {
		if($ofset < 0x0000 && $ofset > 0x9999) {
			throw new \Exception("Wrong Value Of Ofset", 1409603810);
		}
		if($value < 0x0000 && $value > 0x9999) {
			throw new \Exception("Wrong Value Of value", 1409603810);
		}
		$this->data[$ofset] = $value;
	}

	/**
	 * set the stack segment
	 * @param int $ofset
	 * @param int $value
	 * @return void
	 */
	public function setStack($ofset, $value) {
		if($ofset < 0x0000 && $ofset > 0x9999) {
			throw new \Exception("Wrong Value Of Ofset", 1409603810);
		}
		if($value < 0x0000 && $value > 0x9999) {
			throw new \Exception("Wrong Value Of value", 1409603810);
		}
		$this->stack[$ofset] = $value;
	}

	/**
	 * set the extra segment
	 * @param int $ofset
	 * @param int $value
	 * @return void
	 */
	public function setExtra($ofset, $value) {
		if($ofset < 0x0000 && $ofset > 0x9999) {
			throw new \Exception("Wrong Value Of Ofset", 1409603810);
		}
		if($value < 0x0000 && $value > 0x9999) {
			throw new \Exception("Wrong Value Of value", 1409603810);
		}
		$this->extra[$ofset] = $value;
	}

	/**
	 * returns the code at a particular ofset
	 * @param  int $ofset
	 * @return int
	 */
	public function getCodeOfset($ofset) {
		if($ofset < 0x0000 && $ofset > 0x9999) {
			throw new \Exception("Wrong Value Of Ofset", 1409603810);
		}
		return $this->code[$ofset];
	}

	/**
	 * returns the data at a particular ofset
	 * @param  int $ofset
	 * @return int
	 */
	public function getDataOfset($ofset) {
		if($ofset < 0x0000 && $ofset > 0x9999) {
			throw new \Exception("Wrong Value Of Ofset", 1409603810);
		}
		return $this->data[$ofset];
	}

	/**
	 * returns the stack at a particular ofset
	 * @param  int $ofset
	 * @return int
	 */
	public function getStackOfset($ofset) {
		if($ofset < 0x0000 && $ofset > 0x9999) {
			throw new \Exception("Wrong Value Of Ofset", 1409603810);
		}
		return $this->stack[$ofset];
	}

	/**
	 * returns the extra at a particular ofset
	 * @param  int $ofset
	 * @return int
	 */
	public function getExtraOfset($ofset) {
		if($ofset < 0x0000 && $ofset > 0x9999) {
			throw new \Exception("Wrong Value Of Ofset", 1409603810);
		}
		return $this->extra[$ofset];
	}

}

?>