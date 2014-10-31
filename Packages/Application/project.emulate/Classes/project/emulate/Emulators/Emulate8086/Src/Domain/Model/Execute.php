<?php

namespace project\emulate\Emulators\Emulate8086\Src\Domain\Model;

use TYPO3\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;
use project\emulate\Domain\Model\ExecuteInterface;
use project\emulate\Emulators\Emulate8086\Src\Domain\Model\CommandInterface;

/**
* Class to Execute Code
*/
class Execute implements ExecuteInterface {

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
	 * @var \project\emulate\Emulators\Emulate8086\Src\Domain\Model\Validator
	 * @Flow\Inject
	 */
	protected $validator;

	/**
	 * Line of code to validate
	 * @var string
	 */
	protected $line;

	/**
	 * instruction extracted from line
	 * @var string
	 */
	protected $instruction;

	/**
	 * operand1 extracted from line
	 * @var string
	 */
	protected $operand1;

	/**
	 * operand2 extracted from line
	 * @var string
	 */
	protected $operand2;

	/**
	 * [$objectManager description]
	 * @var TYPO3\Flow\Object\ObjectManager
	 * @Flow\Inject
	 */
	protected $objectManager;

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
	 * Gets the line of code from memory check it's validity.
	 * @param  int $offset
	 * @return int returns -1 if code at offset is not correct, true if executed the code correctly, false when there is an software interept.
	 */
	public function executeOffset($offset) {
		$segments = $this->memory->getSegments();
		$line = $segments->getCodeOffset($offset);
		if($line === 0 || $line === -1) {
			return true;
		}
		if(!$this->validator->validate($line)) {
			$this->error = $this->validator->error;
			return -1;
		}
		$this->error = $line;
		return $this->executeLine($line);
	}

	/**
	 * executes the line that is sent by executeOffset
	 * @param  string $line
	 * @return boolean
	 */
	public function executeLine($line) {
		$this->line = split(' ', $line);
		if(!array_key_exists(1, $this->line)) {
    		$this->line[1] = null;
		}
		$this->instruction = $this->line[0];
		$operands = $this->line[1];
		$operands = split(',', $operands);
		if(!array_key_exists(1, $operands)) {
    		$operands[1] = null;
		}
		$command = $this->objectManager->get('project\emulate\Emulators\Emulate8086\Src\Domain\Model\Commands\\' . $this->instruction);
		if($command instanceof CommandInterface) {
			$this->error = $command->error;
			return $command->execute($operands[0], $operands[1]);
		}
		$this->error = "{$this->instruction}'s object can't be found";
		return -1;
	}

}

?>