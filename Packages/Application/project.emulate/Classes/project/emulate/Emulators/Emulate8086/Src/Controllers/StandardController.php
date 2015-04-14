<?php

namespace project\emulate\Emulators\Emulate8086\Src\Controllers;

use TYPO3\Flow\Annotations as Flow;

/**
* A controller for amulator
*/
class StandardController {

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
	 * @var \project\emulate\Domain\Model\User
	 * @Flow\Inject
	 */
	protected $user;

	/**
	 * @var \project\emulate\Emulators\Emulate8086\Src\Domain\Model\Execute
	 * @Flow\Inject
	 */
	protected $execute;

	/**
	 * @var \project\emulate\Emulators\Emulate8086\Src\Domain\Model\Validator
	 * @Flow\Inject
	 */
	protected $validator;

	/**
	 * Injects Memory Repository and Memory for the specific user
	 * @param  \project\emulate\Emulators\Emulate8086\Src\Domain\Repository\MemoryRepository $memoryRepository
	 * @return void
	 */
	public function initializeObject() {
    	$this->memory = $this->memoryRepository->getMemory($this->user->getUserAccount()->getUsername())->getFirst();
    }

	/**
	 * @return string
	 */
	public function getMemoryAction() {
		return [
			'flags' => $this->memory->getFlags(),
			'registers' => $this->memory->getRegisters(),
			'segments' => $this->memory->getSegments()
		];
	}

	/**
	 * @param $memory
	 * @return array
	 */
	public function setMemoryAction($memory) {
		try {
			$this->memory->setFlags($memory['flags']);
			$this->memory->setRegisters($memory['registers']);
			$this->memory->setSegments($memory['segments']);
			$this->memoryRepository->update($this->memory);
			return [true];
		} catch(\TYPO3\Flow\Persistence\Exception\IllegalObjectTypeException $e) {
//			throw $e;
			return [false];
		}
		return [false];
	}

	/**
	 * executes the code from a set offset
	 * @param  array $data
	 * @return string
	 */
	public function executeCodeAction($data) {
		$i = 0;
		$offset = dechex($data["offset"]);
		do {
			$result = $this->execute->executeOffset($offset);
            if(!is_array($result)) {
                if ($result === -1) {
                    //clean or reset the m=code segment found a bug there
                    $segments = $this->memory->getSegments();
                    $segments->setCode([0x0000 => 0x000A, 0xffff => 0x0000]);
                    try {
                        $this->memory->setSegments($segments);
                        $this->memoryRepository->update($this->memory);
                    } catch (\TYPO3\Flow\Persistence\Exception\IllegalObjectTypeException $e) {
                        throw $e;
                    }
                    // return "Memory has been reseted because of fault in code segment";
                    return $this->execute->error;
                }
                $offset = hexdec($offset) + 1;
                $offset = dechex($offset);
                print_r($this->execute->error);
                $i++;
            } else {
                $offset = $result["offset"];
                $result = true;
            }
            if($result === false) echo "here";
		} while($result === true && $i < 1000);
		return 'true';
	}

}

?>