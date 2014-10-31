<?php
namespace project\emulate\Emulators\Emulate8086\Src\Domain\Model;

use TYPO3\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;


/**
* Validator Class
*/
class Validator_Original {

	/**
	 * Line of code to validate
	 * @var string
	 */
	public $line;

	/**
	 * Memory that this line takes to be saved inside code segment
	 * @var int
	 */
	public $memory;

	/**
	 * instruction extracted from line
	 * @var string
	 */
	public $instruction;

	/**
	 * operand1 extracted from line
	 * @var string
	 */
	public $operand1;

	/**
	 * operand2 extracted from line
	 * @var string
	 */
	public $operand2;

	/**
	 * Errors that occured during processing
	 * @var string
	 */
	public $error = '';

	/**
	 * Validates the line
	 * @param  string $line
	 * @return bool
	 */
	public function validate($line) {
		$this->line = split(' ', $line);
		if(!array_key_exists(1, $this->line)) {
    		$this->line[1] = null;
		}
		$this->instruction = $this->line[0];
		$operands = $this->line[1];
		if(strpos($operands, ',') === false) {
			$this->operand1 = null;
			$this->operand2 = null;
		} else {
			$operands = split(',', $operands);
			if(!array_key_exists(1, $operands)) {
	    		$operands[1] = null;
			}
			$this->operand1 = $this->getType($operands[0]);
			$this->operand2 = $this->getType($operands[1]);
		}
		if(!array_key_exists($this->instruction, $this->validInstructions)) {
			$this->error = "Invalid instruction " . $this->instruction;
			return false;
		}
		$valid = false;
		for ($i = 0; $i < count($this->validInstructions[$this->instruction]["operands"]); $i++) {
			$value = $this->validInstructions[$this->instruction]["operands"][$i];
			if($this->operand1 == $value['operand1'] && $this->operand2 == $value['operand2']) {
				$valid = true;
				$this->memory = $this->validInstructions[$this->instruction]['memory'][$i]['memory'];
				break;
			}
		}
		$this->error = "Invalid Operands " . $this->operand1 . " & " . $this->operand2 . " for instruction " . $this->instruction;
		return $valid;
	}

	public function getType($operand) {
		if($operand === null) {
			return null;
		}
		$operand = strtoupper($operand);
		$reg = ['AX', 'BX', 'CX', 'DX', 'DI', 'SI', 'BP', 'SP'];
		$reg8bit = ['AH', 'AL', 'BL', 'BH', 'CH', 'CL', 'DH', 'DL'];
		$sreg = ['DS','ES','SS','CS'];
		if(in_array($operand, $reg)) {
			return 1;
		}
		if(in_array($operand, $reg8bit)) {
			return 2;
		}
		if(in_array($operand, $sreg)) {
			return 3;
		}
		if(preg_match('/\[/',$operand) && preg_match('/\]/',$operand)) {
			$operand = substr($operand, 1, -1);
			if(intval($operand,16)<=intval('ffff',16) && intval($operand,16)>=intval('00',16)) {
				return 6;
			}
			if(in_array($operand, $reg)) {
				return 6;
			}
		}
		$op = '0x' + $operand;
		if(intval($operand,16)<=intval('ff',16) && intval($operand,16)>=intval('00',16)) {
			return 4;
		}
		if(intval($operand,16)<=intval('ffff',16) && intval($operand,16)>intval('ff',16)) {
			return 5;
		}
		return false;
	}

