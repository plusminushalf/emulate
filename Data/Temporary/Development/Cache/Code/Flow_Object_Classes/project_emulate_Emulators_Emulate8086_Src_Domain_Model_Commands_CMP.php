<?php
/**
 * Created by PhpStorm.
 * User: garvit
 * Date: 4/11/14
 * Time: 6:45 PM
 */

namespace project\emulate\Emulators\Emulate8086\Src\Domain\Model\Commands;

use TYPO3\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;
use project\emulate\Emulators\Emulate8086\Src\Domain\Model\CommandInterface;

class CMP_Original implements CommandInterface {

    /**
     * @var \project\emulate\Emulators\Emulate8086\Src\Domain\Repository\MemoryRepository
     * @Flow\Inject
     */
    protected $memoryRepository;

    /**
     * @var \project\emulate\Emulators\Emulate8086\Src\Domain\Model\Memory
     */
    protected $memory;

    /**
     * user session
     * @var \project\emulate\Domain\Model\User
     * @Flow\Inject
     */
    protected $user;

    /**
     * Errors that occured during processing
     * @var string
     */
    public $error = '';

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
     * Injects Memory Repository and Memory for the specific user
     * @param  \project\emulate\Emulators\Emulate8086\Src\Domain\Repository\MemoryRepository $memoryRepository
     * @return void
     */
    public function initializeObject() {
        $this->memory = $this->memoryRepository->getMemory($this->user->getUserAccount()->getUsername())->getFirst();
    }

    /**
     * executes the command with given parameters.
     * @param  string $operand1
     * @param  string $operand2
     * @return boolean|int|array true if executed successfully, false on software interept, -1 if problem occurs arrar for jump
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
     * @return boolean true if executed successfully, false on software interept, -1 if problem occurs
     */
    protected function setFlags($value) {
        $flags = $this->memory->getFlags();
        if($value == 0) $flags->setZero(1);
        else $flags->setZero(0);
        if($value > 0xffff) $flags->setOverflow(1);
        else $flags->setOverflow(0);
        if($value < 0) {
            $flags->setSign(1);
            $flags->setCarry(1);
        } else {
            $flags->setSign(0);
            $flags->setCarry(0);
        }
        try {
            $this->memory->setFlags($flags);
            $this->memoryRepository->update($this->memory);
        } catch(\TYPO3\Flow\Persistence\Exception\IllegalObjectTypeException $e) {
            throw $e;
        }
    }

    /**
     * executes the command with given parameters.
     * @param  string $operand1
     * @param  string $operand2
     * @return boolean true if executed successfully, false on software interept, -1 if problem occurs
     */
    protected function RegReg($operand1, $operand2) {
        $value2 = json_decode($this->controller->getRegisterValueAction(["register"=> $operand2]), true)['value'];
        $value1 = json_decode($this->controller->getRegisterValueAction(["register"=> $operand1]), true)['value'];
        $value = hexdec($value1) - hexdec($value2);
        $this->setFlags($value);
        return true;
    }

