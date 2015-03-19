<?php
namespace TYPO3\Flow\Composer;

/*                                                                        *
 * This script belongs to the TYPO3 Flow framework.                       *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU Lesser General Public License, either version 3   *
 * of the License, or (at your option) any later version.                 *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

use Composer\Script\CommandEvent;
use Composer\Script\PackageEvent;
use TYPO3\Flow\Utility\Files;

/**
 * Class for Composer install scripts
 */
class InstallerScripts_Original {

	/**
	 * Make sure required paths and files are available outside of Package
	 * Run on every Composer install or update - most be configured in root manifest
	 *
	 * @param CommandEvent $event
	 * @return void
	 */
	static public function postUpdateAndInstall(CommandEvent $event) {
		Files::createDirectoryRecursively('Configuration');
		Files::createDirectoryRecursively('Data');

		Files::copyDirectoryRecursively('Packages/Framework/TYPO3.Flow/Resources/Private/Installer/Distribution/Essentials', './', FALSE, TRUE);
		Files::copyDirectoryRecursively('Packages/Framework/TYPO3.Flow/Resources/Private/Installer/Distribution/Defaults', './', TRUE, TRUE);

		chmod('flow', 0755);
	}

	/**
	 * Calls actions and install scripts provided by installed packages.
	 *
	 * @param \Composer\Script\PackageEvent $event
	 * @return void
	 * @throws Exception\UnexpectedOperationException
	 */
	static public function postPackageUpdateAndInstall(PackageEvent $event) {
		$operation = $event->getOperation();
		if (!$operation instanceof \Composer\DependencyResolver\Operation\InstallOperation &&
			!$operation instanceof \Composer\DependencyResolver\Operation\UpdateOperation) {
			throw new Exception\UnexpectedOperationException('Handling of operation with type "' . $operation->getJobType() . '" not supported', 1348750840);
		}
		$package = ($operation->getJobType() === 'install') ? $operation->getPackage() : $operation->getTargetPackage();
		$packageExtraConfig = $package->getExtra();

		if (isset($packageExtraConfig['typo3/flow'])) {
			if (isset($packageExtraConfig['typo3/flow']['post-install']) && $operation->getJobType() === 'install') {
				self::runPackageScripts($packageExtraConfig['typo3/flow']['post-install']);
			} elseif (isset($packageExtraConfig['typo3/flow']['post-update']) && $operation->getJobType() === 'update') {
				self::runPackageScripts($packageExtraConfig['typo3/flow']['post-update']);
			}

			$installPath = $event->getComposer()->getInstallationManager()->getInstallPath($package);
			$relativeInstallPath = str_replace(getcwd() . '/', '', $installPath);

			if (isset($packageExtraConfig['typo3/flow']['manage-resources']) && $packageExtraConfig['typo3/flow']['manage-resources'] === TRUE) {
				if (is_dir($relativeInstallPath . '/Resources/Private/Installer/Distribution/Essentials')) {
					Files::copyDirectoryRecursively($relativeInstallPath . '/Resources/Private/Installer/Distribution/Essentials', './', FALSE, TRUE);
				}
				if (is_dir($relativeInstallPath . '/Resources/Private/Installer/Distribution/Defaults')) {
					Files::copyDirectoryRecursively($relativeInstallPath . '/Resources/Private/Installer/Distribution/Defaults', './', TRUE, TRUE);
				}
			}
		}
	}

	/**
	 * Calls a static method from it's string representation
	 *
	 * @param string $staticMethodReference
	 * @return void
	 * @throws Exception\InvalidConfigurationException
	 */
	static protected function runPackageScripts($staticMethodReference) {
		$className = substr($staticMethodReference, 0, strpos($staticMethodReference, '::'));
		$methodName = substr($staticMethodReference, strpos($staticMethodReference, '::') + 2);

		if (!class_exists($className)) {
			throw new Exception\InvalidConfigurationException('Class "' . $className . '" is not autoloadable, can not call "' . $staticMethodReference . '"', 1348751076);
		}
		if (!is_callable($staticMethodReference)) {
			throw new Exception\InvalidConfigurationException('Method "' . $staticMethodReference. '" is not callable', 1348751082);
		}
		$className::$methodName();
	}
}
namespace TYPO3\Flow\Composer;

use Doctrine\ORM\Mapping as ORM;
use TYPO3\Flow\Annotations as Flow;

/**
 * Class for Composer install scripts
 */
class InstallerScripts extends InstallerScripts_Original implements \TYPO3\Flow\Object\Proxy\ProxyInterface {


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
			}

	/**
	 * Autogenerated Proxy Method
	 */
	 public function __sleep() {
		$result = NULL;
		$this->Flow_Object_PropertiesToSerialize = array();
	$reflectionService = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Reflection\ReflectionService');
	$reflectedClass = new \ReflectionClass('TYPO3\Flow\Composer\InstallerScripts');
	$allReflectedProperties = $reflectedClass->getProperties();
	foreach ($allReflectedProperties as $reflectionProperty) {
		$propertyName = $reflectionProperty->name;
		if (in_array($propertyName, array('Flow_Aop_Proxy_targetMethodsAndGroupedAdvices', 'Flow_Aop_Proxy_groupedAdviceChains', 'Flow_Aop_Proxy_methodIsInAdviceMode'))) continue;
		if (isset($this->Flow_Injected_Properties) && is_array($this->Flow_Injected_Properties) && in_array($propertyName, $this->Flow_Injected_Properties)) continue;
		if ($reflectionService->isPropertyAnnotatedWith('TYPO3\Flow\Composer\InstallerScripts', $propertyName, 'TYPO3\Flow\Annotations\Transient')) continue;
		if (is_array($this->$propertyName) || (is_object($this->$propertyName) && ($this->$propertyName instanceof \ArrayObject || $this->$propertyName instanceof \SplObjectStorage ||$this->$propertyName instanceof \Doctrine\Common\Collections\Collection))) {
			foreach ($this->$propertyName as $key => $value) {
				$this->searchForEntitiesAndStoreIdentifierArray((string)$key, $value, $propertyName);
			}
		}
		if (is_object($this->$propertyName) && !$this->$propertyName instanceof \Doctrine\Common\Collections\Collection) {
			if ($this->$propertyName instanceof \Doctrine\ORM\Proxy\Proxy) {
				$className = get_parent_class($this->$propertyName);
			} else {
				$varTagValues = $reflectionService->getPropertyTagValues('TYPO3\Flow\Composer\InstallerScripts', $propertyName, 'var');
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
}
#