	/**
	 * All the valid instructions and there operands and memory value and status
	 * @var array
	 */
	protected $validInstructions = [
	'AAA'=> [
			'operands' => [ [ 'operand1'=>null, 'operand2'=> null ] ],
			'memory'=> [ [ 'memory'=>0x1 ] ],
			'status'=>0
		],
	'AAD'=> [
			'operands' => [ [ 'operand1'=>null, 'operand2'=> null ] ],
			'memory'=> [ [ 'memory'=>0x1 ] ],
			'status'=>0
		],
	'AAM'=> [
			'operands' => [ [ 'operand1'=>null, 'operand2'=> null ] ],
			'memory'=> [ [ 'memory'=>0x1 ] ],
			'status'=>0
		],
	'AAS'=> [
			'operands' => [ [ 'operand1'=>null, 'operand2'=> null ] ],
			'memory'=> [ [ 'memory'=>0x1 ] ],
			'status'=>0
		],
	'CBW'=> [
			'operands' => [ [ 'operand1'=>null, 'operand2'=> null ] ],
			'memory'=> [ [ 'memory'=>0x1 ] ],
			'status'=>0
		],
	'CLC'=> [
			'operands' => [ [ 'operand1'=>null, 'operand2'=> null ] ],
			'memory'=> [ [ 'memory'=>0x1 ] ],
			'status'=>0
		],
	'CLD'=> [
			'operands' => [ [ 'operand1'=>null, 'operand2'=> null ] ],
			'memory'=> [ [ 'memory'=>0x1 ] ],
			'status'=>0
		],
	'CLI'=> [
			'operands' => [ [ 'operand1'=>null, 'operand2'=> null ] ],
			'memory'=> [ [ 'memory'=>0x1 ] ],
			'status'=>0
		],
	'CMC'=> [
			'operands' => [ [ 'operand1'=>null, 'operand2'=> null ] ],
			'memory'=> [ [ 'memory'=>0x1 ] ],
			'status'=>0
		],
	'CWD'=> [
			'operands' => [ [ 'operand1'=>null, 'operand2'=> null ] ],
			'memory'=> [ [ 'memory'=>0x1 ] ],
			'status'=>0
		],
	'DAA'=> [
			'operands' => [ [ 'operand1'=>null, 'operand2'=> null ] ],
			'memory'=> [ [ 'memory'=>0x1 ] ],
			'status'=>0
		],
	'DAS'=> [
			'operands' => [ [ 'operand1'=>null, 'operand2'=> null ] ],
			'memory'=> [ [ 'memory'=>0x1 ] ],
			'status'=>0
		],
	'HLT'=> [
			'operands' => [ [ 'operand1'=>null, 'operand2'=> null ] ],
			'memory'=> [ [ 'memory'=>0x1 ] ],
			'status'=>0
		],
	'INTO'=> [
			'operands' => [ [ 'operand1'=>null, 'operand2'=> null ] ],
			'memory'=> [ [ 'memory'=>0x1 ] ],
			'status'=>0
		],
	'IRET'=> [
			'operands' => [ [ 'operand1'=>null, 'operand2'=> null ] ],
			'memory'=> [ [ 'memory'=>0x1 ] ],
			'status'=>0
		],
	'LAHF'=> [
			'operands' => [ [ 'operand1'=>null, 'operand2'=> null ] ],
			'memory'=> [ [ 'memory'=>0x1 ] ],
			'status'=>0
		],
	'LODSB'=> [
			'operands' => [ [ 'operand1'=>null, 'operand2'=> null ] ],
			'memory'=> [ [ 'memory'=>0x1 ] ],
			'status'=>0
		],
	'LODSW'=> [
			'operands' => [ [ 'operand1'=>null, 'operand2'=> null ] ],
			'memory'=> [ [ 'memory'=>0x1 ] ],
			'status'=>0
		],
	'MOVSB'=> [
			'operands' => [ [ 'operand1'=>null, 'operand2'=> null ] ],
			'memory'=> [ [ 'memory'=>0x1 ] ],
			'status'=>0
		],
	'MOVSW'=> [
			'operands' => [ [ 'operand1'=>null, 'operand2'=> null ] ],
			'memory'=> [ [ 'memory'=>0x1 ] ],
			'status'=>0
		],
	'NOP'=> [
			'operands' => [ [ 'operand1'=>null, 'operand2'=> null ] ],
			'memory'=> [ [ 'memory'=>0x1 ] ],
			'status'=>0
		],
	'RET'=> [
			'operands' => [ [ 'operand1'=>null, 'operand2'=> null ] ],
			'memory'=> [ [ 'memory'=>0x1 ] ],
			'status'=>0
		],
	'RETF'=> [
			'operands' => [ [ 'operand1'=>null, 'operand2'=> null ] ],
			'memory'=> [ [ 'memory'=>0x1 ] ],
			'status'=>0
		],
	'SAHF'=> [
			'operands' => [ [ 'operand1'=>null, 'operand2'=> null ] ],
			'memory'=> [ [ 'memory'=>0x1 ] ],
			'status'=>0
		],
	'SCASB'=> [
			'operands' => [ [ 'operand1'=>null, 'operand2'=> null ] ],
			'memory'=> [ [ 'memory'=>0x1 ] ],
			'status'=>0
		],
	'SCASW'=> [
			'operands' => [ [ 'operand1'=>null, 'operand2'=> null ] ],
			'memory'=> [ [ 'memory'=>0x1 ] ],
			'status'=>0
		],
	'STC'=> [
			'operands' => [ [ 'operand1'=>null, 'operand2'=> null ] ],
			'memory'=> [ [ 'memory'=>0x1 ] ],
			'status'=>0
		],
	'STD'=> [
			'operands' => [ [ 'operand1'=>null, 'operand2'=> null ] ],
			'memory'=> [ [ 'memory'=>0x1 ] ],
			'status'=>0
		],
	'STI'=> [
			'operands' => [ [ 'operand1'=>null, 'operand2'=> null ] ],
			'memory'=> [ [ 'memory'=>0x1 ] ],
			'status'=>0
		],
	'STOSB'=> [
			'operands' => [ [ 'operand1'=>null, 'operand2'=> null ] ],
			'memory'=> [ [ 'memory'=>0x1 ] ],
			'status'=>0
		],
	'STOSW'=> [
			'operands' => [ [ 'operand1'=>null, 'operand2'=> null ] ],
			'memory'=> [ [ 'memory'=>0x1 ] ],
			'status'=>0
		],
	'XLATB'=> [
			'operands' => [ [ 'operand1'=>null, 'operand2'=> null ] ],
			'memory'=> [ [ 'memory'=>0x1 ] ],
			'status'=>0
		],
	'CALL'=> [
			'operands'=> [
				[ 'operand1'=>5, 'operand2'=> null ]
			],
			'memory'=> [
				[ 'memory'=>0x02 ]
			],
			'status'=>0
		],
	'JA'=> [
			'operands'=> [
				[ 'operand1'=>5, 'operand2'=> null ]
			],
			'memory'=> [
				[ 'memory'=>0x02 ]
			],
			'status'=>0
		],
	'JAE'=> [
			'operands'=> [
				[ 'operand1'=>5, 'operand2'=> null ]
			],
			'memory'=> [
				[ 'memory'=>0x02 ]
			],
			'status'=>0
		],
	'JB'=> [
			'operands'=> [
				[ 'operand1'=>5, 'operand2'=> null ]
			],
			'memory'=> [
				[ 'memory'=>0x02 ]
			],
			'status'=>0
		],
	'JBE'=> [
			'operands'=> [
				[ 'operand1'=>5, 'operand2'=> null ]
			],
			'memory'=> [
				[ 'memory'=>0x02 ]
			],
			'status'=>0
		],
	'JC'=> [
			'operands'=> [
				[ 'operand1'=>5, 'operand2'=> null ]
			],
			'memory'=> [
				[ 'memory'=>0x02 ]
			],
			'status'=>0
		],
	'JCXZ'=> [
			'operands'=> [
				[ 'operand1'=>5, 'operand2'=> null ]
			],
			'memory'=> [
				[ 'memory'=>0x02 ]
			],
			'status'=>0
		],
	'JE'=> [
			'operands'=> [
				[ 'operand1'=>5, 'operand2'=> null ]
			],
			'memory'=> [
				[ 'memory'=>0x02 ]
			],
			'status'=>0
		],
	'JG'=> [
			'operands'=> [
				[ 'operand1'=>5, 'operand2'=> null ]
			],
			'memory'=> [
				[ 'memory'=>0x02 ]
			],
			'status'=>0
		],
	'JGE'=> [
			'operands'=> [
				[ 'operand1'=>5, 'operand2'=> null ]
			],
			'memory'=> [
				[ 'memory'=>0x02 ]
			],
			'status'=>0
		],
	'JL'=> [
			'operands'=> [
				[ 'operand1'=>5, 'operand2'=> null ]
			],
			'memory'=> [
				[ 'memory'=>0x02 ]
			],
			'status'=>0
		],
	'JLE'=> [
			'operands'=> [
				[ 'operand1'=>5, 'operand2'=> null ]
			],
			'memory'=> [
				[ 'memory'=>0x02 ]
			],
			'status'=>0
		],
	'JMP'=> [
			'operands'=> [
				[ 'operand1'=>5, 'operand2'=> null ]
			],
			'memory'=> [
				[ 'memory'=>0x02 ]
			],
			'status'=>0
		],
	'JNA'=> [
			'operands'=> [
				[ 'operand1'=>5, 'operand2'=> null ]
			],
			'memory'=> [
				[ 'memory'=>0x02 ]
			],
			'status'=>0
		],
	'JNAE'=> [
			'operands'=> [
				[ 'operand1'=>5, 'operand2'=> null ]
			],
			'memory'=> [
				[ 'memory'=>0x02 ]
			],
			'status'=>0
		],
	'JNB'=> [
			'operands'=> [
				[ 'operand1'=>5, 'operand2'=> null ]
			],
			'memory'=> [
				[ 'memory'=>0x02 ]
			],
			'status'=>0
		],
	'JNBE'=> [
			'operands'=> [
				[ 'operand1'=>5, 'operand2'=> null ]
			],
			'memory'=> [
				[ 'memory'=>0x02 ]
			],
			'status'=>0
		],
	'JNC'=> [
			'operands'=> [
				[ 'operand1'=>5, 'operand2'=> null ]
			],
			'memory'=> [
				[ 'memory'=>0x02 ]
			],
			'status'=>0
		],
	'JNE'=> [
			'operands'=> [
				[ 'operand1'=>5, 'operand2'=> null ]
			],
			'memory'=> [
				[ 'memory'=>0x02 ]
			],
			'status'=>0
		],
	'JNG'=> [
			'operands'=> [
				[ 'operand1'=>5, 'operand2'=> null ]
			],
			'memory'=> [
				[ 'memory'=>0x02 ]
			],
			'status'=>0
		],
	'JNGE'=> [
			'operands'=> [
				[ 'operand1'=>5, 'operand2'=> null ]
			],
			'memory'=> [
				[ 'memory'=>0x02 ]
			],
			'status'=>0
		],
	'JNL'=> [
			'operands'=> [
				[ 'operand1'=>5, 'operand2'=> null ]
			],
			'memory'=> [
				[ 'memory'=>0x02 ]
			],
			'status'=>0
		],
	'JNLE'=> [
			'operands'=> [
				[ 'operand1'=>5, 'operand2'=> null ]
			],
			'memory'=> [
				[ 'memory'=>0x02 ]
			],
			'status'=>0
		],
	'JNO'=> [
			'operands'=> [
				[ 'operand1'=>5, 'operand2'=> null ]
			],
			'memory'=> [
				[ 'memory'=>0x02 ]
			],
			'status'=>0
		],
	'JNP'=> [
			'operands'=> [
				[ 'operand1'=>5, 'operand2'=> null ]
			],
			'memory'=> [
				[ 'memory'=>0x02 ]
			],
			'status'=>0
		],
	'JNS'=> [
			'operands'=> [
				[ 'operand1'=>5, 'operand2'=> null ]
			],
			'memory'=> [
				[ 'memory'=>0x02 ]
			],
			'status'=>0
		],
	'JNZ'=> [
			'operands'=> [
				[ 'operand1'=>5, 'operand2'=> null ]
			],
			'memory'=> [
				[ 'memory'=>0x02 ]
			],
			'status'=>0
		],
	'JO'=> [
			'operands'=> [
				[ 'operand1'=>5, 'operand2'=> null ]
			],
			'memory'=> [
				[ 'memory'=>0x02 ]
			],
			'status'=>0
		],
	'JP'=> [
			'operands'=> [
				[ 'operand1'=>5, 'operand2'=> null ]
			],
			'memory'=> [
				[ 'memory'=>0x02 ]
			],
			'status'=>0
		],
	'JPE'=> [
			'operands'=> [
				[ 'operand1'=>5, 'operand2'=> null ]
			],
			'memory'=> [
				[ 'memory'=>0x02 ]
			],
			'status'=>0
		],
	'JPO'=> [
			'operands'=> [
				[ 'operand1'=>5, 'operand2'=> null ]
			],
			'memory'=> [
				[ 'memory'=>0x02 ]
			],
			'status'=>0
		],
	'JS'=> [
			'operands'=> [
				[ 'operand1'=>5, 'operand2'=> null ]
			],
			'memory'=> [
				[ 'memory'=>0x02 ]
			],
			'status'=>0
		],
	'JZ'=> [
			'operands'=> [
				[ 'operand1'=>5, 'operand2'=> null ]
			],
			'memory'=> [
				[ 'memory'=>0x01 ]
			],
			'status'=>0
		],
	'LOOP'=> [
			'operands'=> [
				[ 'operand1'=>5, 'operand2'=> null ]
			],
			'memory'=> [
				[ 'memory'=>0x01 ]
			],
			'status'=>0
		],
	'LOOPE'=> [
			'operands'=> [
				[ 'operand1'=>5, 'operand2'=> null ]
			],
			'memory'=> [
				[ 'memory'=>0x01 ]
			],
			'status'=>0
		],
	'LOOPNE'=> [
			'operands'=> [
				[ 'operand1'=>5, 'operand2'=> null ]
			],
			'memory'=> [
				[ 'memory'=>0x01 ]
			],
			'status'=>0
		],
	'LOOPNZ'=> [
			'operands'=> [
				[ 'operand1'=>5, 'operand2'=> null ]
			],
			'memory'=> [
				[ 'memory'=>0x01 ]
			],
			'status'=>0
		],
	'LOOPZ'=> [
			'operands'=> [
				[ 'operand1'=>5, 'operand2'=> null ]
			],
			'memory'=> [
				[ 'memory'=>0x01 ]
			],
			'status'=>0
		],
	'DEC'=> [
			'operands'=> [
				[ 'operand1'=>1,  'operand2'=>null ],
				[ 'operand1'=>6,  'operand2'=>null ]
			],
			'memory'=> [
			[ 'memory'=>0x1 ], [ 'memory'=>0x1 ]
				],
			'status'=>0
		],
	'DIV'=> [
			'operands'=> [
				[ 'operand1'=>1,  'operand2'=>null ],
				[ 'operand1'=>6,  'operand2'=>null ]
			],
			'memory'=> [
			[ 'memory'=>0x1 ], [ 'memory'=>0x1 ]
				],
			'status'=>0
		],
	'IDIV'=> [
			'operands'=> [
				[ 'operand1'=>1,  'operand2'=>null ],
				[ 'operand1'=>6,  'operand2'=>null ]
			],
			'memory'=> [
			[ 'memory'=>0x1 ], [ 'memory'=>0x1 ]
				],
			'status'=>0
		],
	'IMUL'=> [
			'operands'=> [
				[ 'operand1'=>1,  'operand2'=>null ],
				[ 'operand1'=>6,  'operand2'=>null ]
			],
			'memory'=> [
			[ 'memory'=>0x1 ], [ 'memory'=>0x1 ]
				],
			'status'=>0
		],
	'INC'=> [
			'operands'=> [
				[ 'operand1'=>1,  'operand2'=>null ],
				[ 'operand1'=>6,  'operand2'=>null ]
			],
			'memory'=> [
			[ 'memory'=>0x1 ], [ 'memory'=>0x1 ]
				],
			'status'=>0
		],
	'NEG'=> [
			'operands'=> [
				[ 'operand1'=>1,  'operand2'=>null ],
				[ 'operand1'=>6,  'operand2'=>null ]
			],
			'memory'=> [
			[ 'memory'=>0x1 ], [ 'memory'=>0x1 ]
				],
			'status'=>0
		],
	'NOT'=> [
			'operands'=> [
				[ 'operand1'=>1,  'operand2'=>null ],
				[ 'operand1'=>6,  'operand2'=>null ]
			],
			'memory'=> [
			[ 'memory'=>0x1 ], [ 'memory'=>0x1 ]
				],
			'status'=>0
		],
	'INT'=> [
		'operands'=> [
			[ 'operand1'=>4, 'operand2'=> null ]
		],
		'memory'=> [ [ 'memory'=>0x1 ] ],
		'status'=>0
	],
	'POPA'=> [
			'operands' => [ [ 'operand1'=>null, 'operand2'=> null ] ],
			'memory'=> [ [ 'memory'=>0x1 ] ],
			'status'=>0
		],
	'POPF'=> [
			'operands' => [ [ 'operand1'=>null, 'operand2'=> null ] ],
			'memory'=> [ [ 'memory'=>0x1 ] ],
			'status'=>0
		],
	'POP'=> [
		'operands'=> [
			[ 'operand1'=>1, 'operand2'=> null ],
			[ 'operand1'=>3, 'operand2'=> null ],
			[ 'operand1'=>6, 'operand2'=> null ]
		],
		'memory'=> [
			[ 'memory'=>0x1 ], [ 'memory'=>0x1 ], [ 'memory'=>0x1 ]
		],
		'status'=>0
	],
	'PUSHA'=> [
			'operands' => [ [ 'operand1'=>null, 'operand2'=> null ] ],
			'memory'=> [ [ 'memory'=>0x1 ] ],
			'status'=>0
		],
	'PUSHF'=> [
			'operands' => [ [ 'operand1'=>null, 'operand2'=> null ] ],
			'memory'=> [ [ 'memory'=>0x1 ] ],
			'status'=>0
		],
	'PUSH'=> [
		'operands'=> [
			[ 'operand1'=>1, 'operand2'=> null ],
			[ 'operand1'=>3, 'operand2'=> null ],
			[ 'operand1'=>6, 'operand2'=> null ],
			[ 'operand1'=>5, 'operand2'=> null ],
			[ 'operand1'=>4, 'operand2'=> null ]
		],
		'memory'=> [
			[ 'memory'=>0x1 ], [ 'memory'=>0x1 ], [ 'memory'=>0x1 ], [ 'memory'=>0x1 ]
		],
		'status'=>0
	],

	'LDS'=> [
		'operands'=> [
			[ 'operand1'=>1,  'operand2'=>6 ],
			[ 'operand1'=>2,  'operand2'=>6 ]
		],
		'memory'=> [
			[ 'memory'=>0x2 ], [ 'memory'=>0x2 ]
		],
		'status'=>0
	],

	'LEA'=> [
		'operands'=> [
			[ 'operand1'=>1,  'operand2'=>6 ],
			[ 'operand1'=>2,  'operand2'=>6 ]
		],
		'memory'=> [
			[ 'memory'=>0x2 ], [ 'memory'=>0x2 ]
		],
		'status'=>0
	],

	'LES'=> [
		'operands'=> [
			[ 'operand1'=>1,  'operand2'=>6 ],
			[ 'operand1'=>2,  'operand2'=>6 ]
		],
		'memory'=> [
			[ 'memory'=>0x2 ], [ 'memory'=>0x2 ]
		],
		'status'=>0
	],

	'XCHG'=> [
		'operands'=> [
			[ 'operand1'=>6,  'operand2'=>1],
			[ 'operand1'=>1,  'operand2'=>1],
			[ 'operand1'=>1,  'operand2'=>6],
			[ 'operand1'=>2,  'operand2'=>2],
			[ 'operand1'=>2,  'operand2'=>6 ]
		],
		'memory'=> [
			[ 'memory'=>0x2 ], [ 'memory'=>0x2 ], [ 'memory'=>0x2 ], [ 'memory'=>0x2 ], [ 'memory'=>0x2 ]
		],
		'status'=>0
	],

	'MUL'=> [
		'operands'=> [
			[ 'operand1'=>1, 'operand2'=> null ],
			[ 'operand1'=>6, 'operand2'=> null ],
			[ 'operand1'=>2, 'operand2'=> null ]
		],
		'memory'=> [
			[ 'memory'=>0x1 ], [ 'memory'=>0x1 ], [ 'memory'=>0x1 ]
		],
		'status'=>0
	],
	'CMPSB'=> [
			'operands' => [ [ 'operand1'=>null, 'operand2'=> null ] ],
			'memory'=> [ [ 'memory'=>0x1 ] ],
			'status'=>0
		],
	'CMPSW'=> [
			'operands' => [ [ 'operand1'=>null, 'operand2'=> null ] ],
			'memory'=> [ [ 'memory'=>0x1 ] ],
			'status'=>0
		],
	'CMP'=> [
			'operands'=> [
				[ 'operand1'=>1,  'operand2'=>1],
				[ 'operand1'=>1,  'operand2'=>6],
				[ 'operand1'=>2,  'operand2'=>4],
				[ 'operand1'=>6,  'operand2'=>1],
				[ 'operand1'=>6,  'operand2'=>4],
				[ 'operand1'=>1,  'operand2'=>5],
				[ 'operand1'=>6,  'operand2'=>5],
				[ 'operand1'=>2,  'operand2'=>2],
				[ 'operand1'=>2,  'operand2'=>6],
				[ 'operand1'=>1,  'operand2'=>4]
			],
			'memory'=> [
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x3 ],
				[ 'memory'=>0x3 ],
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x2 ]
			],
			'status'=>0
		],
	'OR'=> [
			'operands'=> [
				[ 'operand1'=>1,  'operand2'=>1],
				[ 'operand1'=>1,  'operand2'=>6],
				[ 'operand1'=>2,  'operand2'=>4],
				[ 'operand1'=>6,  'operand2'=>1],
				[ 'operand1'=>6,  'operand2'=>4],
				[ 'operand1'=>1,  'operand2'=>5],
				[ 'operand1'=>6,  'operand2'=>5],
				[ 'operand1'=>2,  'operand2'=>2],
				[ 'operand1'=>2,  'operand2'=>6],
				[ 'operand1'=>1,  'operand2'=>4]
			],
			'memory'=> [
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x3 ],
				[ 'memory'=>0x3 ],
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x2 ]
			],
			'status'=>0
		],
	'SBB'=> [
			'operands'=> [
				[ 'operand1'=>1,  'operand2'=>1],
				[ 'operand1'=>1,  'operand2'=>6],
				[ 'operand1'=>2,  'operand2'=>4],
				[ 'operand1'=>6,  'operand2'=>1],
				[ 'operand1'=>6,  'operand2'=>4],
				[ 'operand1'=>1,  'operand2'=>5],
				[ 'operand1'=>6,  'operand2'=>5],
				[ 'operand1'=>2,  'operand2'=>2],
				[ 'operand1'=>2,  'operand2'=>6],
				[ 'operand1'=>1,  'operand2'=>4]
			],
			'memory'=> [
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x3 ],
				[ 'memory'=>0x3 ],
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x2 ]
			],
			'status'=>0
		],
	'SUB'=> [
		'operands'=> [
			[ 'operand1'=>1,  'operand2'=>1 ],
			[ 'operand1'=>1,  'operand2'=>6 ],
			[ 'operand1'=>2,  'operand2'=>4 ],
			[ 'operand1'=>6,  'operand2'=>1 ],
			[ 'operand1'=>6,  'operand2'=>4 ],
			[ 'operand1'=>1,  'operand2'=>5 ],
			[ 'operand1'=>6,  'operand2'=>5 ],
			[ 'operand1'=>2,  'operand2'=>2 ],
			[ 'operand1'=>2,  'operand2'=>6 ],
			[ 'operand1'=>1,  'operand2'=>4 ]
		],
		'memory'=> [
			[ 'memory'=>0x2 ],
			[ 'memory'=>0x2 ],
			[ 'memory'=>0x2 ],
			[ 'memory'=>0x2 ],
			[ 'memory'=>0x2 ],
			[ 'memory'=>0x3 ],
			[ 'memory'=>0x3 ],
			[ 'memory'=>0x2 ],
			[ 'memory'=>0x2 ],
			[ 'memory'=>0x2 ]
		],
		'status'=>0
	],
	'TEST'=> [
			'operands'=> [
				[ 'operand1'=>1,  'operand2'=>1],
				[ 'operand1'=>1,  'operand2'=>6],
				[ 'operand1'=>2,  'operand2'=>4],
				[ 'operand1'=>6,  'operand2'=>1],
				[ 'operand1'=>6,  'operand2'=>4],
				[ 'operand1'=>1,  'operand2'=>5],
				[ 'operand1'=>6,  'operand2'=>5],
				[ 'operand1'=>2,  'operand2'=>2],
				[ 'operand1'=>2,  'operand2'=>6],
				[ 'operand1'=>1,  'operand2'=>4]
			],
			'memory'=> [
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x3 ],
				[ 'memory'=>0x3 ],
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x2 ]
			],
			'status'=>0
		],
	'XOR'=> [
			'operands'=> [
				[ 'operand1'=>1,  'operand2'=>1],
				[ 'operand1'=>1,  'operand2'=>6],
				[ 'operand1'=>2,  'operand2'=>4],
				[ 'operand1'=>6,  'operand2'=>1],
				[ 'operand1'=>6,  'operand2'=>4],
				[ 'operand1'=>1,  'operand2'=>5],
				[ 'operand1'=>6,  'operand2'=>5],
				[ 'operand1'=>2,  'operand2'=>2],
				[ 'operand1'=>2,  'operand2'=>6],
				[ 'operand1'=>1,  'operand2'=>4]
			],
			'memory'=> [
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x3 ],
				[ 'memory'=>0x3 ],
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x2 ]
			],
			'status'=>0
		],
	'RCL'=> [
			'operands'=> [
				[ 'operand1'=>6,  'operand2'=>4],
				[ 'operand1'=>6,  'operand2'=>2],
				[ 'operand1'=>2,  'operand2'=>4],
				[ 'operand1'=>1,  'operand2'=>2],
				[ 'operand1'=>6,  'operand2'=>5],
				[ 'operand1'=>1,  'operand2'=>5],
				[ 'operand1'=>1,  'operand2'=>4]
			],
			'memory'=> [
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x3 ],
				[ 'memory'=>0x3 ],
				[ 'memory'=>0x2 ]
			],
			'status'=>0
		],
	'RCR'=> [
			'operands'=> [
				[ 'operand1'=>6,  'operand2'=>4],
				[ 'operand1'=>6,  'operand2'=>2],
				[ 'operand1'=>2,  'operand2'=>4],
				[ 'operand1'=>1,  'operand2'=>2],
				[ 'operand1'=>6,  'operand2'=>5],
				[ 'operand1'=>1,  'operand2'=>5],
				[ 'operand1'=>1,  'operand2'=>4]
			],
			'memory'=> [
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x3 ],
				[ 'memory'=>0x3 ],
				[ 'memory'=>0x2 ]
			],
			'status'=>0
		],
	'ROL'=> [
		'operands'=> [
			[ 'operand1'=>6,  'operand2'=>4 ],
			[ 'operand1'=>6,  'operand2'=>'cl' ],
			[ 'operand1'=>2,  'operand2'=>4 ],
			[ 'operand1'=>1,  'operand2'=>'cl' ],
			[ 'operand1'=>6,  'operand2'=>5 ],
			[ 'operand1'=>1,  'operand2'=>5 ],
			[ 'operand1'=>1,  'operand2'=>4 ]
		],
		'memory'=> [
			[ 'memory'=>0x2 ],
			[ 'memory'=>0x2 ],
			[ 'memory'=>0x2 ],
			[ 'memory'=>0x2 ],
			[ 'memory'=>0x3 ],
			[ 'memory'=>0x3 ],
			[ 'memory'=>0x2 ]
		],
		'status'=>0
	],
	'ROR'=> [
			'operands'=> [
				[ 'operand1'=>6,  'operand2'=>4],
				[ 'operand1'=>6,  'operand2'=>2],
				[ 'operand1'=>2,  'operand2'=>4],
				[ 'operand1'=>1,  'operand2'=>2],
				[ 'operand1'=>6,  'operand2'=>5],
				[ 'operand1'=>1,  'operand2'=>5],
				[ 'operand1'=>1,  'operand2'=>4]
			],
			'memory'=> [
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x3 ],
				[ 'memory'=>0x3 ],
				[ 'memory'=>0x2 ]
			],
			'status'=>0
		],
	'SAL'=> [
			'operands'=> [
				[ 'operand1'=>6,  'operand2'=>4],
				[ 'operand1'=>6,  'operand2'=>2],
				[ 'operand1'=>2,  'operand2'=>4],
				[ 'operand1'=>1,  'operand2'=>2],
				[ 'operand1'=>6,  'operand2'=>5],
				[ 'operand1'=>1,  'operand2'=>5],
				[ 'operand1'=>1,  'operand2'=>4]
			],
			'memory'=> [
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x3 ],
				[ 'memory'=>0x3 ],
				[ 'memory'=>0x2 ]
			],
			'status'=>0
		],
	'SAR'=> [
			'operands'=> [
				[ 'operand1'=>6,  'operand2'=>4],
				[ 'operand1'=>6,  'operand2'=>2],
				[ 'operand1'=>2,  'operand2'=>4],
				[ 'operand1'=>1,  'operand2'=>2],
				[ 'operand1'=>6,  'operand2'=>5],
				[ 'operand1'=>1,  'operand2'=>5],
				[ 'operand1'=>1,  'operand2'=>4]
			],
			'memory'=> [
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x3 ],
				[ 'memory'=>0x3 ],
				[ 'memory'=>0x2 ]
			],
			'status'=>0
		],
	'SHL'=> [
			'operands'=> [
				[ 'operand1'=>6,  'operand2'=>4],
				[ 'operand1'=>6,  'operand2'=>2],
				[ 'operand1'=>2,  'operand2'=>4],
				[ 'operand1'=>1,  'operand2'=>2],
				[ 'operand1'=>6,  'operand2'=>5],
				[ 'operand1'=>1,  'operand2'=>5],
				[ 'operand1'=>1,  'operand2'=>4]
			],
			'memory'=> [
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x3 ],
				[ 'memory'=>0x3 ],
				[ 'memory'=>0x2 ]
			],
			'status'=>0
		],
	'SHR'=> [
			'operands'=> [
				[ 'operand1'=>6,  'operand2'=>4],
				[ 'operand1'=>6,  'operand2'=>2],
				[ 'operand1'=>2,  'operand2'=>4],
				[ 'operand1'=>1,  'operand2'=>2],
				[ 'operand1'=>6,  'operand2'=>5],
				[ 'operand1'=>1,  'operand2'=>5],
				[ 'operand1'=>1,  'operand2'=>4]
			],
			'memory'=> [
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x3 ],
				[ 'memory'=>0x3 ],
				[ 'memory'=>0x2 ]
			],
			'status'=>0
		],
	'ADC'=> [
			'operands'=> [
				[ 'operand1'=>1,  'operand2'=>1],
				[ 'operand1'=>1,  'operand2'=>6],
				[ 'operand1'=>2,  'operand2'=>4],
				[ 'operand1'=>6,  'operand2'=>1],
				[ 'operand1'=>6,  'operand2'=>4],
				[ 'operand1'=>1,  'operand2'=>5],
				[ 'operand1'=>6,  'operand2'=>5],
				[ 'operand1'=>2,  'operand2'=>2],
				[ 'operand1'=>2,  'operand2'=>6],
				[ 'operand1'=>1,  'operand2'=>4]
			],
			'memory'=> [
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x3 ],
				[ 'memory'=>0x3 ],
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x2 ]
			],
			'status'=>0
		],
	'ADD'=> [
			'operands'=> [
				[ 'operand1'=>1,  'operand2'=>1],
				[ 'operand1'=>1,  'operand2'=>6],
				[ 'operand1'=>2,  'operand2'=>4],
				[ 'operand1'=>6,  'operand2'=>1],
				[ 'operand1'=>6,  'operand2'=>4],
				[ 'operand1'=>1,  'operand2'=>5],
				[ 'operand1'=>6,  'operand2'=>5],
				[ 'operand1'=>2,  'operand2'=>2],
				[ 'operand1'=>2,  'operand2'=>6],
				[ 'operand1'=>1,  'operand2'=>4]
			],
			'memory'=> [
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x3 ],
				[ 'memory'=>0x3 ],
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x2 ]
			],
			'status'=>1
		],
	'AND'=> [
			'operands'=> [
				[ 'operand1'=>1,  'operand2'=>1],
				[ 'operand1'=>1,  'operand2'=>6],
				[ 'operand1'=>2,  'operand2'=>4],
				[ 'operand1'=>6,  'operand2'=>1],
				[ 'operand1'=>6,  'operand2'=>4],
				[ 'operand1'=>1,  'operand2'=>5],
				[ 'operand1'=>6,  'operand2'=>5],
				[ 'operand1'=>2,  'operand2'=>2],
				[ 'operand1'=>2,  'operand2'=>6],
				[ 'operand1'=>1,  'operand2'=>4]
			],
			'memory'=> [
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x3 ],
				[ 'memory'=>0x3 ],
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x2 ],
				[ 'memory'=>0x2 ]
			],
			'status'=>0
		],
	'MOV'=> [
		'operands'=> [
			[ 'operand1'=>1,  'operand2'=>1 ],
			[ 'operand1'=>1,  'operand2'=>6 ],
			[ 'operand1'=>2,  'operand2'=>4 ],
			[ 'operand1'=>6,  'operand2'=>1 ],
			[ 'operand1'=>6,  'operand2'=>4 ],
			[ 'operand1'=>1,  'operand2'=>5 ],
			[ 'operand1'=>6,  'operand2'=>5 ],
			[ 'operand1'=>2,  'operand2'=>2 ],
			[ 'operand1'=>2,  'operand2'=>6 ],
			[ 'operand1'=>1,  'operand2'=>4 ],
			[ 'operand1'=>6,  'operand2'=>2 ]
		],
		'memory'=> [
			[ 'memory'=>0x2 ],
			[ 'memory'=>0x2 ],
			[ 'memory'=>0x2 ],
			[ 'memory'=>0x2 ],
			[ 'memory'=>0x2 ],
			[ 'memory'=>0x3 ],
			[ 'memory'=>0x3 ],
			[ 'memory'=>0x2 ],
			[ 'memory'=>0x2 ],
			[ 'memory'=>0x2 ],
			[ 'memory'=>0x2 ]
		],
		'status'=>1
	]
	];

}