    /**
     * executes the command with given parameters.
     * @param  string $operand1
     * @param  string $operand2
     * @return boolean true if executed successfully, false on software interept, -1 if problem occurs
     */
    protected function RegImediate($operand1, $operand2) {
        $value1 = json_decode($this->controller->getRegisterValueAction(["register"=> $operand1]), true)['value'];
        $value = hexdec($value1) - hexdec($operand2);
        $this->setFlags($value);
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
        $value = '';
        if($type == 1) {
            $value = json_decode($this->controller->getRegisterValueAction(["register"=> $operand2]), true)['value'];
            $valueLSB = json_decode($this->controller->getMemoryValueAction(["segment"=> 0x1000, "offset"=> $value]), true)['value'];
            $value = hexdec($value);
            $value = dechex(++$value);
            $valueMSB = json_decode($this->controller->getMemoryValueAction(["segment"=> 0x1000, "offset"=> $value]), true)['value'];
            $value2 = $valueMSB . $valueLSB;
            $value1 = json_decode($this->controller->getRegisterValueAction(["register"=> $operand2]), true)['value'];
            $value = hexdec($value1) - hexdec($value2);
            return true;
        } elseif($type == 4 || $type == 5) {
            $valueLSB = json_decode($this->controller->getMemoryValueAction(["segment"=> 0x1000, "offset"=> $operand2]), true)['value'];
            $operand2 = hexdec($operand2);
            $operand2 = dechex(++$operand2);
            $valueMSB = json_decode($this->controller->getMemoryValueAction(["segment"=> 0x1000, "offset"=> $operand2]), true)['value'];
            $value2 = $valueMSB . $valueLSB;
            $value1 = json_decode($this->controller->getRegisterValueAction(["register"=> $operand2]), true)['value'];
            $value = hexdec($value1) - hexdec($value2);
            return true;
        }
        $this->setFlags($value);
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
                $value = hexdec($operand2) - hexdec(substr($value, 2));
                break;
            case 'AL':
                $register = 'AX';
                $value = json_decode($this->controller->getRegisterValueAction(["register"=> $register]), true)['value'];
                $c = 4 - strlen($value);
                while ($c--) {
                    $value = '0' . $value;
                }
                $value = hexdec($operand2) - hexdec(substr($value, 0, 2));
                break;
            case 'BH':
                $register = 'BX';
                $value = json_decode($this->controller->getRegisterValueAction(["register"=> $register]), true)['value'];
                $c = 4 - strlen($value);
                while ($c--) {
                    $value = '0' . $value;
                }
                $value = hexdec($operand2) - hexdec(substr($value, 2));
                break;
            case 'BL':
                $register = 'BX';
                $value = json_decode($this->controller->getRegisterValueAction(["register"=> $register]), true)['value'];
                $c = 4 - strlen($value);
                while ($c--) {
                    $value = '0' . $value;
                }
                $value = hexdec($operand2) - hexdec(substr($value, 0, 2));
                break;
            case 'CH':
                $register = 'CX';
                $value = json_decode($this->controller->getRegisterValueAction(["register"=> $register]), true)['value'];
                $c = 4 - strlen($value);
                while ($c--) {
                    $value = '0' . $value;
                }
                $value = hexdec($operand2) - hexdec(substr($value, 2));
                break;
            case 'CL':
                $register = 'CX';
                $value = json_decode($this->controller->getRegisterValueAction(["register"=> $register]), true)['value'];
                $c = 4 - strlen($value);
                while ($c--) {
                    $value = '0' . $value;
                }
                $value = hexdec($operand2) - hexdec(substr($value, 0, 2));
                break;
            case 'DH':
                $register = 'DX';
                $value = json_decode($this->controller->getRegisterValueAction(["register"=> $register]), true)['value'];
                $c = 4 - strlen($value);
                while ($c--) {
                    $value = '0' . $value;
                }
                $value = hexdec($operand2) - hexdec(substr($value, 2));
                break;
            case 'DL':
                $register = 'DX';
                $value = json_decode($this->controller->getRegisterValueAction(["register"=> $register]), true)['value'];
                $c = 4 - strlen($value);
                while ($c--) {
                    $value = '0' . $value;
                }
                $value = hexdec($operand2) - hexdec(substr($value, 0, 2));
                break;
            default:
                $this->error = "{$operand1} & {$operand2} are not correct operands for mov instruction";
                return -1;
        }
        $this->setFlags($value);
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
        $value1 = json_decode($this->controller->getRegisterValueAction(["register"=> $operand2]), true)['value'];
//		$c = 4 - strlen($value);
//		while ($c--) {
//			$value = '0' . $value;
//		}
//		$valueLSB = substr($value, 2);
//		$valueMSB = substr($value, 0, 2);
        $operand1 = substr($operand1, 1, -1);
        $operand1 = hexdec($operand1);
        $value2LSB = json_decode($this->controller->getMemoryValueAction(["segment"=> 0x1000, "offset"=> $operand1]), true)['value'];
        $value2MSB = json_decode($this->controller->getMemoryValueAction(["segment"=> 0x1000, "offset"=> $operand1 + 1]), true)['value'];
        $value2 = $value2MSB . $value2LSB;
        $value = hexdec($value1) - hexdec($value2);
        $c = 4 - strlen($value);
        while ($c--) {
            $value = '0' . $value;
        }
        $valueLSB = substr(dechex($value), 2);
        $valueMSB = substr(dechex($value), 0, 2);
        $this->setFlags($value);
        return true;
    }

    /**
     * executes the command with given parameters.
     * @param  string $operand1
     * @param  string $operand2
     * @return boolean true if executed successfully, false on software interept, -1 if problem occurs
     */
    protected function MemoryImediate($operand1, $operand2) {
        $operand1 = substr($operand1, 1, -1);
        $operand1 = hexdec($operand1);
        $value2LSB = json_decode($this->controller->getMemoryValueAction(["segment"=> 0x1000, "offset"=> $operand1]), true)['value'];
        $value2MSB = json_decode($this->controller->getMemoryValueAction(["segment"=> 0x1000, "offset"=> $operand1 + 1]), true)['value'];
        $value2 = $value2MSB . $value2LSB;
        $value = hexdec($operand2) - hexdec($value2);
        $c = 4 - strlen($value);
        while ($c--) {
            $value = '0' . $value;
        }
        $valueLSB = substr(dechex($value), 2);
        $valueMSB = substr(dechex($value), 0, 2);
        $this->setFlags($value);
        return true;
    }

    /**
     * executes the command with given parameters.
     * @param  string $operand1
     * @param  string $operand2
     * @return boolean true if executed successfully, false on software interept, -1 if problem occurs
     */
    protected function Memory8bitImediate($operand1, $operand2) {
        $operand1 = substr($operand1, 1, -1);
        $operand1 = hexdec($operand1);
        $value2 = json_decode($this->controller->getMemoryValueAction(["segment"=> 0x1000, "offset"=> $operand1]), true)['value'];
        $value = hexdec($operand2) - hexdec($value2);
        $c = 4 - strlen($value);
        while ($c--) {
            $value = '0' . $value;
        }
        $valueLSB = substr(dechex($value), 2);
        $valueMSB = substr(dechex($value), 0, 2);
        $this->setFlags($value);
        if($valueMSB != 0) {
        }
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
        return $this->Memory8bitImediate($operand1, $value);
    }
}namespace project\emulate\Emulators\Emulate8086\Src\Domain\Model\Commands;

