<?php

namespace project\emulate\Emulators\Emulate8086\Src\Controllers;

use TYPO3\Flow\Annotations as Flow;

/**
* A controller for amulator
*/
class StandardController_Original {

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
	 * @var \project\emulate\Emulators\Emulate8086\Src\Domain\Model\Execute
	 * @Flow\Inject
	 */
	protected $execute;

	/**
	 * @var \project\emulate\Emulators\Emulate8086\Src\Domain\Model\Validator
	 * @Flow\Inject
	 */
	protected $validator;

	/**
	 * Injects Memory Repository and Memory for the specific user
	 * @param  \project\emulate\Emulators\Emulate8086\Src\Domain\Repository\MemoryRepository $memoryRepository
	 * @return void
	 */
	public function initializeObject() {
    	$this->memory = $this->memoryRepository->getMemory($this->user->getUserAccount()->getUsername())->getFirst();
    }

	/**
	 * @return string
	 */
	public function getMemoryAction() {
		return [
			'flags' => $this->memory->getFlags(),
			'registers' => $this->memory->getRegisters(),
			'segments' => $this->memory->getSegments()
		];
	}

    /**
     * Sets the register value sent by ajax
     * @param array $data
     * @return string
     */
    public function setRegisterValueAction($data) {
    	$registers = $this->memory->getRegisters();
		switch($data['register']) {
			case 'AX':
				$registers->setAx($data['value']);
				break;
			case 'BX':
				$registers->setBx($data['value']);
				break;
			case 'CX':
				$registers->setCx($data['value']);
				break;
			case 'DX':
				$registers->setDx($data['value']);
				break;
			case 'SP':
				$registers->setSp($data['value']);
				break;
			case 'BP':
				$registers->setBp($data['value']);
				break;
			case 'SI':
				$registers->setSi($data['value']);
				break;
			case 'DI':
				$registers->setDi($data['value']);
				break;
			default:
		}
		try {
			$this->memory->setRegisters($registers);
			$this->memoryRepository->update($this->memory);
			return 'true';
		} catch(\TYPO3\Flow\Persistence\Exception\IllegalObjectTypeException $e) {
			throw $e;
		}
    }

    /**
     * return the register value
     * @param  array $data
     * @return json
     */
	public function getRegisterValueAction($data) {
		$registers = $this->memory->getRegisters();
		switch($data['register']) {
			case 'AX':
				return json_encode([ 'register'=>'AX', 'value' => strtoupper(dechex($registers->getAx()))]);
				break;
			case 'BX':
				return json_encode([ 'register'=>'BX', 'value' => strtoupper(dechex($registers->getBx()))]);
				break;
			case 'CX':
				return json_encode([ 'register'=>'CX', 'value' => strtoupper(dechex($registers->getCx()))]);
				break;
			case 'DX':
				return json_encode([ 'register'=>'DX', 'value' => strtoupper(dechex($registers->getDx()))]);
				break;
			case 'SP':
				return json_encode([ 'register'=>'SP', 'value' => strtoupper(dechex($registers->getSp()))]);
				break;
			case 'BP':
				return json_encode([ 'register'=>'BP', 'value' => strtoupper(dechex($registers->getBp()))]);
				break;
			case 'SI':
				return json_encode([ 'register'=>'SI', 'value' => strtoupper(dechex($registers->getSi()))]);
				break;
			case 'DI':
				return json_encode([ 'register'=>'DI', 'value' => strtoupper(dechex($registers->getDi()))]);
				break;
			default:
				return 'wrong input' . json_encode($data);
		}
		return 'wrong input' . json_encode($data);
	}

	/**
	 * set the memory's ofset value
	 * @param array $data
	 * @return string
	 */
	public function setMemoryValueAction($data) {
		$segments = $this->memory->getSegments();
		switch($data['segment']) {
			case 0x1000:
				$segments->setValueInData($data['offset'], $data['value']);
				break;
			case 0x2000:
				$segments->setValueInExtra($data['offset'], $data['value']);
				break;
			case 0x3000:
				$segments->setValueInStack($data['offset'], $data['value']);
				break;
		}
		try {
			$this->memory->setSegments($segments);
			$this->memoryRepository->update($this->memory);
			return 'true';
		} catch(\TYPO3\Flow\Persistence\Exception\IllegalObjectTypeException $e) {
			throw $e;
		}
	}

	/**
	 * send the memory block's offset value
	 * @param  array $data
	 * @return json
	 */
	public function getMemoryValueAction($data) {
		$segments = $this->memory->getSegments();
		switch($data['segment']) {
			case 0x1000:
				return json_encode([ 'segment'=>substr($data['segment'], 2), 'offset'=>substr($data['offset'], 2), 'value' => strtoupper(dechex($segments->getDataOffset($data['offset']))) ]);
			case 0x2000:
				return json_encode([ 'segment'=>substr($data['segment'], 2), 'offset'=>substr($data['offset'], 2), 'value' => strtoupper(dechex($segments->getExtraOffset($data['offset']))) ]);
			case 0x3000:
				return json_encode([ 'segment'=>substr($data['segment'], 2), 'offset'=>substr($data['offset'], 2), 'value' => strtoupper(dechex($segments->getStackOffset($data['offset']))) ]);
		}
		return 'wrong input' . json_encode($data);
	}

