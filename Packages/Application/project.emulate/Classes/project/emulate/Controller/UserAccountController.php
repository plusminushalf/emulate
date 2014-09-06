<?php
namespace project\emulate\Controller;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "project.emulate".       *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;
use project\emulate\Domain\Model\UserAccount;

class UserAccountController extends \TYPO3\Flow\Mvc\Controller\ActionController {

	/**
     * @var \TYPO3\Flow\Security\AccountFactory
     * @Flow\Inject
     */
    protected $accountFactory;

    /**
     * @var \TYPO3\Flow\Security\AccountRepository
     * @Flow\Inject
     */
    protected $accountRepository;

    /**
     * @var project\emulate\Domain\Repository\UserAccountRepository
     * @Flow\Inject
     */
    protected $userAccountRepository;

    /**
	 * @var \TYPO3\Flow\Security\Context
	 * @Flow\Inject
	 */
	protected $securityContext;

	/**
  	 * @Flow\Inject
 	 * @var \TYPO3\Flow\Session\SessionInterface
 	 */
	protected $session;

	/**
	 * @Flow\Inject
	 * @var project\emulate\Domain\Model\User
	 */
	protected $user;

	/**
	 * @return void
	 */
	public function socialRegistrationAction() {
		$this->redirect('index', 'Base');
	}

	/**
	 * @param project\emulate\Domain\Model\UserAccount $userAccount
	 * @return void
	 */
	public function accountRegistrationAction(userAccount $userAccount = NULL) {
		$this->user->setProperty(['UsernameRegistrationError'=>'']);
		if ($userAccount == NULL || $this->user->getAuthenticated()) {
			$this->redirect('index', 'Standard');
		}
		$userAccount->setProfilePic("");
		$defaultRole = array('project.emulate:User');
		if(!$userAccount->validate($this->userAccountRepository, $this->user)) {
			$this->forward('index', 'Standard');
		}
		$account = $this->accountFactory->createAccountWithPassword($userAccount->getUsername(), $userAccount->getPassword(), $defaultRole);
        $this->accountRepository->add($account);
        $userAccount->setPassword('');
        $this->userAccountRepository->add($userAccount);
        // add a message and redirect to the login form
        $authenticationTokens = $this->securityContext->getAuthenticationTokensOfType('TYPO3\Flow\Security\Authentication\Token\UsernamePassword');
		if (count($authenticationTokens) === 1) {
    		$authenticationTokens[0]->setAccount($account);
    		$authenticationTokens[0]->setAuthenticationStatus(\TYPO3\Flow\Security\Authentication\TokenInterface::AUTHENTICATION_SUCCESSFUL);
    		$this->session->start();
		}
        $this->redirect('index', 'Standard');
	}

	// public function errorAction() {
	// 	$this->forward('index', 'Standard');
	// }

}