use Doctrine\ORM\Mapping as ORM;
use TYPO3\Flow\Annotations as Flow;

/**
 * 
 */
class CMP extends CMP_Original implements \TYPO3\Flow\Object\Proxy\ProxyInterface {


	/**
	 * Autogenerated Proxy Method
	 */
	public function __construct() {
		if ('project\emulate\Emulators\Emulate8086\Src\Domain\Model\Commands\CMP' === get_class($this)) {
			$this->Flow_Proxy_injectProperties();
		}

		if (get_class($this) === 'project\emulate\Emulators\Emulate8086\Src\Domain\Model\Commands\CMP') {
			$this->initializeObject(1);
		}
	}

	/**
	 * Autogenerated Proxy Method
	 */
	 public function __wakeup() {

	if (property_exists($this, 'Flow_Persistence_RelatedEntities') && is_array($this->Flow_Persistence_RelatedEntities)) {
		$persistenceManager = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Persistence\PersistenceManagerInterface');
		foreach ($this->Flow_Persistence_RelatedEntities as $entityInformation) {
			$entity = $persistenceManager->getObjectByIdentifier($entityInformation['identifier'], $entityInformation['entityType'], TRUE);
			if (isset($entityInformation['entityPath'])) {
				$this->$entityInformation['propertyName'] = \TYPO3\Flow\Utility\Arrays::setValueByPath($this->$entityInformation['propertyName'], $entityInformation['entityPath'], $entity);
			} else {
				$this->$entityInformation['propertyName'] = $entity;
			}
		}
		unset($this->Flow_Persistence_RelatedEntities);
	}
				$this->Flow_Proxy_injectProperties();
		$result = NULL;

		if (get_class($this) === 'project\emulate\Emulators\Emulate8086\Src\Domain\Model\Commands\CMP') {
			$this->initializeObject(2);
		}
		return $result;
	}

