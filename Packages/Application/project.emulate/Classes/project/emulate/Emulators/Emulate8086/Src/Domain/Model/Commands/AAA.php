<?php
namespace project\emulate\Emulators\Emulate8086\Src\Domain\Model\Commands;

use TYPO3\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;
use project\emulate\Emulators\Emulate8086\Src\Domain\Model\CommandInterface;

/**
* AAA Class
* ASCII Adjust after Addition. Corrects result in AH and AL after addition when working with BCD values.
*/
class AAA implements CommandInterface {

	/**
	 * @var \project\emulate\Emulators\Emulate8086\Src\Domain\Repository\MemoryRepository
	 * @Flow\Inject
	 */
	protected $memoryRepository;

	/**
	 * @var \project\emulate\Emulators\Emulate8086\Src\Domain\Model\Memory
	 */
	protected $memory;

	/**
	 * user session
	 * @var project\emulate\Domain\Model\User
	 * @Flow\Inject
	 */
	protected $user;

	/**
	 * Controller
	 * @var \project\emulate\Emulators\Emulate8086\Src\Controllers\StandardController
	 * @Flow\Inject
	 */
	protected $controller;

	/**
	 * Errors that occured during processing
	 * @var string
	 */
	public $error = '';

	/**
	 * Injects Memory Repository and Memory for the specific user
	 * @param  \project\emulate\Emulators\Emulate8086\Src\Domain\Repository\MemoryRepository $memoryRepository
	 * @return void
	 */
	public function initializeObject() {
    	$this->memory = $this->memoryRepository->getMemory($this->user->getUserAccount()->getUsername())->getFirst();
    }

    /**
	 * executes the command with given parameters.
	 * @param  string $operand1
	 * @param  string $operand2
	 * @return boolean true if executed successfully, false on software interept, -1 if problem occurs
	 */
	public function execute($operand1, $operand2) {
		$flags = $this->memory->getFlags();
		$AF = $flags->getAuxilary();
		$value = json_decode($this->controller->getRegisterValueAction(["register"=> 'AX']), true)['value'];
		$c = 4 - strlen($value);
		while ($c--) {
			$value = '0' . $value;
		}
		$AL = substr($value, 0, 2);
		$AH = substr($value, 2);
		$lowAL = hexdec($value[strlen($value) - 1]);
		if($lowAL > 9 || $AF == 1) {
			$AH = hexdec($AH);
			$AH = dechex(++$AH);
			$AL = hexdec($AL);
			$AL = dechex($AL + 6);
			$AL = '0' . $AL[strlen($AL) - 1];
			$AX = $AH . $AL;
			$this->controller->setRegisterValueAction([ "register"=> 'AX', "value"=> hexdec($AX)]);
			$flags->setAuxilary(1);
			$flags->setCarry(1);
			try {
				$this->memory->setFlags($flags);
				$this->memoryRepository->update($this->memory);
				return true;
			} catch(\TYPO3\Flow\Persistence\Exception\IllegalObjectTypeException $e) {
				throw $e;
			}
		} else {
			$flags->setAuxilary(0);
			$flags->setCarry(0);
			try {
				$this->memory->setFlags($flags);
				$this->memoryRepository->update($this->memory);
				return true;
			} catch(\TYPO3\Flow\Persistence\Exception\IllegalObjectTypeException $e) {
				throw $e;
			}
		}
	}

}

?>