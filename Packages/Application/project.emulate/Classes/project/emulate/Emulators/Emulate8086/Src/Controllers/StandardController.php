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
     * Sets the register value sent by ajax
     * @param array $data
     * @return string
     */
    public function setRegisterValueAction($data) {
    	$registers = $this->memory->getRegisters();
		switch($data['register']) {
			case 'AX':
				$registers->setAx($data['value']);
				break;
			case 'BX':
				$registers->setBx($data['value']);
				break;
			case 'CX':
				$registers->setCx($data['value']);
				break;
			case 'DX':
				$registers->setDx($data['value']);
				break;
			case 'SP':
				$registers->setSp($data['value']);
				break;
			case 'BP':
				$registers->setBp($data['value']);
				break;
			case 'SI':
				$registers->setSi($data['value']);
				break;
			case 'DI':
				$registers->setDi($data['value']);
				break;
			default:
		}
		try {
			$this->memory->setRegisters($registers);
			$this->memoryRepository->update($this->memory);
			return 'true';
		} catch(\TYPO3\Flow\Persistence\Exception\IllegalObjectTypeException $e) {
			throw $e;
		}
    }

    /**
     * return the register value
     * @param  array $data
     * @return json
     */
	public function getRegisterValueAction($data) {
		$registers = $this->memory->getRegisters();
		switch($data['register']) {
			case 'AX':
				return json_encode([ 'register'=>'AX', 'value' => strtoupper(dechex($registers->getAx()))]);
				break;
			case 'BX':
				return json_encode([ 'register'=>'BX', 'value' => strtoupper(dechex($registers->getBx()))]);
				break;
			case 'CX':
				return json_encode([ 'register'=>'CX', 'value' => strtoupper(dechex($registers->getCx()))]);
				break;
			case 'DX':
				return json_encode([ 'register'=>'DX', 'value' => strtoupper(dechex($registers->getDx()))]);
				break;
			case 'SP':
				return json_encode([ 'register'=>'SP', 'value' => strtoupper(dechex($registers->getSp()))]);
				break;
			case 'BP':
				return json_encode([ 'register'=>'BP', 'value' => strtoupper(dechex($registers->getBp()))]);
				break;
			case 'SI':
				return json_encode([ 'register'=>'SI', 'value' => strtoupper(dechex($registers->getSi()))]);
				break;
			case 'DI':
				return json_encode([ 'register'=>'DI', 'value' => strtoupper(dechex($registers->getDi()))]);
				break;
			default:
				return 'wrong input' . json_encode($data);
		}
		return 'wrong input' . json_encode($data);
	}

	/**
	 * set the memory's ofset value
	 * @param array $data
	 * @return string
	 */
	public function setMemoryValueAction($data) {
		$segments = $this->memory->getSegments();
		switch($data['segment']) {
			case 0x1000:
				$segments->setValueInData($data['offset'], $data['value']);
				break;
			case 0x2000:
				$segments->setValueInExtra($data['offset'], $data['value']);
				break;
			case 0x3000:
				$segments->setValueInStack($data['offset'], $data['value']);
				break;
		}
		try {
			$this->memory->setSegments($segments);
			$this->memoryRepository->update($this->memory);
			return 'true';
		} catch(\TYPO3\Flow\Persistence\Exception\IllegalObjectTypeException $e) {
			throw $e;
		}
	}

	/**
	 * send the memory block's offset value
	 * @param  array $data
	 * @return json
	 */
	public function getMemoryValueAction($data) {
		$segments = $this->memory->getSegments();
		switch($data['segment']) {
			case 0x1000:
				return json_encode([ 'segment'=>substr($data['segment'], 2), 'offset'=>substr($data['offset'], 2), 'value' => strtoupper(dechex($segments->getDataOffset($data['offset']))) ]);
			case 0x2000:
				return json_encode([ 'segment'=>substr($data['segment'], 2), 'offset'=>substr($data['offset'], 2), 'value' => strtoupper(dechex($segments->getExtraOffset($data['offset']))) ]);
			case 0x3000:
				return json_encode([ 'segment'=>substr($data['segment'], 2), 'offset'=>substr($data['offset'], 2), 'value' => strtoupper(dechex($segments->getStackOffset($data['offset']))) ]);
		}
		return 'wrong input' . json_encode($data);
	}

	/**
	 * save the code entered
	 * @param  array $data
	 * @return string
	 */
	public function saveCodeAction($data) {
		$segments = $this->memory->getSegments();
		foreach($data as $offset=>$value) {
			$code = $value['code'];
			$memory = $value['memory'];
			if(!$this->validator->validate($code)) return $this->validator->error;
			if($this->validator->memory != $memory) return $this->validator->error;
			$segments->setValueInCode($offset, $code);
			while($memory--) {
				$offset++;
				$segments->setValueInCode($offset, -1);
			}
		}
		try {
			$this->memory->setSegments($segments);
			$this->memoryRepository->update($this->memory);
			return 'true';
		} catch(\TYPO3\Flow\Persistence\Exception\IllegalObjectTypeException $e) {
			throw $e;
		}
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