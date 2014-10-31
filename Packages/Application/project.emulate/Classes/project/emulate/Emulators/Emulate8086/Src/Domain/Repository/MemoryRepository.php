<?php
namespace project\emulate\Emulators\Emulate8086\Src\Domain\Repository;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "project.emulate".       *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Persistence\Repository;

/**
 * @Flow\Scope("singleton")
 */
class MemoryRepository extends Repository {

	// add customized methods here

	/**
	 * returns memory for username
	 * @param  string $username
	 * @return project\emulate\Emulators\Emulate8086\Src\Domain\Model\Memory
	 */
	public function getMemory($username) {
		$query = $this->createQuery();
		$query->matching(
			$query->equals('username', $username)
		);
		$result = $query->execute();
		return $result;
	}

}