	/**
	 * save the code entered
	 * @param  array $data
	 * @return string
	 */
	public function saveCodeAction($data) {
		$segments = $this->memory->getSegments();
		foreach($data as $offset=>$value) {
			$code = $value['code'];
			$memory = $value['memory'];
			if(!$this->validator->validate($code)) return $this->validator->error;
			if($this->validator->memory != $memory) return $this->validator->error;
			$segments->setValueInCode($offset, $code);
			while($memory--) {
				$offset++;
				$segments->setValueInCode($offset, -1);
			}
		}
		try {
			$this->memory->setSegments($segments);
			$this->memoryRepository->update($this->memory);
			return 'true';
		} catch(\TYPO3\Flow\Persistence\Exception\IllegalObjectTypeException $e) {
			throw $e;
		}
	}

	/**
	 * executes the code from a set offset
	 * @param  array $data
	 * @return string
	 */
	public function executeCodeAction($data) {
		$i = 0;
		$offset = dechex($data["offset"]);
		do {
			$result = $this->execute->executeOffset($offset);
            if(!is_array($result)) {
                if ($result === -1) {
                    //clean or reset the m=code segment found a bug there
                    $segments = $this->memory->getSegments();
                    $segments->setCode([0x0000 => 0x000A, 0xffff => 0x0000]);
                    try {
                        $this->memory->setSegments($segments);
                        $this->memoryRepository->update($this->memory);
                    } catch (\TYPO3\Flow\Persistence\Exception\IllegalObjectTypeException $e) {
                        throw $e;
                    }
                    // return "Memory has been reseted because of fault in code segment";
                    return $this->execute->error;
                }
                $offset = hexdec($offset) + 1;
                $offset = dechex($offset);
                print_r($this->execute->error);
                $i++;
            } else {
                $offset = $result["offset"];
                $result = true;
            }
            if($result === false) echo "here";
		} while($result === true && $i < 1000);
		return 'true';
	}

}

namespace project\emulate\Emulators\Emulate8086\Src\Controllers;

use Doctrine\ORM\Mapping as ORM;
use TYPO3\Flow\Annotations as Flow;

/**
 * A controller for amulator
 */
class StandardController extends StandardController_Original implements \TYPO3\Flow\Object\Proxy\ProxyInterface {


	/**
	 * Autogenerated Proxy Method
	 */
	public function __construct() {
		if ('project\emulate\Emulators\Emulate8086\Src\Controllers\StandardController' === get_class($this)) {
			$this->Flow_Proxy_injectProperties();
		}

		if (get_class($this) === 'project\emulate\Emulators\Emulate8086\Src\Controllers\StandardController') {
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

		if (get_class($this) === 'project\emulate\Emulators\Emulate8086\Src\Controllers\StandardController') {
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
	$reflectedClass = new \ReflectionClass('project\emulate\Emulators\Emulate8086\Src\Controllers\StandardController');
	$allReflectedProperties = $reflectedClass->getProperties();
	foreach ($allReflectedProperties as $reflectionProperty) {
		$propertyName = $reflectionProperty->name;
		if (in_array($propertyName, array('Flow_Aop_Proxy_targetMethodsAndGroupedAdvices', 'Flow_Aop_Proxy_groupedAdviceChains', 'Flow_Aop_Proxy_methodIsInAdviceMode'))) continue;
		if (isset($this->Flow_Injected_Properties) && is_array($this->Flow_Injected_Properties) && in_array($propertyName, $this->Flow_Injected_Properties)) continue;
		if ($reflectionService->isPropertyAnnotatedWith('project\emulate\Emulators\Emulate8086\Src\Controllers\StandardController', $propertyName, 'TYPO3\Flow\Annotations\Transient')) continue;
		if (is_array($this->$propertyName) || (is_object($this->$propertyName) && ($this->$propertyName instanceof \ArrayObject || $this->$propertyName instanceof \SplObjectStorage ||$this->$propertyName instanceof \Doctrine\Common\Collections\Collection))) {
			foreach ($this->$propertyName as $key => $value) {
				$this->searchForEntitiesAndStoreIdentifierArray((string)$key, $value, $propertyName);
			}
		}
		if (is_object($this->$propertyName) && !$this->$propertyName instanceof \Doctrine\Common\Collections\Collection) {
			if ($this->$propertyName instanceof \Doctrine\ORM\Proxy\Proxy) {
				$className = get_parent_class($this->$propertyName);
			} else {
				$varTagValues = $reflectionService->getPropertyTagValues('project\emulate\Emulators\Emulate8086\Src\Controllers\StandardController', $propertyName, 'var');
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
		$this->execute = new \project\emulate\Emulators\Emulate8086\Src\Domain\Model\Execute();
		$this->validator = new \project\emulate\Emulators\Emulate8086\Src\Domain\Model\Validator();
$this->Flow_Injected_Properties = array (
  0 => 'memoryRepository',
  1 => 'user',
  2 => 'execute',
  3 => 'validator',
);
	}
}
#