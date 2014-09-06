<?php

namespace project\emulate\Emulators\emulate8086\Classes\Controllers;

use TYPO3\Flow\Annotations as Flow;

/**
* A controller for amulator
*/
class StandardController {

	public function getRegisterValueAction($data) {
		return "register value of data is " . json_encode($data);
	}

	public function getMemoryValueAction($data) {
		return "memory value of data is " . json_encode($data);
	}

}

?>