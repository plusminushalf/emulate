<?php
namespace project\emulate\Emulators\Emulate8086\Src\Domain\Model\Commands;

use TYPO3\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;
use project\emulate\Emulators\Emulate8086\Src\Domain\Model\CommandInterface;

/**
* Mov Class
* it copies the memory block/registor to another register/memory block
*/
class MOV implements CommandInterface {

	/**
	 * @var \project\emulate\Emulators\Emulate8086\Src\Domain\Model\Validator
	 * @Flow\Inject
	 */
	protected $validator;

	/**
	 * Controller
	 * @var \project\emulate\Emulators\Emulate8086\Src\Controllers\StandardController
	 * @Flow\Inject
	 */
	protected $controller;

	/**
	 * user session
	 * @var project\emulate\Domain\Model\User
	 * @Flow\Inject
	 */
	protected $user;

	/**
	 * operand1 extracted from line
	 * @var string
	 */
	protected $operand1;

	/**
	 * operand2 extracted from line
	 * @var string
	 */
	protected $operand2;

	/**
	 * operand1 extracted from line
	 * @var string
	 */
	protected $operand1Type;

	/**
	 * operand2 extracted from line
	 * @var string
	 */
	protected $operand2Type;

	/**
	 * Errors that occured during processing
	 * @var string
	 */
	public $error = '';


	/**
	 * executes the command with given parameters.
	 * @param  string $operand1
	 * @param  string $operand2
	 * @return boolean true if executed successfully, false on software interept, -1 if problem occurs
	 */
	public function execute($operand1, $operand2) {
		$this->operand1 = $operand1;
		$this->operand2 = $operand2;
		$this->operand1Type = $this->validator->getType($operand1);
		$this->operand2Type = $this->validator->getType($operand2);
		return $this->getFunctionToExecute();
	}

	/**
	 * executes the specifuc function and returns it's result
	 * @return boolean
	 */
	protected function getFunctionToExecute() {
		switch ($this->operand1Type) {
			case 1:
				switch ($this->operand2Type) {
					case 1:
						return $this->RegReg($this->operand1, $this->operand2);
						break;
					case 5:
						return $this->RegImediate($this->operand1, $this->operand2);
						break;
					case 4:
						return $this->RegImediate($this->operand1, $this->operand2);
						break;
					case 6:
						return $this->RegMemory($this->operand1, $this->operand2);
						break;
				}
				break;
			case 2:
				switch ($this->operand2Type) {
					case 4:
						return $this->Reg8bitImediate($this->operand1, $this->operand2);
						break;
					case 2:
						return $this->Reg8bitReg8bit($this->operand1, $this->operand2);
						break;
					case 6:
						return $this->Reg8bitMemory($this->operand1, $this->operand2);
						break;
				}
				break;
			case 6:
				switch ($this->operand2Type) {
					case 1:
						return $this->MemoryReg($this->operand1, $this->operand2);
						break;
					case 5:
						return $this->MemoryImediate($this->operand1, $this->operand2);
						break;
					case 4:
						return $this->Memory8bitImediate($this->operand1, $this->operand2);
						break;
					case 2:
						return $this->MemoryReg8bit($this->operand1, $this->operand2);
						break;
				}
				break;
			default:
				return -1;
				break;
		}
	}

	/**
	 * executes the command with given parameters.
	 * @param  string $operand1
	 * @param  string $operand2
	 * @return boolean true if executed successfully, false on software interept, -1 if problem occurs
	 */
	protected function RegReg($operand1, $operand2) {
		$value = json_decode($this->controller->getRegisterValueAction(["register"=> $operand2]), true)['value'];
		$this->controller->setRegisterValueAction([ "register"=> $operand1, "value"=> hexdec($value)]);
		return true;
	}

	/**
	 * executes the command with given parameters.
	 * @param  string $operand1
	 * @param  string $operand2
	 * @return boolean true if executed successfully, false on software interept, -1 if problem occurs
	 */
	protected function RegImediate($operand1, $operand2) {
		$this->controller->setRegisterValueAction([ "register"=> $operand1, "value"=> hexdec($operand2)]);
		return true;
	}