namespace project\emulate\Emulators\Emulate8086\Src\Domain\Model;

use Doctrine\ORM\Mapping as ORM;
use TYPO3\Flow\Annotations as Flow;

/**
 * Validator Class
 */
class Validator extends Validator_Original implements \TYPO3\Flow\Object\Proxy\ProxyInterface {


	/**
	 * Autogenerated Proxy Method
	 */
	 public function __wakeup() {

	if (property_exists($this, 'Flow_Persistence_RelatedEntities') && is_array($this->Flow_Persistence_RelatedEntities)) {
		$persistenceManager = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Persistence\PersistenceManagerInterface');
		foreach ($this->Flow_Persistence_RelatedEntities as $entityInformation) {
			$entity = $persistenceManager->getObjectByIdentifier($entityInformation['identifier'], $entityInformation['entityType'], TRUE);
			if (isset($entityInformation['entityPath'])) {
				$this->$entityInformation['propertyName'] = \TYPO3\Flow\Utility\Arrays::setValueByPath($this->$entityInformation['propertyName'], $entityInformation['entityPath'], $entity);
			} else {
				$this->$entityInformation['propertyName'] = $entity;
			}
		}
		unset($this->Flow_Persistence_RelatedEntities);
	}
			}

	/**
	 * Autogenerated Proxy Method
	 */
	 public function __sleep() {
		$result = NULL;
		$this->Flow_Object_PropertiesToSerialize = array();
	$reflectionService = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Reflection\ReflectionService');
	$reflectedClass = new \ReflectionClass('project\emulate\Emulators\Emulate8086\Src\Domain\Model\Validator');
	$allReflectedProperties = $reflectedClass->getProperties();
	foreach ($allReflectedProperties as $reflectionProperty) {
		$propertyName = $reflectionProperty->name;
		if (in_array($propertyName, array('Flow_Aop_Proxy_targetMethodsAndGroupedAdvices', 'Flow_Aop_Proxy_groupedAdviceChains', 'Flow_Aop_Proxy_methodIsInAdviceMode'))) continue;
		if (isset($this->Flow_Injected_Properties) && is_array($this->Flow_Injected_Properties) && in_array($propertyName, $this->Flow_Injected_Properties)) continue;
		if ($reflectionService->isPropertyAnnotatedWith('project\emulate\Emulators\Emulate8086\Src\Domain\Model\Validator', $propertyName, 'TYPO3\Flow\Annotations\Transient')) continue;
		if (is_array($this->$propertyName) || (is_object($this->$propertyName) && ($this->$propertyName instanceof \ArrayObject || $this->$propertyName instanceof \SplObjectStorage ||$this->$propertyName instanceof \Doctrine\Common\Collections\Collection))) {
			foreach ($this->$propertyName as $key => $value) {
				$this->searchForEntitiesAndStoreIdentifierArray((string)$key, $value, $propertyName);
			}
		}
		if (is_object($this->$propertyName) && !$this->$propertyName instanceof \Doctrine\Common\Collections\Collection) {
			if ($this->$propertyName instanceof \Doctrine\ORM\Proxy\Proxy) {
				$className = get_parent_class($this->$propertyName);
			} else {
				$varTagValues = $reflectionService->getPropertyTagValues('project\emulate\Emulators\Emulate8086\Src\Domain\Model\Validator', $propertyName, 'var');
				if (count($varTagValues) > 0) {
					$className = trim($varTagValues[0], '\\');
				}
				if (\TYPO3\Flow\Core\Bootstrap::$staticObjectManager->isRegistered($className) === FALSE) {
					$className = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getObjectNameByClassName(get_class($this->$propertyName));
				}
			}
			if ($this->$propertyName instanceof \TYPO3\Flow\Persistence\Aspect\PersistenceMagicInterface && !\TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Persistence\PersistenceManagerInterface')->isNewObject($this->$propertyName) || $this->$propertyName instanceof \Doctrine\ORM\Proxy\Proxy) {
				if (!property_exists($this, 'Flow_Persistence_RelatedEntities') || !is_array($this->Flow_Persistence_RelatedEntities)) {
					$this->Flow_Persistence_RelatedEntities = array();
					$this->Flow_Object_PropertiesToSerialize[] = 'Flow_Persistence_RelatedEntities';
				}
				$identifier = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Persistence\PersistenceManagerInterface')->getIdentifierByObject($this->$propertyName);
				if (!$identifier && $this->$propertyName instanceof \Doctrine\ORM\Proxy\Proxy) {
					$identifier = current(\TYPO3\Flow\Reflection\ObjectAccess::getProperty($this->$propertyName, '_identifier', TRUE));
				}
				$this->Flow_Persistence_RelatedEntities[$propertyName] = array(
					'propertyName' => $propertyName,
					'entityType' => $className,
					'identifier' => $identifier
				);
				continue;
			}
			if ($className !== FALSE && (\TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getScope($className) === \TYPO3\Flow\Object\Configuration\Configuration::SCOPE_SINGLETON || $className === 'TYPO3\Flow\Object\DependencyInjection\DependencyProxy')) {
				continue;
			}
		}
		$this->Flow_Object_PropertiesToSerialize[] = $propertyName;
	}
	$result = $this->Flow_Object_PropertiesToSerialize;
		return $result;
	}