	/**
	 * Autogenerated Proxy Method
	 */
	 public function __sleep() {
		$result = NULL;
		$this->Flow_Object_PropertiesToSerialize = array();
	$reflectionService = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Reflection\ReflectionService');
	$reflectedClass = new \ReflectionClass('project\emulate\Emulators\Emulate8086\Src\Domain\Model\Commands\CMP');
	$allReflectedProperties = $reflectedClass->getProperties();
	foreach ($allReflectedProperties as $reflectionProperty) {
		$propertyName = $reflectionProperty->name;
		if (in_array($propertyName, array('Flow_Aop_Proxy_targetMethodsAndGroupedAdvices', 'Flow_Aop_Proxy_groupedAdviceChains', 'Flow_Aop_Proxy_methodIsInAdviceMode'))) continue;
		if (isset($this->Flow_Injected_Properties) && is_array($this->Flow_Injected_Properties) && in_array($propertyName, $this->Flow_Injected_Properties)) continue;
		if ($reflectionService->isPropertyAnnotatedWith('project\emulate\Emulators\Emulate8086\Src\Domain\Model\Commands\CMP', $propertyName, 'TYPO3\Flow\Annotations\Transient')) continue;
		if (is_array($this->$propertyName) || (is_object($this->$propertyName) && ($this->$propertyName instanceof \ArrayObject || $this->$propertyName instanceof \SplObjectStorage ||$this->$propertyName instanceof \Doctrine\Common\Collections\Collection))) {
			foreach ($this->$propertyName as $key => $value) {
				$this->searchForEntitiesAndStoreIdentifierArray((string)$key, $value, $propertyName);
			}
		}
		if (is_object($this->$propertyName) && !$this->$propertyName instanceof \Doctrine\Common\Collections\Collection) {
			if ($this->$propertyName instanceof \Doctrine\ORM\Proxy\Proxy) {
				$className = get_parent_class($this->$propertyName);
			} else {
				$varTagValues = $reflectionService->getPropertyTagValues('project\emulate\Emulators\Emulate8086\Src\Domain\Model\Commands\CMP', $propertyName, 'var');
				if (count($varTagValues) > 0) {
					$className = trim($varTagValues[0], '\\');
				}
				if (\TYPO3\Flow\Core\Bootstrap::$staticObjectManager->isRegistered($className) === FALSE) {
					$className = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getObjectNameByClassName(get_class($this->$propertyName));
				}
			}
			if ($this->$propertyName instanceof \TYPO3\Flow\Persistence\Aspect\PersistenceMagicInterface && !\TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Persistence\PersistenceManagerInterface')->isNewObject($this->$propertyName) || $this->$propertyName instanceof \Doctrine\ORM\Proxy\Proxy) {
				if (!property_exists($this, 'Flow_Persistence_RelatedEntities') || !is_array($this->Flow_Persistence_RelatedEntities)) {
					$this->Flow_Persistence_RelatedEntities = array();
					$this->Flow_Object_PropertiesToSerialize[] = 'Flow_Persistence_RelatedEntities';
				}
				$identifier = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Persistence\PersistenceManagerInterface')->getIdentifierByObject($this->$propertyName);
				if (!$identifier && $this->$propertyName instanceof \Doctrine\ORM\Proxy\Proxy) {
					$identifier = current(\TYPO3\Flow\Reflection\ObjectAccess::getProperty($this->$propertyName, '_identifier', TRUE));
				}
				$this->Flow_Persistence_RelatedEntities[$propertyName] = array(
					'propertyName' => $propertyName,
					'entityType' => $className,
					'identifier' => $identifier
				);
				continue;
			}
			if ($className !== FALSE && (\TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getScope($className) === \TYPO3\Flow\Object\Configuration\Configuration::SCOPE_SINGLETON || $className === 'TYPO3\Flow\Object\DependencyInjection\DependencyProxy')) {
				continue;
			}
		}
		$this->Flow_Object_PropertiesToSerialize[] = $propertyName;
	}
	$result = $this->Flow_Object_PropertiesToSerialize;
		return $result;
	}

