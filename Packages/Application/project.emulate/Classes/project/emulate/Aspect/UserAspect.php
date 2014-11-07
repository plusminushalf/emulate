<?php

namespace project\emulate\Aspect;

use TYPO3\Flow\Annotations as Flow;;

/**
* User aspect class to start user session and store it's properties
* @Flow\Aspect
*/
class UserAspect {

	/**
	 * security context
	 * @var \TYPO3\Flow\Security\Context
	 * @Flow\Inject
	 */
	protected $securityContext;

	/**
	 * @Flow\Inject
	 * @var \project\emulate\Domain\Model\User
	 */
	protected $user;

	/**
	 * token variable
	 * @var \TYPO3\Flow\Security\Authentication\Token\UsernamePassword
	 */
	protected $token;

	/**
	 * useraccount repository
	 * @var \project\emulate\Domain\Repository\UserAccountRepository
	 * @Flow\Inject
	 */
	protected $userAccountRepository;

	/**
	 * useraccount repository
	 * @var \TYPO3\Flow\Security\AccountRepository
	 * @Flow\Inject
	 */
	protected $AccountRepository;

	/**
     * @var \TYPO3\Flow\Security\Authentication\AuthenticationManagerInterface
     * @Flow\Inject
     */
    protected $authenticationManager;

	/**
	 * session check of user object
	 * @param  \TYPO3\Flow\AOP\JoinPointInterface $JoinPoint
	 * @Flow\Before("method(project\emulate\Controller\StandardController->indexAction())");
	 * @return void
	 */
	public function registerUser(\TYPO3\Flow\AOP\JoinPointInterface $JoinPoint) {
		$this->user->setProperty(['AuthenticationError'=>'']);
		$this->token = $this->securityContext->getAuthenticationTokensOfType('\TYPO3\Flow\Security\Authentication\Token\UsernamePassword')[0];
		if($this->token->isAuthenticated()) {
			if(!$this->user->getAuthenticated()) {
				$this->populateUser();
			}
		} else {
			$credentials = $this->token->getCredentials();
			if($credentials['username'] != "" && $credentials['password'] != "") {
				try {
            		$this->authenticationManager->authenticate();
					$this->populateUser();
            	} catch(\TYPO3\Flow\Security\Exception\AuthenticationRequiredException $e) {
            		$this->user->setProperty(['AuthenticationError'=>'Username or Password Wrong']);
            	}
			}
		}
	}

	/**
	 * starts user session
	 * @return void
	 */
	private function populateUser() {
		$this->user->reset();
		$username = $this->token->getAccount()->getAccountIdentifier();
		$query = $this->userAccountRepository->createQuery();
		$query->matching(
			$query->equals('username', $username)
		);
		$useraccount = $query->execute()->getFirst();
		$this->user->setUserAccount($useraccount);
		$this->user->setAuthenticated(TRUE);
		$this->user->setController('standard');
		$this->user->setAction('index');
		$this->user->setEmulaterLoaded("");
	}

}

?>