	/**
	 * Autogenerated Proxy Method
	 */
	 private function searchForEntitiesAndStoreIdentifierArray($path, $propertyValue, $originalPropertyName) {

		if (is_array($propertyValue) || (is_object($propertyValue) && ($propertyValue instanceof \ArrayObject || $propertyValue instanceof \SplObjectStorage))) {
			foreach ($propertyValue as $key => $value) {
				$this->searchForEntitiesAndStoreIdentifierArray($path . '.' . $key, $value, $originalPropertyName);
			}
		} elseif ($propertyValue instanceof \TYPO3\Flow\Persistence\Aspect\PersistenceMagicInterface && !\TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Persistence\PersistenceManagerInterface')->isNewObject($propertyValue) || $propertyValue instanceof \Doctrine\ORM\Proxy\Proxy) {
			if (!property_exists($this, 'Flow_Persistence_RelatedEntities') || !is_array($this->Flow_Persistence_RelatedEntities)) {
				$this->Flow_Persistence_RelatedEntities = array();
				$this->Flow_Object_PropertiesToSerialize[] = 'Flow_Persistence_RelatedEntities';
			}
			if ($propertyValue instanceof \Doctrine\ORM\Proxy\Proxy) {
				$className = get_parent_class($propertyValue);
			} else {
				$className = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getObjectNameByClassName(get_class($propertyValue));
			}
			$identifier = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Persistence\PersistenceManagerInterface')->getIdentifierByObject($propertyValue);
			if (!$identifier && $propertyValue instanceof \Doctrine\ORM\Proxy\Proxy) {
				$identifier = current(\TYPO3\Flow\Reflection\ObjectAccess::getProperty($propertyValue, '_identifier', TRUE));
			}
			$this->Flow_Persistence_RelatedEntities[$originalPropertyName . '.' . $path] = array(
				'propertyName' => $originalPropertyName,
				'entityType' => $className,
				'identifier' => $identifier,
				'entityPath' => $path
			);
			$this->$originalPropertyName = \TYPO3\Flow\Utility\Arrays::setValueByPath($this->$originalPropertyName, $path, NULL);
		}
			}
}
#