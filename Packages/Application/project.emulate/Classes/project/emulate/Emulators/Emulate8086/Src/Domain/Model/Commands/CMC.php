<?php
/**
 * Created by PhpStorm.
 * User: garvit
 * Date: 4/11/14
 * Time: 6:18 PM
 */

namespace project\emulate\Emulators\Emulate8086\Src\Domain\Model\Commands;

use TYPO3\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;
use project\emulate\Emulators\Emulate8086\Src\Domain\Model\CommandInterface;

class CMC implements CommandInterface {

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
     * @return boolean|int|array true if executed successfully, false on software interept, -1 if problem occurs arrar for jump
     */
    public function execute($operand1, $operand2) {
        $flags = $this->memory->getFlags();
        $flags->setCarry(!$flags->getCarry());
        try {
            $this->memory->setFlags($flags);
            $this->memoryRepository->update($this->memory);
            return true;
        } catch(\TYPO3\Flow\Persistence\Exception\IllegalObjectTypeException $e) {
            throw $e;
        }
    }
}