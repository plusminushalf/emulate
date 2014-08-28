<?php

namespace project\emulate\Aspect;

use TYPO3\Flow\Annotations as Flow;

/**
 * @Flow\Aspect
 */
class fooAspect {

	/**
     * try
	 * @param \TYPO3\Flow\AOP\JoinPointInterface $joinPoint
     * @Flow\Before("method(project\emulate\Controller\StandardController->indexAction())")
     * @return void
     */
    public function firsttry(\TYPO3\Flow\AOP\JoinPointInterface $joinPoint) {
    	$controller = $joinPoint->getMethodArgument('controller');
    	$action = $joinPoint->getMethodArgument('action');
    }
}

?>