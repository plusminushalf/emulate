<?php
namespace project\emulate\Controller;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "project.emulate".       *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;

class StandardController extends \TYPO3\Flow\Mvc\Controller\ActionController {

	/**
	 * @var \TYPO3\Flow\Security\Authentication\AuthenticationManagerInterface
	 * @Flow\Inject
	 */
	protected $authenticationManager;

	/**
	 * @var \TYPO3\Flow\Security\Context
	 * @Flow\Inject
	 */
	protected $securityContext;

	/**
     * @var \TYPO3\Flow\Security\AccountRepository
     * @Flow\Inject
     */
    protected $accountRepository;

    /**
     * @var \TYPO3\Flow\Security\AccountFactory
     * @Flow\Inject
     */
    protected $accountFactory;

    /**
     * [$requiredToken description]
     * @var \TYPO3\Flow\Security\Authentication\Token\UsernamePassword
     * @Flow\Inject
     */
    protected $requiredToken;

	protected function initializeIndexAction() {
	}

	/**
	 * boot code
	 * @param string $controller controller of request
	 * @param  string $action action to call of base controller
	 * @return void
	 */
	public function indexAction($controller = "standard", $action = "index") {
		$token = $this->securityContext->getAuthenticationTokensOfType('\TYPO3\Flow\Security\Authentication\Token\UsernamePassword')[0];
		$account = $this->securityContext->getAccount();
		if($token->isAuthenticated()) {
			return "<a href='/logout'>logout</a>";
		}
		// if($token->isAuthenticated()) {
		// 	return "<a href='/logout'>logout</a>";
		// }
		if($action != "index" || $controller != "standard") {
			$this->forward($action, $controller);
		}
	}

	public function logoutAction() {
		$this->authenticationManager->logout();
		$this->redirect('index');
	}

	/**
	 * submiting form
	 * @return void
	 */
	public function loginAction() {
        $this->authenticationManager->authenticate();
        // return "logedin";
        $this->redirect('index');
		// return "string";
	}

	/**
     * save the registration
     * @param string $username
     * @param string $password
     */
	public function signupAction($username, $password) {
		$defaultRole = 'user';
  
        if($username == '' || strlen($username) < 3) {
            $this->redirect('index');
        } else {
  
            // create a account with password an add it to the accountRepository
            $account = $this->accountFactory->createAccountWithPassword($username, $password);
            $this->accountRepository->add($account);
            // add a message and redirect to the login form
            $this->redirect('index');
        }
  
        // redirect to the login form
        $this->redirect('index');
	}

}