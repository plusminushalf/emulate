<?php
/**
 * Created by PhpStorm.
 * User: garvitdelhi
 * Date: 19/3/15
 * Time: 6:31 PM
 */

namespace project\emulate\Controller;

use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Mvc\Controller\ActionController;


class EmulatorController extends ActionController {

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
	 * @var string
	 */
	protected $defaultViewObjectName = 'TYPO3\Flow\Mvc\View\JsonView';
	/**
	 * A list of IANA media types which are supported by this controller
	 *
	 * @var array
	 */
	protected $supportedMediaTypes = array('application/json');

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
			$this->view->assign('value', ['data' => 'logout']);
		}
		$this->emulate->boot();
		if($this->emulate->ready()) {
			$data = json_decode($data, true);
			$results =  $this->emulate->callEmulatorController(ucfirst($emulator), $controller, $action, $data);
			$this->view->assign('value', $results);
		}
	}

}