<?php

namespace project\emulate\Emulators\Emulate8086\Src\Domain\Model;

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
	protected $code = [0x0000 => 0x000A, 0xffff => 0x0000];

	/**
	 * data segment
	 * @var array
	 */
	protected $data = [0x0000 => 0x0000, 0xffff => 0x0000];

	/**
	 * stack segment
	 * @var array
	 */
	protected $stack = [0x0000 => 0x0000, 0xffff => 0x0000];

	/**
	 * extra segment
	 * @var array
	 */
	protected $extra = [0x0000 => 0x0000, 0xffff => 0x0000];

	/**
	 * returns the code at a particular offset
	 * @return array
	 */
	public function getCode() {
		return $this->code;
	}

	/**
	 * returns the data at a particular offset
	 * @return array
	 */
	public function getData() {
		return $this->data;
	}

	/**
	 * returns the stack at a particular offset
	 * @return array
	 */
	public function getStack() {
		return $this->stack;
	}

	/**
	 * returns the extra at a particular offset
	 * @return array
	 */
	public function getExtra() {
		return $this->extra;
	}

	/**
	 * set the code segment
	 * @param int $offset
	 * @param int $value
	 * @return void
	 */
	public function setCode($code) {
		$this->code = $code;
	}

	/**
	 * set the code segment
	 * @param int $offset
	 * @param int $value
	 * @return void
	 */
	public function setValueInCode($offset, $value) {
		if($offset < 0x0000 && $offset > 0xff) {
			throw new \Exception("Wrong Value Of Offset", 1409603810);
		}
		$this->code[$offset] = $value;
	}

	/**
	 * set the data segment
	 * @param int $offset
	 * @param int $value
	 * @return void
	 */
	public function setData($data) {
		$this->data = $data;
	}

	/**
	 * set the data segment
	 * @param int $offset
	 * @param int $value
	 * @return void
	 */
	public function setValueInData($offset, $value) {
		if($offset < 0x0000 && $offset > 0xff) {
			throw new \Exception("Wrong Value Of Offset", 1409603810);
		}
		if($value < 0x0000 && $value > 0xffff) {
			throw new \Exception("Wrong Value Of value", 1409603810);
		}
		$this->data[$offset] = $value;
	}

	/**
	 * set the stack segment
	 * @param int $offset
	 * @param int $value
	 * @return void
	 */
	public function setStack($stack) {
		$this->stack = $stack;
	}

	/**
	 * set the stack segment
	 * @param int $offset
	 * @param int $value
	 * @return void
	 */
	public function setValueInStack($offset, $value) {
		if($offset < 0x0000 && $offset > 0xff) {
			throw new \Exception("Wrong Value Of Offset", 1409603810);
		}
		if($value < 0x0000 && $value > 0xffff) {
			throw new \Exception("Wrong Value Of value", 1409603810);
		}
		$this->stack[$offset] = $value;
	}

	/**
	 * set the extra segment
	 * @param int $offset
	 * @param int $value
	 * @return void
	 */
	public function setExtra($extra) {
		$this->extra = $extra;
	}

	/**
	 * set the extra segment
	 * @param int $offset
	 * @param int $value
	 * @return void
	 */
	public function setValueInExtra($offset, $value) {
		if($offset < 0x0000 && $offset > 0xff) {
			throw new \Exception("Wrong Value Of Offset", 1409603810);
		}
		if($value < 0x0000 && $value > 0xffff) {
			throw new \Exception("Wrong Value Of value", 1409603810);
		}
		$this->extra[$offset] = $value;
	}

	/**
	 * returns the code at a particular offset
	 * @param  int $offset
	 * @return string
	 */
	public function getCodeOffset($offset) {
		if($offset < 0x0000 && $offset > 0xff) {
			throw new \Exception("Wrong Value Of Offset", 1409603810);
		}
		$offset = hexdec($offset);
		if(isset($this->code[$offset])) {
			return $this->code[$offset];
		}
		return 0x0000;
	}

	/**
	 * returns the data at a particular offset
	 * @param  int $offset
	 * @return int
	 */
	public function getDataOffset($offset) {
		if($offset < 0x0000 && $offset > 0xff) {
			throw new \Exception("Wrong Value Of Offset", 1409603810);
		}
		$offset = hexdec($offset);
		if(isset($this->data[$offset])) {
			return $this->data[$offset];
		}
		return 0x0000;
	}

	/**
	 * returns the stack at a particular offset
	 * @param  int $offset
	 * @return int
	 */
	public function getStackOffset($offset) {
		if($offset < 0x0000 && $offset > 0xff) {
			throw new \Exception("Wrong Value Of Offset", 1409603810);
		}
		$offset = hexdec($offset);
		if(isset($this->stack[$offset])) {
			return $this->stack[$offset];
		}
		return 0x0000;
	}

	/**
	 * returns the extra at a particular offset
	 * @param  int $offset
	 * @return int
	 */
	public function getExtraOffset($offset) {
		if($offset < 0x0000 && $offset > 0xff) {
			throw new \Exception("Wrong Value Of Offset", 1409603810);
		}
		$offset = hexdec($offset);
		if(isset($this->extra[$offset])) {
			return $this->extra[$offset];
		}
		return 0x0000;
	}

}

?>