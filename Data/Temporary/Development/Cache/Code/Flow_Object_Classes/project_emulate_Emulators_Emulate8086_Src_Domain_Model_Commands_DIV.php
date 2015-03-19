<?php
/**
 * Created by PhpStorm.
 * User: garvit
 * Date: 7/11/14
 * Time: 9:17 AM
 */

namespace project\emulate\Emulators\Emulate8086\Src\Domain\Model\Commands;

use TYPO3\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;
use project\emulate\Emulators\Emulate8086\Src\Domain\Model\CommandInterface;

class DIV_Original implements CommandInterface {

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
     * operand1 extracted from line
     * @var string
     */
    protected $operand1Type;

    /**
     * operand2 extracted from line
     * @var \project\emulate\Emulators\Emulate8086\Src\Domain\Model\Flags
     */
    protected $flags;

    /**
     * Errors that occured during processing
     * @var string
     */
    public $error = '';

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
        $this->operand1Type = $this->validator->getType($operand1);
        $this->flags = $this->memory->getFlags();
        return $this->getFunctionToExecute();
    }

    /**
     * executes the specifuc function and returns it's result
     * @return boolean
     */
    protected function getFunctionToExecute() {
        switch ($this->operand1Type) {
            case 1:
                return $this->regDiv();
                break;
            case 2:
                return $this->reg8bitDiv();
                break;
            case 6:
                return $this->memoryDiv();
                break;
            default:
                return -1;
                break;
        }
    }

    /**
     * Decrease memory block's value.
     * @return bool|int
     */
    protected function memoryDiv() {
        $this->operand1 = substr($this->operand1, 1, -1);
        $type = $this->validator->getType($this->operand1);
        $AX = hexdec(json_decode($this->controller->getRegisterValueAction(["register"=> "AX"]), true)['value']);
        if($type == 1) {
            //register
            $offset = json_decode($this->controller->getRegisterValueAction(["register"=> $this->operand1]), true)['value'];
            $value = json_decode($this->controller->getMemoryValueAction(["segment"=> 0x1000, "offset"=> $offset]), true)['value'];
            $value = hexdec($value);
            $AL = $AX / $value;
            $AH = $AX % $value;
            $AX = $AH . $AL;
            $this->controller->setRegisterValueAction([ "register"=> "AX", "value"=> $AX]);
            return true;
        } elseif($type == 4 || $type == 5) {
            //immediate
            $value = json_decode($this->controller->getMemoryValueAction(["segment"=> 0x1000, "offset"=> $this->operand1]), true)['value'];
            $value = hexdec($value);
            $AL = dechex($AX / $value);
            $c = 2 - strlen($AL);
            while($c--) {
                $AL = '0' . $AL;
            }
            $AH = dechex($AX % $value);
            $AX = $AH . $AL;
            $this->controller->setRegisterValueAction([ "register"=> "AX", "value"=> $AX]);
            return true;
        }
        return -1;
    }

    /**
     * Register Decrement
     * @return bool
     */
    protected function regDiv() {
        $AX = json_decode($this->controller->getRegisterValueAction(["register"=>"AX"]), true)['value'];
        $DX = json_decode($this->controller->getRegisterValueAction(["register"=>"DX"]), true)['value'];
        $c = 4 - strlen($AX);
        while($c--) {
            $AX = '0' . $AX;
        }
        $DXAX = hexdec($DX . $AX);
        $value = hexdec(json_decode($this->controller->getRegisterValueAction(["register"=>$this->operand1]), true)['value']);
        $AX = $DXAX / $value;
        $DX = $DXAX % $value;
        $this->controller->setRegisterValueAction([ "register"=> "AX", "value"=> $AX]);
        $this->controller->setRegisterValueAction([ "register"=> "DX", "value"=> $DX]);
        return true;
    }

    /**
     * register bit Decrement
     * @return bool|int
     */
    protected function reg8bitDiv() {
        switch ($this->operand1) {
            case 'AH':
                $register = 'AX';
                $value = json_decode($this->controller->getRegisterValueAction(["register"=> $register]), true)['value'];
                $AX = hexdec(json_decode($this->controller->getRegisterValueAction(["register"=> "AX"]), true)['value']);
                $c = 4 - strlen($value);
                while ($c--) {
                    $value = '0' . $value;
                }
                $valueMSB = hexdec(substr($value, 0, 2));
                $AL = $AX / $valueMSB;
                $c = 2 - strlen($AL);
                while($c--) {
                    $AL = '0' . $AL;
                }
                $AH = dechex($AX % $valueMSB);
                $value = $AH . $AL;
                $this->controller->setRegisterValueAction([ "register"=> 'AX', "value"=> hexdec($value)]);
                return true;
                break;
            case 'AL':
                $register = 'AX';
                $value = json_decode($this->controller->getRegisterValueAction(["register"=> $register]), true)['value'];
                $AX = hexdec(json_decode($this->controller->getRegisterValueAction(["register"=> "AX"]), true)['value']);
                $c = 4 - strlen($value);
                while ($c--) {
                    $value = '0' . $value;
                }
                $valueLSB = hexdec(substr($value, 2));
                $AL = $AX / $valueLSB;
                $c = 2 - strlen($AL);
                while($c--) {
                    $AL = '0' . $AL;
                }
                $AH = dechex($AX % $valueLSB);
                $value = $AH . $AL;
                $this->controller->setRegisterValueAction([ "register"=> 'AX', "value"=> hexdec($value)]);
                return true;
                break;
            case 'BH':
                $register = 'BX';
                $value = json_decode($this->controller->getRegisterValueAction(["register"=> $register]), true)['value'];
                $AX = hexdec(json_decode($this->controller->getRegisterValueAction(["register"=> "AX"]), true)['value']);
                $c = 4 - strlen($value);
                while ($c--) {
                    $value = '0' . $value;
                }
                $valueMSB = hexdec(substr($value, 0, 2));
                $AL = $AX / $valueMSB;
                $c = 2 - strlen($AL);
                while($c--) {
                    $AL = '0' . $AL;
                }
                $AH = dechex($AX % $valueMSB);
                $value = $AH . $AL;
                $this->controller->setRegisterValueAction([ "register"=> 'AX', "value"=> hexdec($value)]);
                return true;
                break;
            case 'BL':
                $register = 'BX';
                $value = json_decode($this->controller->getRegisterValueAction(["register"=> $register]), true)['value'];
                $AX = hexdec(json_decode($this->controller->getRegisterValueAction(["register"=> "AX"]), true)['value']);
                $c = 4 - strlen($value);
                while ($c--) {
                    $value = '0' . $value;
                }
                $valueLSB = hexdec(substr($value, 2));
                $AL = dechex($AX / $valueLSB);
                $c = 2 - strlen($AL);
                while($c--) {
                    $AL = '0' . $AL;
                }
                $AH = dechex($AX % $valueLSB);
                $value = $AH . $AL;
                $this->controller->setRegisterValueAction([ "register"=> 'AX', "value"=> hexdec($value)]);
                return true;
                break;
            case 'CH':
                $register = 'CX';
                $value = json_decode($this->controller->getRegisterValueAction(["register"=> $register]), true)['value'];
                $AX = hexdec(json_decode($this->controller->getRegisterValueAction(["register"=> "AX"]), true)['value']);
                $c = 4 - strlen($value);
                while ($c--) {
                    $value = '0' . $value;
                }
                $valueMSB = hexdec(substr($value, 0, 2));
                $AL = $AX / $valueMSB;
                $c = 2 - strlen($AL);
                while($c--) {
                    $AL = '0' . $AL;
                }
                $AH = dechex($AX % $valueMSB);
                $value = $AH . $AL;
                $this->controller->setRegisterValueAction([ "register"=> 'AX', "value"=> hexdec($value)]);
                return true;
                break;
            case 'CL':
                $register = 'CX';
                $value = json_decode($this->controller->getRegisterValueAction(["register"=> $register]), true)['value'];
                $AX = hexdec(json_decode($this->controller->getRegisterValueAction(["register"=> "AX"]), true)['value']);
                $c = 4 - strlen($value);
                while ($c--) {
                    $value = '0' . $value;
                }
                $valueLSB = hexdec(substr($value, 2));
                $AL = $AX / $valueLSB;
                $c = 2 - strlen($AL);
                while($c--) {
                    $AL = '0' . $AL;
                }
                $AH = dechex($AX % $valueLSB);
                $value = $AH . $AL;
                $this->controller->setRegisterValueAction([ "register"=> 'AX', "value"=> hexdec($value)]);
                return true;
                break;
            case 'DH':
                $register = 'DX';
                $value = json_decode($this->controller->getRegisterValueAction(["register"=> $register]), true)['value'];
                $AX = hexdec(json_decode($this->controller->getRegisterValueAction(["register"=> "AX"]), true)['value']);
                $c = 4 - strlen($value);
                while ($c--) {
                    $value = '0' . $value;
                }
                $valueMSB = hexdec(substr($value, 0, 2));
                $AL = $AX / $valueMSB;
                $c = 2 - strlen($AL);
                while($c--) {
                    $AL = '0' . $AL;
                }
                $AH = dechex($AX % $valueMSB);
                $value = $AH . $AL;
                $this->controller->setRegisterValueAction([ "register"=> 'AX', "value"=> hexdec($value)]);
                return true;
                break;
            case 'DL':
                $register = 'DX';
                $value = json_decode($this->controller->getRegisterValueAction(["register"=> $register]), true)['value'];
                $AX = hexdec(json_decode($this->controller->getRegisterValueAction(["register"=> "AX"]), true)['value']);
                $c = 4 - strlen($value);
                while ($c--) {
                    $value = '0' . $value;
                }
                $valueLSB = hexdec(substr($value, 2));
                $AL = $AX / $valueLSB;
                $c = 2 - strlen($AL);
                while($c--) {
                    $AL = '0' . $AL;
                }
                $AH = dechex($AX % $valueLSB);
                $value = $AH . $AL;
                $this->controller->setRegisterValueAction([ "register"=> 'AX', "value"=> hexdec($value)]);
                return true;
                break;
            default:
                $this->error = "{$this->operand1} is not correct operand for DEC instruction";
                return -1;
        }
    }
}namespace project\emulate\Emulators\Emulate8086\Src\Domain\Model\Commands;