	/**
	 * Autogenerated Proxy Method
	 */
	 private function searchForEntitiesAndStoreIdentifierArray($path, $propertyValue, $originalPropertyName) {

		if (is_array($propertyValue) || (is_object($propertyValue) && ($propertyValue instanceof \ArrayObject || $propertyValue instanceof \SplObjectStorage))) {
			foreach ($propertyValue as $key => $value) {
				$this->searchForEntitiesAndStoreIdentifierArray($path . '.' . $key, $value, $originalPropertyName);
			}
		} elseif ($propertyValue instanceof \TYPO3\Flow\Persistence\Aspect\PersistenceMagicInterface && !\TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Persistence\PersistenceManagerInterface')->isNewObject($propertyValue) || $propertyValue instanceof \Doctrine\ORM\Proxy\Proxy) {
			if (!property_exists($this, 'Flow_Persistence_RelatedEntities') || !is_array($this->Flow_Persistence_RelatedEntities)) {
				$this->Flow_Persistence_RelatedEntities = array();
				$this->Flow_Object_PropertiesToSerialize[] = 'Flow_Persistence_RelatedEntities';
			}
			if ($propertyValue instanceof \Doctrine\ORM\Proxy\Proxy) {
				$className = get_parent_class($propertyValue);
			} else {
				$className = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getObjectNameByClassName(get_class($propertyValue));
			}
			$identifier = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Persistence\PersistenceManagerInterface')->getIdentifierByObject($propertyValue);
			if (!$identifier && $propertyValue instanceof \Doctrine\ORM\Proxy\Proxy) {
				$identifier = current(\TYPO3\Flow\Reflection\ObjectAccess::getProperty($propertyValue, '_identifier', TRUE));
			}
			$this->Flow_Persistence_RelatedEntities[$originalPropertyName . '.' . $path] = array(
				'propertyName' => $originalPropertyName,
				'entityType' => $className,
				'identifier' => $identifier,
				'entityPath' => $path
			);
			$this->$originalPropertyName = \TYPO3\Flow\Utility\Arrays::setValueByPath($this->$originalPropertyName, $path, NULL);
		}
			}

	/**
	 * Autogenerated Proxy Method
	 */
	 private function Flow_Proxy_injectProperties() {
		$memoryRepository_reference = &$this->memoryRepository;
		$this->memoryRepository = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getInstance('project\emulate\Emulators\Emulate8086\Src\Domain\Repository\MemoryRepository');
		if ($this->memoryRepository === NULL) {
			$this->memoryRepository = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getLazyDependencyByHash('ed0f29f99d5134d550ab40fe83204e61', $memoryRepository_reference);
			if ($this->memoryRepository === NULL) {
				$this->memoryRepository = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->createLazyDependency('ed0f29f99d5134d550ab40fe83204e61',  $memoryRepository_reference, 'project\emulate\Emulators\Emulate8086\Src\Domain\Repository\MemoryRepository', function() { return \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('project\emulate\Emulators\Emulate8086\Src\Domain\Repository\MemoryRepository'); });
			}
		}
		$user_reference = &$this->user;
		$this->user = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getInstance('project\emulate\Domain\Model\User');
		if ($this->user === NULL) {
			$this->user = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getLazyDependencyByHash('6b25dc13ed43b23c6060bd7ce4793870', $user_reference);
			if ($this->user === NULL) {
				$this->user = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->createLazyDependency('6b25dc13ed43b23c6060bd7ce4793870',  $user_reference, 'project\emulate\Domain\Model\User', function() { return \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('project\emulate\Domain\Model\User'); });
			}
		}
		$this->validator = new \project\emulate\Emulators\Emulate8086\Src\Domain\Model\Validator();
		$this->controller = new \project\emulate\Emulators\Emulate8086\Src\Controllers\StandardController();
$this->Flow_Injected_Properties = array (
  0 => 'memoryRepository',
  1 => 'user',
  2 => 'validator',
  3 => 'controller',
);
	}
}
#