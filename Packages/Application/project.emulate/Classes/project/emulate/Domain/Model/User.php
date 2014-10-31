<?php
namespace project\emulate\Domain\Model;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "project.emulate".       *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;

/**
 * @Flow\Scope("session")
 */
class User {

	/**
	 * user account information
	 * @var object
	 */
	protected $userAccount;

	/**
	 * @var boolean
	 */
	protected $authenticated = False;

	/**
	 * @var string
	 */
	protected $controller = "";

	/**
	 * @var string
	 */
	protected $action = "";

	/**
	 * @var string
	 */
	protected $emulaterLoaded = "";

	/**
	 * @var array
	 */
	protected $property = [];

	/**
	 * @return project\emulate\Domain\Model\UserAccount
	 */
	public function getUserAccount() {
		return $this->userAccount;
	}

	/**
	 * @param project\emulate\Domain\Model\UserAccount $userAccount
	 * @return void
	 */
	public function setUserAccount($userAccount) {
		$this->userAccount = $userAccount;
	}

	/**
	 * @return boolean
	 */
	public function getAuthenticated() {
		return $this->authenticated;
	}

	/**
	 * @param boolean $authenticated
	 * @Flow\Session(autoStart = TRUE)
	 * @return void
	 */
	public function setAuthenticated($authenticated) {
		$this->authenticated = $authenticated;
	}

	/**
	 * @return string
	 */
	public function getController() {
		return $this->controller;
	}

	/**
	 * @param string $controller
	 * @return void
	 */
	public function setController($controller) {
		$this->controller = $controller;
	}

	/**
	 * @return string
	 */
	public function getAction() {
		return $this->action;
	}

	/**
	 * @param string $action
	 * @return void
	 */
	public function setAction($action) {
		$this->action = $action;
	}

	/**
	 * @return string
	 */
	public function getProperty() {
		return $this->property;
	}

	/**
	 * @param array $property
	 * @return void
	 */
	public function setProperty($property) {
		$this->property[array_keys($property)[0]] = array_values($property)[0];
	}

	/**
	 * @return string
	 */
	public function getEmulaterLoaded() {
		return $this->emulaterLoaded;
	}

	/**
	 * @param string $emulaterLoaded
	 * @return void
	 */
	public function setEmulaterLoaded($emulaterLoaded) {
		$this->emulaterLoaded = $emulaterLoaded;
	}

	public function reset() {
		$this->authenticated = False;
		$this->controller = "";
		$this->action = "";
		$this->emulaterLoaded = "";
		$this->property = [];
	}

}