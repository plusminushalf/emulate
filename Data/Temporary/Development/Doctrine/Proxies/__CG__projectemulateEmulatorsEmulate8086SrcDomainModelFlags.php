<?php

namespace TYPO3\Flow\Persistence\Doctrine\Proxies\__CG__\project\emulate\Emulators\Emulate8086\Src\Domain\Model;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class Flags extends \project\emulate\Emulators\Emulate8086\Src\Domain\Model\Flags implements \Doctrine\ORM\Proxy\Proxy
{
    private $_entityPersister;
    private $_identifier;
    public $__isInitialized__ = false;
    public function __construct($entityPersister, $identifier)
    {
        $this->_entityPersister = $entityPersister;
        $this->_identifier = $identifier;
    }
    /** @private */
    public function __load()
    {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;

            if (method_exists($this, "__wakeup")) {
                // call this after __isInitialized__to avoid infinite recursion
                // but before loading to emulate what ClassMetadata::newInstance()
                // provides.
                $this->__wakeup();
            }

            if ($this->_entityPersister->load($this->_identifier, $this) === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            unset($this->_entityPersister, $this->_identifier);
        }
    }

    /** @private */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    
    public function __wakeup()
    {
        $this->__load();
        return parent::__wakeup();
    }

    public function Flow_Aop_Proxy_fixMethodsAndAdvicesArrayForDoctrineProxies()
    {
        $this->__load();
        return parent::Flow_Aop_Proxy_fixMethodsAndAdvicesArrayForDoctrineProxies();
    }

    public function Flow_Aop_Proxy_fixInjectedPropertiesForDoctrineProxies()
    {
        $this->__load();
        return parent::Flow_Aop_Proxy_fixInjectedPropertiesForDoctrineProxies();
    }

    public function Flow_Aop_Proxy_invokeJoinPoint(\TYPO3\Flow\Aop\JoinPointInterface $joinPoint)
    {
        $this->__load();
        return parent::Flow_Aop_Proxy_invokeJoinPoint($joinPoint);
    }

    public function getCarry()
    {
        $this->__load();
        return parent::getCarry();
    }

    public function setCarry($carry)
    {
        $this->__load();
        return parent::setCarry($carry);
    }

    public function getParity()
    {
        $this->__load();
        return parent::getParity();
    }

    public function setParity($parity)
    {
        $this->__load();
        return parent::setParity($parity);
    }

    public function getAuxilary()
    {
        $this->__load();
        return parent::getAuxilary();
    }

    public function setAuxilary($auxilary)
    {
        $this->__load();
        return parent::setAuxilary($auxilary);
    }

    public function getZero()
    {
        $this->__load();
        return parent::getZero();
    }

    public function setZero($zero)
    {
        $this->__load();
        return parent::setZero($zero);
    }

    public function getSign()
    {
        $this->__load();
        return parent::getSign();
    }

    public function setSign($sign)
    {
        $this->__load();
        return parent::setSign($sign);
    }

    public function getTrace()
    {
        $this->__load();
        return parent::getTrace();
    }

    public function setTrace($trace)
    {
        $this->__load();
        return parent::setTrace($trace);
    }

    public function getInterept()
    {
        $this->__load();
        return parent::getInterept();
    }

    public function setInterept($interept)
    {
        $this->__load();
        return parent::setInterept($interept);
    }

    public function getDirection()
    {
        $this->__load();
        return parent::getDirection();
    }

    public function setDirection($direction)
    {
        $this->__load();
        return parent::setDirection($direction);
    }

    public function getOverflow()
    {
        $this->__load();
        return parent::getOverflow();
    }

    public function setOverflow($overflow)
    {
        $this->__load();
        return parent::setOverflow($overflow);
    }


    public function __sleep()
    {
        return array_merge(array('__isInitialized__'), parent::__sleep());
    }

    public function __clone()
    {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;
            $class = $this->_entityPersister->getClassMetadata();
            $original = $this->_entityPersister->load($this->_identifier);
            if ($original === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            foreach ($class->reflFields as $field => $reflProperty) {
                $reflProperty->setValue($this, $reflProperty->getValue($original));
            }
            unset($this->_entityPersister, $this->_identifier);
        }
        parent::__clone();
    }
}