	/**
	 * executes the command with given parameters.
	 * @param  string $operand1
	 * @param  string $operand2
	 * @return boolean true if executed successfully, false on software interept, -1 if problem occurs
	 */
	protected function RegMemory($operand1, $operand2) {
		$operand2 = substr($operand2, 1, -1);
		$type = $this->validator->getType($operand2);
		if($type == 1) {
			$value = json_decode($this->controller->getRegisterValueAction(["register"=> $operand2]), true)['value'];
			$valueLSB = json_decode($this->controller->getMemoryValueAction(["segment"=> 0x1000, "offset"=> $value]), true)['value'];
			$value = dechex($value);
			$value = hexdec(++$value);
			$valueMSB = json_decode($this->controller->getMemoryValueAction(["segment"=> 0x1000, "offset"=> $value]), true)['value'];
			$value = $valueMSB['value'] . $valueLSB['value'];
			$this->controller->setRegisterValueAction([ "register"=> $operand1, "value"=> hexdec($value)]);
			return true;
		} elseif($type == 4 || $type == 5) {
			$valueLSB = json_decode($this->controller->getMemoryValueAction(["segment"=> 0x1000, "offset"=> $operand2]), true)['value'];
			$operand2 = dechex($operand2);
			$operand2 = hexdec(++$operand2);
			$valueMSB = json_decode($this->controller->getMemoryValueAction(["segment"=> 0x1000, "offset"=> $operand2]), true)['value'];
			$value = $valueMSB['value'] . $valueLSB['value'];
			$this->controller->setRegisterValueAction([ "register"=> $operand1, "value"=> hexdec($value)]);
			return true;
		}
		$this->error = "{$operand1} & {$operand2} are not correct operands for mov instruction";
		return -1;
	}

	/**
	 * executes the command with given parameters.
	 * @param  string $operand1
	 * @param  string $operand2
	 * @return boolean true if executed successfully, false on software interept, -1 if problem occurs
	 */
	protected function Reg8bitImediate($operand1, $operand2) {
		$register = '';
		$value = '';
		$c = 2 - strlen($operand2);
		while ($c--) {
			$operand2 = '0' . $operand2;
		}
		switch ($operand1) {
			case 'AH':
				$register = 'AX';
				$value = json_decode($this->controller->getRegisterValueAction(["register"=> $register]), true)['value'];
				$c = 4 - strlen($value);
				while ($c--) {
					$value = '0' . $value;
				}
				$value = $operand2 . substr($value, 2);
				break;
			case 'AL':
				$register = 'AX';
				$value = json_decode($this->controller->getRegisterValueAction(["register"=> $register]), true)['value'];
				$c = 4 - strlen($value);
				while ($c--) {
					$value = '0' . $value;
				}
				$value = substr($value, 0, 2) . $operand2;
				break;
			case 'BH':
				$register = 'BX';
				$value = json_decode($this->controller->getRegisterValueAction(["register"=> $register]), true)['value'];
				$c = 4 - strlen($value);
				while ($c--) {
					$value = '0' . $value;
				}
				$value = $operand2 . substr($value, 2);
				break;
			case 'BL':
				$register = 'BX';
				$value = json_decode($this->controller->getRegisterValueAction(["register"=> $register]), true)['value'];
				$c = 4 - strlen($value);
				while ($c--) {
					$value = '0' . $value;
				}
				$value = substr($value, 0, 2) . $operand2;
				break;
			case 'CH':
				$register = 'CX';
				$value = json_decode($this->controller->getRegisterValueAction(["register"=> $register]), true)['value'];
				$c = 4 - strlen($value);
				while ($c--) {
					$value = '0' . $value;
				}
				$value = $operand2 . substr($value, 2);
				break;
			case 'CL':
				$register = 'CX';
				$value = json_decode($this->controller->getRegisterValueAction(["register"=> $register]), true)['value'];
				$c = 4 - strlen($value);
				while ($c--) {
					$value = '0' . $value;
				}
				$value = substr($value, 0, 2) . $operand2;
				break;
			case 'DH':
				$register = 'DX';
				$value = json_decode($this->controller->getRegisterValueAction(["register"=> $register]), true)['value'];
				$c = 4 - strlen($value);
				while ($c--) {
					$value = '0' . $value;
				}
				$value = $operand2 . substr($value, 2);
				break;
			case 'DL':
				$register = 'DX';
				$value = json_decode($this->controller->getRegisterValueAction(["register"=> $register]), true)['value'];
				$c = 4 - strlen($value);
				while ($c--) {
					$value = '0' . $value;
				}
				$value = substr($value, 0, 2) . $operand2;
				break;
			default:
				$this->error = "{$operand1} & {$operand2} are not correct operands for mov instruction";
				return -1;
		}
		$this->controller->setRegisterValueAction([ "register"=> $register, "value"=> hexdec($value)]);
		return true;
	}

