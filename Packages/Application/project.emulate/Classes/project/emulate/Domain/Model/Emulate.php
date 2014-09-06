<?php

namespace project\emulate\Domain\Model;

use TYPO3\Flow\Annotations as Flow;

/**
* bootstrap code for emulator
*/
class Emulate {

	/**
	 * specifies the state of emulator
	 * @var boolean
	 */
	protected $readyState = FALSE;

	/**
	 * user session
	 * @var project\emulate\Domain\Model\User
	 * @Flow\Inject
	 */
	protected $user;

	/**
	 * setting of my package
	 * @var array
	 * @Flow\Inject(setting="emulators", package="project.emulate")
	 */
	protected $settings;

	/**
	 * Contains all the active emulators
	 * @var array
	 */
	protected $emulatorsConfig;

	/**
	 * [$objectManager description]
	 * @var TYPO3\Flow\Object\ObjectManager
	 * @Flow\Inject
	 */
	protected $objectManager;

	/**
	 * account Repository
	 * @var project\emulate\Domain\Repository\UserAccountRepository
	 * @Flow\Inject
	 */
	protected $userAccountRepository;

	/**
	 * emulator loaded
	 * @var object
	 */
	protected $emulatorLoaded;

    /**
     * [injectEmulator description]
     * @return void
     */
    public function injectEmulator() {
    	foreach ($this->settings as $value) {
    		try {
    			$this->emulatorsConfig[$value] = $this->objectManager->get('project\emulate\Emulators\\' . $value . '\Configuration\Config');
    		} catch(\TYPO3\Flow\Object\Exception\UnknownObjectException $e) {
    			continue;
    		}
    	}
    }

	/**
	 * boots up the emulators
	 * @return void
	 */
	public function boot() {
		if($this->user->getUserAccount()->getEmulatorPreference() != NULL) {
			$this->load($this->user->getUserAccount()->getEmulatorPreference());
		} else {
			$this->getEmulatorsList();
		}
	}

	/**
	 * returns the state of emulator loaded
	 * @return boolean
	 */
	public function ready() {
		return $this->readyState;
	}

	/**
	 * loads the emulator
	 * @param  string $emulator emulator key that has to be loaded
	 * @return void
	 */
	public function load($emulator) {
		try {
			$this->emulatorsConfig[$emulator] = $this->objectManager->get('project\emulate\Emulators\\' . $emulator . '\Configuration\Config');
			$loadEmulator = $this->objectManager->get('project\emulate\Emulators\\' . $emulator . '\Classes\Load');
			$loadEmulator->boot();
			if($loadEmulator->ready()) {
				$this->emulatorLoaded = $this->emulatorsConfig[$emulator];
				$this->readyState = TRUE;
			} else {
				throw new \TYPO3\Flow\Object\Exception\UnknownObjectException("Couldn't Load the spcified Emulator", 1409597948);
			}
		} catch(\TYPO3\Flow\Object\Exception\UnknownObjectException $e) {
			$this->user->getUserAccount()->setEmulatorPreference(NULL);
			$this->userAccountRepository->update($this->user->getUserAccount());
			$this->getEmulatorsList();
		}
	}

	/**
	 * loads all the emulators available to user.
	 * @return void
	 */
	public function getEmulatorsList() {
		$this->injectEmulator();
	}

	/**
	 * returns list of emulators
	 * @return array
	 */
	public function getEmulators() {
		return $this->emulatorsConfig;
	}

	/**
	 * returns list of emulators
	 * @return object
	 */
	public function getEmulatorLoaded() {
		return $this->emulatorLoaded;
	}

	/**
	 * calling the emulator controller
	 * @param  string $emulator
	 * @param  string $controller
	 * @param  string $action
	 * @param  string $data
	 * @return string
	 */
	public function callEmulatorController($emulator, $controller, $action, $data) {
		$controller = $this->objectManager->get('project\emulate\Emulators\\' . $emulator . '\Classes\Controllers\\' . $controller . 'Controller');
		$action = $action . 'Action';
		return $controller->$action($data);
	}
}

?>