use Doctrine\ORM\Mapping as ORM;
use TYPO3\Flow\Annotations as Flow;

/**
 * 
 */
class DIV extends DIV_Original implements \TYPO3\Flow\Object\Proxy\ProxyInterface {


	/**
	 * Autogenerated Proxy Method
	 */
	public function __construct() {
		if ('project\emulate\Emulators\Emulate8086\Src\Domain\Model\Commands\DIV' === get_class($this)) {
			$this->Flow_Proxy_injectProperties();
		}

		if (get_class($this) === 'project\emulate\Emulators\Emulate8086\Src\Domain\Model\Commands\DIV') {
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

		if (get_class($this) === 'project\emulate\Emulators\Emulate8086\Src\Domain\Model\Commands\DIV') {
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
	$reflectedClass = new \ReflectionClass('project\emulate\Emulators\Emulate8086\Src\Domain\Model\Commands\DIV');
	$allReflectedProperties = $reflectedClass->getProperties();
	foreach ($allReflectedProperties as $reflectionProperty) {
		$propertyName = $reflectionProperty->name;
		if (in_array($propertyName, array('Flow_Aop_Proxy_targetMethodsAndGroupedAdvices', 'Flow_Aop_Proxy_groupedAdviceChains', 'Flow_Aop_Proxy_methodIsInAdviceMode'))) continue;
		if (isset($this->Flow_Injected_Properties) && is_array($this->Flow_Injected_Properties) && in_array($propertyName, $this->Flow_Injected_Properties)) continue;
		if ($reflectionService->isPropertyAnnotatedWith('project\emulate\Emulators\Emulate8086\Src\Domain\Model\Commands\DIV', $propertyName, 'TYPO3\Flow\Annotations\Transient')) continue;
		if (is_array($this->$propertyName) || (is_object($this->$propertyName) && ($this->$propertyName instanceof \ArrayObject || $this->$propertyName instanceof \SplObjectStorage ||$this->$propertyName instanceof \Doctrine\Common\Collections\Collection))) {
			foreach ($this->$propertyName as $key => $value) {
				$this->searchForEntitiesAndStoreIdentifierArray((string)$key, $value, $propertyName);
			}
		}
		if (is_object($this->$propertyName) && !$this->$propertyName instanceof \Doctrine\Common\Collections\Collection) {
			if ($this->$propertyName instanceof \Doctrine\ORM\Proxy\Proxy) {
				$className = get_parent_class($this->$propertyName);
			} else {
				$varTagValues = $reflectionService->getPropertyTagValues('project\emulate\Emulators\Emulate8086\Src\Domain\Model\Commands\DIV', $propertyName, 'var');
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