	/**
	 * executes the command with given parameters.
	 * @param  string $operand1
	 * @param  string $operand2
	 * @return boolean true if executed successfully, false on software interept, -1 if problem occurs
	 */
	protected function Reg8bitReg8bit($operand1, $operand2) {
		$value = '';
		switch ($operand2) {
			case 'AH':
				$value = json_decode($this->controller->getRegisterValueAction(["register"=> 'AX']), true)['value'];
				$c = 4 - strlen($value);
				while ($c--) {
					$value = '0' . $value;
				}
				$value = substr($value, 0, 2);
				break;
			case 'AL':
				$value = json_decode($this->controller->getRegisterValueAction(["register"=> 'AX']), true)['value'];
				$c = 4 - strlen($value);
				while ($c--) {
					$value = '0' . $value;
				}
				$value = substr($value, 2);
				break;
			case 'BH':
				$value = json_decode($this->controller->getRegisterValueAction(["register"=> 'BX']), true)['value'];
				$c = 4 - strlen($value);
				while ($c--) {
					$value = '0' . $value;
				}
				$value = substr($value, 0, 2);
				break;
			case 'BL':
				$value = json_decode($this->controller->getRegisterValueAction(["register"=> 'BX']), true)['value'];
				$c = 4 - strlen($value);
				while ($c--) {
					$value = '0' . $value;
				}
				$value = substr($value, 2);
				break;
			case 'CH':
				$value = json_decode($this->controller->getRegisterValueAction(["register"=> 'CX']), true)['value'];
				$c = 4 - strlen($value);
				while ($c--) {
					$value = '0' . $value;
				}
				$value = substr($value, 0, 2);
				break;
			case 'CL':
				$value = json_decode($this->controller->getRegisterValueAction(["register"=> 'CX']), true)['value'];
				$c = 4 - strlen($value);
				while ($c--) {
					$value = '0' . $value;
				}
				$value = substr($value, 2);
				break;
			case 'DH':
				$value = json_decode($this->controller->getRegisterValueAction(["register"=> 'DX']), true)['value'];
				$c = 4 - strlen($value);
				while ($c--) {
					$value = '0' . $value;
				}
				$value = substr($value, 0, 2);
				break;
			case 'DL':
				$value = json_decode($this->controller->getRegisterValueAction(["register"=> 'DX']), true)['value'];
				$c = 4 - strlen($value);
				while ($c--) {
					$value = '0' . $value;
				}
				$value = substr($value, 2);
				break;
			default:
				$this->error = "{$operand1} & {$operand2} are not correct operands for mov instruction";
				return -1;
		}
		return $this->Reg8bitImediate($operand1, $value);
	}

	/**
	 * executes the command with given parameters.
	 * @param  string $operand1
	 * @param  string $operand2
	 * @return boolean true if executed successfully, false on software interept, -1 if problem occurs
	 */
	protected function Reg8bitMemory($operand1, $operand2) {
		$operand2 = substr($operand2, 1, -1);
		$type = $this->validator->getType($operand2);
		if($type == 1) {
			$value = json_decode($this->controller->getRegisterValueAction(["register"=> $operand2]), true)['value'];
			$c = 4 - strlen($value);
			while ($c--) {
				$value = '0' . $value;
			}
			$value = json_decode($this->controller->getMemoryValueAction(["segment"=> 0x1000, "offset"=> $value]), true)['value'];
			$c = 4 - strlen($value);
			while ($c--) {
				$value = '0' . $value;
			}
			return $this->Reg8bitImediate($operand1, $value);
		} elseif($type == 4 || $type == 5) {
			$value = json_decode($this->controller->getMemoryValueAction(["segment"=> 0x1000, "offset"=> $operand2]), true)['value'];
			$c = 4 - strlen($value);
			while ($c--) {
				$value = '0' . $value;
			}
			return $this->Reg8bitImediate($operand1, $value);
		}
		$this->error = "{$operand1} & {$operand2} are not correct operands for mov instruction";
		return -1;
	}

	/**
	 * executes the command with given parameters.
	 * @param  string $operand1
	 * @param  string $operand2
	 * @return boolean true if executed successfully, false on software interept, -1 if problem occurs
	 */
	protected function MemoryReg($operand1, $operand2) {
		$value = json_decode($this->controller->getRegisterValueAction(["register"=> $operand2]), true)['value'];
		$c = 4 - strlen($value);
		while ($c--) {
			$value = '0' . $value;
		}
		$valueLSB = substr($value, 2);
		$valueMSB = substr($value, 0, 2);
		$operand1 = substr($operand1, 1, -1);
		$this->controller->setMemoryValueAction(["segment"=>0x1000, "offset"=>hexdec($operand1), "value"=>hexdec($valueLSB)]);
		$operand1 = hexdec($operand1);
		$operand1 = dechex($operand1 + 1);
		$this->controller->setMemoryValueAction(["segment"=>0x1000, "offset"=>hexdec($operand1), "value"=>hexdec($valueMSB)]);
		return true;
	}

