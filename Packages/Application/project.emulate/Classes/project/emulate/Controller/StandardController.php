<?php
namespace project\emulate\Controller;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "project.emulate".       *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Mvc\Controller\ActionController;

class StandardController extends ActionController {

	/**
	 * @var \TYPO3\Flow\Security\Authentication\AuthenticationManagerInterface
	 * @Flow\Inject
	 */
	protected $authenticationManager;

	/**
	 * @Flow\Inject
	 * @var \project\emulate\Domain\Model\User
	 */
	protected $user;

	/**
	 * Bootstrap for Emulator.
	 * @var \project\emulate\Domain\Model\Emulate
	 * @Flow\Inject
	 */
	protected $emulate;

	/**
	 * account Repository
	 * @var \project\emulate\Domain\Repository\UserAccountRepository
	 * @Flow\Inject
	 */
	protected $userAccountRepository;

	/**
	 * @return void
	 */
	public function indexAction() {
		$this->view->assign('error', $this->user->getProperty());
		if($this->user->getAuthenticated()) {
			$this->forward('home');
		}
	}

	/**
	 * @return void
	 */
	public function logoutAction() {
		$this->user->reset();
		if($this->user->getAuthenticated()) {
			$this->user->setAuthenticated(FALSE);
		}
		$this->authenticationManager->logout();
		$this->forward('index');
	}

	/**
	 * user logged in time to get working showing timeline view :)
	 * @return void
	 */
	public function homeAction() {
		if(!$this->user->getAuthenticated()) {
			$this->forward('index');
		}
		$this->view->assign('active', 'home');
		$this->view->assign('user', $this->user);

		// Start your code here.
	}

	/**
	 * It's Emulator time :D, let's boot it up.
	 * @return void
	 */
	public function emulatorAction() {
		if(!$this->user->getAuthenticated()) {
			$this->forward('index');
		}
		$this->view->assign('active', 'emulator');
		$this->view->assign('user', $this->user);

		// Start your code here.
		$this->view->assign('readyState', FALSE);
		$this->emulate->boot();
		if($this->emulate->ready()) {
			$this->view->assign('readyState', TRUE);
			$emulator = $this->emulate->getEmulatorLoaded();
			$this->view->assign('partial', $emulator->getKey());
			$this->view->assign('emulator', $emulator);
		} else {
			$this->view->assign('emulators', $this->emulate->getEmulators());
		}
	}

	/**
	 * loads the passedEmulator
	 * @param  string $Emulator
	 * @return void
	 */
	public function loadEmulatorAction($Emulator) {
		if(!$this->user->getAuthenticated()) {
			$this->forward('index');
		}
		$account = $this->user->getUserAccount();
		$account->setEmulatorPreference($Emulator);
		$this->userAccountRepository->update($account);
		$this->forward('emulator');
	}

	/**
	 * help out section
	 * @return void
	 */
	public function helpAction() {
		if(!$this->user->getAuthenticated()) {
			$this->forward('index');
		}
		$this->view->assign('active', 'help');
		$this->view->assign('user', $this->user);

		// Start your code here.
	}

	/**
	 * emulator controller loading
	 * @param  string $emulator
	 * @param  string $controller
	 * @param  string $action
	 * @param  string $data
	 * @return string
	 */
	public function emulatorControllerAction($emulator, $controller, $action, $data) {
		if(!$this->user->getAuthenticated()) {
			return "logout";
		}
		$this->emulate->boot();
		if($this->emulate->ready()) {
			$data = json_decode($data, true);
			return $this->emulate->callEmulatorController(ucfirst($emulator), $controller, $action, $data);
		} else {
			$this->forward('index');
		}
	}

}