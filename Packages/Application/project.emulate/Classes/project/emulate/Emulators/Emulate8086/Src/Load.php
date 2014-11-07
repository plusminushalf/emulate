<?php

namespace project\emulate\Emulators\Emulate8086\Src;

use TYPO3\Flow\Annotations as Flow;
use project\emulate\Domain\Model\LoadInterface;

/**
* bootstrap class
*/
class Load implements LoadInterface {

	/**
	 * represents the state of being emulator loaded or not
	 * @var boolean
	 */
	protected $readyState = FALSE;

	/**
	 * memory
	 * @var \project\emulate\Emulators\Emulate8086\Src\Domain\Model\Memory
	 * @Flow\Inject
	 */
	protected $memory;

	/**
	 * Flags
	 * @var \project\emulate\Emulators\Emulate8086\Src\Domain\Model\Flags
	 * @Flow\Inject
	 */
	protected $flags;

	/**
	 * Registers
	 * @var \project\emulate\Emulators\Emulate8086\Src\Domain\Model\Registers
	 * @Flow\Inject
	 */
	protected $registers;

	/**
	 * Segments
	 * @var \project\emulate\Emulators\Emulate8086\Src\Domain\Model\Segments
	 * @Flow\Inject
	 */
	protected $segments;

	/**
	 * memory repository
	 * @var \project\emulate\Emulators\Emulate8086\Src\Domain\Repository\MemoryRepository
	 * @Flow\Inject
	 */
	protected $memoryRepository;

	/**
	 * user session
	 * @var \project\emulate\Domain\Model\User
	 * @Flow\Inject
	 */
	protected $user;

	/**
	 * persitance manager
	 * @var \TYPO3\Flow\Persistence\PersistenceManagerInterface
	 * @Flow\Inject
	 */
	protected $persistenceManager;

	/**
	 * Booting the emulator
	 * @return void
	 */
	public function boot() {
		try {
			$this->persistenceManager->whitelistObject($this->memory);
			$this->persistenceManager->whitelistObject($this->flags);
			$this->persistenceManager->whitelistObject($this->registers);
			$this->persistenceManager->whitelistObject($this->segments);
			$this->persistenceManager->whitelistObject($this->memoryRepository);
			$result = $this->memoryRepository->getMemory($this->user->getUserAccount()->getUsername());
			if($result->count() == 0) {
				$this->memory->setUsername($this->user->getUserAccount()->getUsername());
				$this->memory->setFlags($this->flags);
				$this->memory->setRegisters($this->registers);
				$this->memory->setSegments($this->segments);
				$this->memoryRepository->add($this->memory);
			}
			$this->readyState = TRUE;
		} catch(\Exception $e) {
			// echo $e->getMessage();
			throw new \Exception($e->getMessage(), 1);
			$this->readyState = FALSE;
		}
	}

	/**
	 * ready state of the emulator
	 * @return boolean
	 */
	public function ready() {
		return $this->readyState;
	}

}

?>