	/**
	 * executes the command with given parameters.
	 * @param  string $operand1
	 * @param  string $operand2
	 * @return boolean true if executed successfully, false on software interept, -1 if problem occurs
	 */
	protected function MemoryImediate($operand1, $operand2) {
		$c = 4 - strlen($operand2);
		while ($c--) {
			$operand2 = '0' . $operand2;
		}
		$valueLSB = substr($operand2, 2);
		$valueMSB = substr($operand2, 0, 2);
		$operand1 = substr($operand1, 1, -1);
		$this->controller->setMemoryValueAction(["segment"=>0x1000, "offset"=>hexdec($operand1), "value"=>hexdec($valueLSB)]);
		$operand1 = hexdec($operand1);
		$operand1 = dechex($operand1 + 1);
		$this->controller->setMemoryValueAction(["segment"=>0x1000, "offset"=>hexdec($operand1), "value"=>hexdec($valueMSB)]);
		return true;
	}

	/**
	 * executes the command with given parameters.
	 * @param  string $operand1
	 * @param  string $operand2
	 * @return boolean true if executed successfully, false on software interept, -1 if problem occurs
	 */
	protected function Memory8bitImediate($operand1, $operand2) {
		$c = 2 - strlen($operand2);
		while ($c--) {
			$operand2 = '0' . $operand2;
		}
		$operand1 = substr($operand1, 1, -1);
		$this->controller->setMemoryValueAction(["segment"=>0x1000, "offset"=>hexdec($operand1), "value"=>hexdec($operand2)]);
		return true;
	}

	/**
	 * executes the command with given parameters.
	 * @param  string $operand1
	 * @param  string $operand2
	 * @return boolean true if executed successfully, false on software interept, -1 if problem occurs
	 */
	protected function MemoryReg8bit($operand1, $operand2) {
		$value = '';
		switch ($operand2) {
			case 'AH':
				$value = json_decode($this->controller->getRegisterValueAction(["register"=> 'AX']), true)['value'];
				$c = 4 - strlen($value);
				while ($c--) {
					$value = '0' . $value;
				}
				$value = substr($value, 0, 2);
				break;
			case 'AL':
				$value = json_decode($this->controller->getRegisterValueAction(["register"=> 'AX']), true)['value'];
				$c = 4 - strlen($value);
				while ($c--) {
					$value = '0' . $value;
				}
				$value = substr($value, 2);
				break;
			case 'BH':
				$value = json_decode($this->controller->getRegisterValueAction(["register"=> 'BX']), true)['value'];
				$c = 4 - strlen($value);
				while ($c--) {
					$value = '0' . $value;
				}
				$value = substr($value, 0, 2);
				break;
			case 'BL':
				$value = json_decode($this->controller->getRegisterValueAction(["register"=> 'BX']), true)['value'];
				$c = 4 - strlen($value);
				while ($c--) {
					$value = '0' . $value;
				}
				$value = substr($value, 2);
				break;
			case 'CH':
				$value = json_decode($this->controller->getRegisterValueAction(["register"=> 'CX']), true)['value'];
				$c = 4 - strlen($value);
				while ($c--) {
					$value = '0' . $value;
				}
				$value = substr($value, 0, 2);
				break;
			case 'CL':
				$value = json_decode($this->controller->getRegisterValueAction(["register"=> 'CX']), true)['value'];
				$c = 4 - strlen($value);
				while ($c--) {
					$value = '0' . $value;
				}
				$value = substr($value, 2);
				break;
			case 'DH':
				$value = json_decode($this->controller->getRegisterValueAction(["register"=> 'DX']), true)['value'];
				$c = 4 - strlen($value);
				while ($c--) {
					$value = '0' . $value;
				}
				$value = substr($value, 0, 2);
				break;
			case 'DL':
				$value = json_decode($this->controller->getRegisterValueAction(["register"=> 'DX']), true)['value'];
				$c = 4 - strlen($value);
				while ($c--) {
					$value = '0' . $value;
				}
				$value = substr($value, 2);
				break;
			default:
				$this->error = "{$operand1} & {$operand2} are not correct operands for mov instruction";
				return -1;
		}
		$operand1 = substr($operand1, 1, -1);
		$this->controller->setMemoryValueAction(["segment"=>0x1000, "offset"=>hexdec($operand1), "value"=>hexdec($value)]);
		return true;
	}

}

?>