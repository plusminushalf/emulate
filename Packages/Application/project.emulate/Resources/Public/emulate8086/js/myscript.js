(function(){

	var siteUrl = 'http://typo.flow/';

	$(document).on('click', '.EditLine', function() {
		$(this).removeClass('EditLine');
		var data = $(this).html();
		$(this).html('<form class="SubmitLine"><input autocomplete="off" class="form-control" value="' + data +'" /><div id="error" class="text-danger"></div></form>');
	});

	$(document).on('click', '.editRegister', function(){
		$(this).removeClass('editRegister');
		var data = $(this).html();
		$(this).html('<form class="SubmitRegister"><input autocomplete="off" class="form-control" value="' + data +'"><div id="error" class="text-danger"></div></form>');
	})

	$(document).on('click', '.editMemory', function(){
		$(this).removeClass('editMemory');
		var data = $(this).html();
		$(this).html('<form class="SubmitMemory"><input autocomplete="off" class="form-control" value="' + data +'"><div id="error" class="text-danger"></div></form>');
	})


	/**
	 * command_E.js
	 * This Objects is for command E and it's working
	 */

	var commandsEntered = function() {
		this.commands = {};
	}

	commandsEntered.prototype = {
		addLine: function(offset, line, memory) {
			this.commands[parseInt(offset, 16)] = {'code':line, 'memory':memory};
		},
		removeLine: function(offset) {
			delete this.commands[parseInt(offset, 16)];
		}
	}

	var commands_entered = new commandsEntered();

	var command_E = function() {

		$(document).on( 'submit', ".SubmitLine", function(e) {
			var parent = $(this).parent();
			var childInput = $(this).children('input');
			if(that.validate(childInput.val())) {
				parent.addClass('EditLine');
				$(this).remove();
				parent.html(childInput.val().toUpperCase());
				commands_entered.addLine(parent.attr('data-offset'), childInput.val().toUpperCase(), this.memory);
			} else {
				$(this).children('div').html('Wrong command');
			}
			e.preventDefault();
		});

		var that = this;
		this.command = "E";
		this.offset = undefined;
		this.memory = 0x0000;
		this.segment = '0x0000';
		this.display = "To edit a line click on it ;)<br>";
		this.addLine = function(line) {
			if(this.offset == undefined){
				line = '0x' + line;
				if(line>=0x0000 && line<=0xffff) {
					this.offset = line.substring(2);
					$("#display").html($("#display").html() + '<br>A0000:' + line.substring(2));
					return true;
				}
				return false;
			}
			if(this.validate(line)) {
				var data = ($("#display").html()!='')?$("#display").html() + '<br>':'';
				$("#display").html(data + '1000:' + this.offset + ' <c class="EditLine text-info" data-offset="' + this.offset + '">' + line + '</c>');
				commands_entered.addLine(this.offset, line, this.memory);
				this.offset = parseInt(this.offset, 16) + parseInt(this.memory, 16);
				this.offset = this.offset.toString(16).toUpperCase();
				return true;
			}
			return false;
		}
		this.validate = function(line) {
			line = line.split(' ');
			var instruction = line[0];
			var operands = line[1];
			if(validInstructions.hasOwnProperty(instruction)) {
				if(operands != undefined) {
					operands = operands.split(',');
					operands = { operand1: this.getType( operands[0] ), operand2: this.getType( operands[1] )};
				} else {
					operands = { operand1: undefined, operand2: undefined };
				}
				var valOperand = validInstructions[instruction].operands;
				for(var x=0; x<valOperand.length; x++) {
					if(valOperand[x].operand1 == operands.operand1 && valOperand[x].operand2 == operands.operand2) {
						this.memory = validInstructions[instruction].memory[x].memory;
						return true;
					}
				}
			}
			return false;
		}
		this.getType = function(operand) {
			if(operand === undefined) {
				return undefined;
			}
			operand = operand.toUpperCase();
			var reg = ['AX', 'BX', 'CX', 'DX', 'DI', 'SI', 'BP', 'SP'];
			var reg8bit = ['AH', 'AL', 'BL', 'BH', 'CH', 'CL', 'DH', 'DL'];
			var sreg = ['DS','ES','SS','CS'];
			if(reg.indexOf(operand) > -1) {
				return 1;
			}
			if(reg8bit.indexOf(operand) > -1) {
				return 2;
			}
			if(sreg.indexOf(operand) > -1) {
				return 3;
			}
			op = '0x' + operand;
			if(op > 0x00 && op < 0xff) {
				return 4;
			}
			if(op > 0xff && op < 0xffff) {
				return 5;
			}
			if(operand.match(/\[/) && (operand.match(/\]/))) {
				operand = operand.substring(1, operand.length - 1);
				op = '0x' + operand;
				if(op > 0x0000 && op < 0xffff) {
					return 6;
				}
				if(reg.indexOf(operand) > -1) {
					return 6;
				}
			}
			return false;
		}
		this.save = function(cb) {
			console.log(JSON.stringify(commands_entered.commands));
			$("#display").html('wait');
			return ajax(siteUrl + 'emulate/emulate8086/Standard/saveCode',
				{
					data: JSON.stringify(commands_entered.commands)
				}
			).done(function(data) {
				if(data == 'logout') {
					location.reload();
				}
				if(data == 'true') {
					delete commands_entered;
					commands_entered = new commandsEntered();
					return cb();
				} else {
					console.log(data);
					$("#display").html('Error while trying to save your code,\
					 It has some errors. Please refresh the page and try again');
				}
			});
		}
	}

	command_E.prototype = {
		generateDisplay: function() {
			$("#display").html(this.display);
			return true;
		},
		process: function(option) {
			if(option!='') {
				if(option == 'Q') {
					return this.save(function() {
						$(document).trigger($.Event('keydown', {which: 27}));
						return true;
					});
				}
				return this.addLine(option);
			}
			return false;
		},
		reset: function() {
			this.optionLoaded = false;
			this.command = "E";
			this.offset = undefined;
			this.segment = '0x0000';
		}
	}

	/**
	 * command_G.js
	 * This Objects is for command G and it's working
	 */
	var command_G = function() {
		var that = this;
		this.command = "G";
		this.display = "1: Burst";
		this.optionLoaded = false;
		this.acceptedOptions = {
			'1':function(option) {
				if(!that.optionLoaded){
					that.optionLoaded = "1";
					$("#display").html("Only Code segment can be bursted right now so please enter offset address.");
					return true;
				}
				option = '0x' + option;
				if(option>=0x0000 && option<=0xffff) {
					$("#display").html('wait');
					return ajax(siteUrl + 'emulate/emulate8086/Standard/executeCode',
						{
							data: JSON.stringify({"offset": parseInt(option, 16)})
						}
					).done(function(data) {
						if(data == 'logout') {
							location.reload();
						}
						$("#display").html(data);
						// $(document).trigger($.Event('keydown', {which: 27}));
						return true;
					});
				} else {
					return false;
				}
			},
			reset: function() {
				this.segment = undefined;
			}
		};
	}

	command_G.prototype = {
		generateDisplay: function() {
			$("#display").html(this.display);
			return true;
		},
		process: function(option) {
			if(!this.optionLoaded){
				if(this.acceptedOptions.hasOwnProperty(option)) {
					return this.acceptedOptions[option](option);
				}
			} else {
				return this.acceptedOptions[this.optionLoaded](option);
			}
			return false;
		},
		reset: function() {
			this.acceptedOptions.reset();
			this.optionLoaded = false;
		}
	}

	/**
	 * command_S.js
	 * This Objects is for command s and it's working
	 */
	var command_S = function() {

		$(document).on('submit', '.SubmitRegister', function(e) {
			var that = $(this);
			var parent = $(this).parent();
			var childInput = $(this).children('input');
			option = '0x' + childInput.val();
			if(option>=0x0000 && option<=0xffff) {
				ajax(siteUrl + 'emulate/emulate8086/Standard/setRegisterValue',
					{
						data: JSON.stringify({ "register": parent.attr('data-register'), "value": parseInt(option, 16)})
					}
				).done(function(data) {
					if(data == 'logout') {
						location.reload();
					}
					that.remove();
					if(data == 'true') {
						parent.addClass('editRegister');
						parent.html(option.substring(2).toUpperCase());
					} else {
						$('#display').html('Got Some Problem Please refresh the page');
					}
				});
				parent.html('wait');
			} else {
				$(this).children('div').html('Wrong command');
			}
			e.preventDefault();
		})

		$(document).on('submit', '.SubmitMemory', function(e) {
			var that = $(this);
			var parent = $(this).parent();
			var childInput = $(this).children('input');
			option = '0x' + childInput.val();
			if(option>=0x0000 && option<=0xff) {
				ajax(siteUrl + 'emulate/emulate8086/Standard/setMemoryValue',
					{
						data: JSON.stringify({ "segment": parseInt('0x' + parent.attr('data-segment'), 16), "offset": parseInt('0x' + parent.attr('data-offset'), 16), "value": parseInt(option, 16)})
					}
				).done(function(data) {
					if(data == 'logout') {
						location.reload();
					}
					console.log(data);
					that.remove();
					if(data == 'true') {
						parent.addClass('editMemory');
						parent.html(option.substring(2).toUpperCase());
					} else {
						$('#display').html('Got Some Problem Please refresh the page');
					}
				});
				parent.html('wait');
			} else {
				$(this).children('div').html('Wrong command');
			}
			e.preventDefault();
		})

		var that = this;
		this.command = "S";
		this.display = "1: Memory<br>2: Register";
		this.optionLoaded = false;
		this.acceptedOptions = {
			'1':function(option) {
				if(!that.optionLoaded){
					that.optionLoaded = "1";
					$("#display").html("Enter Memory Segment<br>0000: Code Segment (You can't access it)<br>1000: Data Segment<br>2000: Extra Segment<br>3000: Stack Segment");
					return true;
				}
				option = '0x' + option;
				this.allowedSegments = ['0x1000', '0x2000', '0x3000']
				if(this.segment == undefined) {
					if(this.allowedSegments.indexOf(option) > -1) {
						this.segment = option;
						$("#display").html('Ofset');
						return true;
					}
				} else {
					if(option>=0x0000 && option<=0xffff) {
						ajax(siteUrl + 'emulate/emulate8086/Standard/getMemoryValue',
							{
								data: JSON.stringify({ "segment": this.segment, "offset": option})
							}
						).done(function(data) {
							if(data == 'logout') {
								location.reload();
							}
							console.log(data);
							data = $.parseJSON(data);
							$('#display').html(data.segment + ':' + data.offset + ' ' + '<c class="editMemory text-info" data-segment="' + data.segment + '" data-offset="' + data.offset + '">' + data.value + '</c>');
						});
						$("#display").html('wait');
						return true;
					} else {
						return false;
					}
				}
			},
			'2':function(option) {
				if(!that.optionLoaded){
					that.optionLoaded = "2";
					$("#display").html("Enter Register");
					return true;
				}
				this.acceptedRegisters = ['AX', 'BX', 'CX', 'DX', 'SP', 'BP', 'SI', 'DI'];
				if(this.acceptedRegisters.indexOf(option) == -1) {
					return false;
				}
				ajax(siteUrl + 'emulate/emulate8086/Standard/getRegisterValue',
					{
						"data": JSON.stringify({"register": option})
					}
				).done(function(data) {
					if(data == 'logout') {
						location.reload();
					}
					data = $.parseJSON(data);
					$('#display').html(data.register + ': ' + '<c class="editRegister text-info" data-register="' + data.register + '">' + data.value + '</c>');
				});
				$("#display").html('wait');
				return true;
			}
		};
	}

	command_S.prototype = {
		generateDisplay: function() {
			$("#display").html(this.display);
			return true;
		},
		process: function(option) {
			if(!this.optionLoaded){
				if(this.acceptedOptions.hasOwnProperty(option)) {
					return this.acceptedOptions[option](option);
				}
			} else {
				return this.acceptedOptions[this.optionLoaded](option);
			}
			return false;
		},
		reset: function() {
			this.optionLoaded = false;
		}
	}

	/**
	 * Terminal.js
	 * This Objects is responsible for holding the allowed commands that can be executed
	 */
	var supportedCommands = function() {
		this.E = new command_E();
		this.G = new command_G();
		this.S = new command_S();
	}
	supportedCommands.prototype = {
		check: function(command) {
			this.acceptedRegisters = ['E', 'G', 'S'];
			if(this.acceptedRegisters.indexOf(command) == -1) {
				return false;
			}
			return true;
		},
		getCommand: function(command) {
			switch(command) {
				case 'E':
					return this.E;
					break;
				case 'G':
					return this.G;
					break;
				case 'S':
					return this.S;
					break;
			}
		}
	}

	/**
	 * Terminal.js
	 * This Terminal object which is responsible of all the working.
	 */

	var Terminal = function() {
		this.loadedCommand = false;
		this.supportedCommands = new supportedCommands();
	}
	Terminal.prototype = {
		load: function(command) {
			if(this.supportedCommands.check(command)) {
				this.loadedCommand = this.supportedCommands.getCommand(command);
				return this.loadedCommand.generateDisplay();
			}
			return false;
		},
		process: function(option) {
			return this.loadedCommand.process(option);
		},
		reset: function() {
			if(this.loadedCommand) {
				this.loadedCommand.reset();
				this.loadedCommand = false;
			}
			$("#display").html("E: Ex_Mon<br>G: Go To<br>S: Sub_MIR");
			$("#command").val("");
		}
	}

	/**
	 * myscript.js
	 * Connecting Terminal to the user interface
	 */
	var terminal = new Terminal();
	$("#inputcode").submit(function(e) {
		command = $("#command").val().toUpperCase().trim();
		if(!terminal.loadedCommand) {
			if(terminal.load(command)) {
				$("#error").text("");
				$("#command").val("")
			}  else {
				$("#error").text("Wrong Command Entered");
			}
		} else {
			if(terminal.process(command)) {
				$("#error").text("");
				$("#command").val("");
			} else {
				$("#error").text("Wrong Option Entered");
			}
		}
		e.preventDefault();
	});
	$(document).on('keydown', function(e) {
		if(e.which == 27) {
			terminal.reset();
			delete terminal;
			terminal = new Terminal();
			$("#error").text("");
		}
	});
}).call(this);

var singleGenerateInstructionObject = function(stts) {
	return {
		operands: [ { operand1:undefined, operand2: undefined } ],
		memory: [ { memory:0x1 } ],
		status:stts
	}
}

var doubleGenerateInstructionObject = function(mem, stts) {
	return {
		operands: [
			{ operand1:5, operand2: undefined }
		],
		memory: [
			{ memory:mem }
		],
		status:stts
	}
}

var instructorObject = function(stts) {
	return {
		operands: [
			{ operand1:1,  operand2:undefined },
			{ operand1:6,  operand2:undefined }
		],
		memory: [
			{ memory:0x1 }, { memory:0x1 }
		],
		status:stts
	}
}

var addLikeInstructionObject = function(stts) {
	return {
		operands: [
			{ operand1:1,  operand2:1},
			{ operand1:1,  operand2:6},
			{ operand1:2,  operand2:4},
			{ operand1:6,  operand2:1},
			{ operand1:6,  operand2:4},
			{ operand1:1,  operand2:5},
			{ operand1:6,  operand2:5},
			{ operand1:2,  operand2:2},
			{ operand1:2,  operand2:6},
			{ operand1:1,  operand2:4}
		],
		memory: [
			{ memory:0x2 },
			{ memory:0x2 },
			{ memory:0x2 },
			{ memory:0x2 },
			{ memory:0x2 },
			{ memory:0x3 },
			{ memory:0x3 },
			{ memory:0x2 },
			{ memory:0x2 },
			{ memory:0x2 }
		],
		status:stts
	}
}

var shrLikeInstructionObject = function(stts) {
	return {
		operands: [
			{ operand1:6,  operand2:4},
			{ operand1:6,  operand2:2},
			{ operand1:2,  operand2:4},
			{ operand1:1,  operand2:2},
			{ operand1:6,  operand2:5},
			{ operand1:1,  operand2:5},
			{ operand1:1,  operand2:4 }
		],
		memory: [
			{ memory:0x2 },
			{ memory:0x2 },
			{ memory:0x2 },
			{ memory:0x2 },
			{ memory:0x3 },
			{ memory:0x3 },
			{ memory:0x2 }
		],
		status:stts
	}
}

var validInstructions = {
	'AAA': singleGenerateInstructionObject(0),
	'AAD': singleGenerateInstructionObject(0),
	'AAM': singleGenerateInstructionObject(0),
	'AAS': singleGenerateInstructionObject(0),
	'CBW': singleGenerateInstructionObject(0),
	'CLC': singleGenerateInstructionObject(0),
	'CLD': singleGenerateInstructionObject(0),
	'CLI': singleGenerateInstructionObject(0),
	'CMC': singleGenerateInstructionObject(0),
	'CWD': singleGenerateInstructionObject(0),
	'DAA': singleGenerateInstructionObject(0),
	'DAS': singleGenerateInstructionObject(0),
	'HLT': singleGenerateInstructionObject(0),
	'INTO': singleGenerateInstructionObject(0),
	'IRET': singleGenerateInstructionObject(0),
	'LAHF': singleGenerateInstructionObject(0),
	'LODSB': singleGenerateInstructionObject(0),
	'LODSW': singleGenerateInstructionObject(0),
	'MOVSB': singleGenerateInstructionObject(0),
	'MOVSW': singleGenerateInstructionObject(0),
	'NOP': singleGenerateInstructionObject(0),
	'RET': singleGenerateInstructionObject(0),
	'RETF': singleGenerateInstructionObject(0),
	'SAHF': singleGenerateInstructionObject(0),
	'SCASB': singleGenerateInstructionObject(0),
	'SCASW': singleGenerateInstructionObject(0),
	'STC': singleGenerateInstructionObject(0),
	'STD': singleGenerateInstructionObject(0),
	'STI': singleGenerateInstructionObject(0),
	'STOSB': singleGenerateInstructionObject(0),
	'STOSW': singleGenerateInstructionObject(0),
	'XLATB': singleGenerateInstructionObject(0),
	'CALL': doubleGenerateInstructionObject(0x02, 0),
	'JA': doubleGenerateInstructionObject(0x02, 0),
	'JAE': doubleGenerateInstructionObject(0x02, 0),
	'JB': doubleGenerateInstructionObject(0x02, 0),
	'JBE': doubleGenerateInstructionObject(0x02, 0),
	'JC': doubleGenerateInstructionObject(0x02, 0),
	'JCXZ': doubleGenerateInstructionObject(0x02, 0),
	'JE': doubleGenerateInstructionObject(0x02, 0),
	'JG': doubleGenerateInstructionObject(0x02, 0),
	'JGE': doubleGenerateInstructionObject(0x02, 0),
	'JL': doubleGenerateInstructionObject(0x02, 0),
	'JLE': doubleGenerateInstructionObject(0x02, 0),
	'JMP': doubleGenerateInstructionObject(0x02, 1),
	'JNA': doubleGenerateInstructionObject(0x02, 0),
	'JNAE': doubleGenerateInstructionObject(0x02, 0),
	'JNB': doubleGenerateInstructionObject(0x02, 0),
	'JNBE': doubleGenerateInstructionObject(0x02, 0),
	'JNC': doubleGenerateInstructionObject(0x02, 0),
	'JNE': doubleGenerateInstructionObject(0x02, 0),
	'JNG': doubleGenerateInstructionObject(0x02, 0),
	'JNGE': doubleGenerateInstructionObject(0x02, 0),
	'JNL': doubleGenerateInstructionObject(0x02, 0),
	'JNLE': doubleGenerateInstructionObject(0x02, 0),
	'JNO': doubleGenerateInstructionObject(0x02, 0),
	'JNP': doubleGenerateInstructionObject(0x02, 0),
	'JNS': doubleGenerateInstructionObject(0x02, 0),
	'JNZ': doubleGenerateInstructionObject(0x02, 0),
	'JO': doubleGenerateInstructionObject(0x02, 0),
	'JP': doubleGenerateInstructionObject(0x02, 0),
	'JPE': doubleGenerateInstructionObject(0x02, 0),
	'JPO': doubleGenerateInstructionObject(0x02, 0),
	'JS': doubleGenerateInstructionObject(0x02, 0),
	'JZ': doubleGenerateInstructionObject(0x1, 0),
	'LOOP': doubleGenerateInstructionObject(0x1, 0),
	'LOOPE': doubleGenerateInstructionObject(0x1, 0),
	'LOOPNE': doubleGenerateInstructionObject(0x1, 0),
	'LOOPNZ': doubleGenerateInstructionObject(0x1, 0),
	'LOOPZ': doubleGenerateInstructionObject(0x1, 0),
	'DEC': instructorObject(0),
	'DIV': instructorObject(0),
	'IDIV': instructorObject(0),
	'IMUL': instructorObject(0),
	'INC': instructorObject(0),
	'NEG': instructorObject(0),
	'NOT': instructorObject(0),
	'INT': {
		operands: [
			{ operand1:4, operand2: undefined }
		],
		memory: [ { memory:0x1 } ],
		status:0
	},
	'POPA': singleGenerateInstructionObject(0),
	'POPF': singleGenerateInstructionObject(0),
	'POP': {
		operands: [
			{ operand1:1, operand2: undefined },
			{ operand1:3, operand2: undefined },
			{ operand1:6, operand2: undefined }
		],
		memory: [
			{ memory:0x1 }, { memory:0x1 }, { memory:0x1 }
		],
		status:0
	},
	'PUSHA': singleGenerateInstructionObject(0),
	'PUSHF': singleGenerateInstructionObject(0),
	'PUSH': {
		operands: [
			{ operand1:1, operand2: undefined },
			{ operand1:3, operand2: undefined },
			{ operand1:6, operand2: undefined },
			{ operand1:5, operand2: undefined },
			{ operand1:4, operand2: undefined }
		],
		memory: [
			{ memory:0x1 }, { memory:0x1 }, { memory:0x1 }, { memory:0x1 }
		],
		status:0
	},

	'LDS': {
		operands: [
			{ operand1:1,  operand2:6 },
			{ operand1:2,  operand2:6 }
		],
		memory: [
			{ memory:0x2 }, { memory:0x2 }
		],
		status:0
	},

	'LEA': {
		operands: [
			{ operand1:1,  operand2:6 },
			{ operand1:2,  operand2:6 }
		],
		memory: [
			{ memory:0x2 }, { memory:0x2 }
		],
		status:0
	},

	'LES': {
		operands: [
			{ operand1:1,  operand2:6 },
			{ operand1:2,  operand2:6 }
		],
		memory: [
			{ memory:0x2 }, { memory:0x2 }
		],
		status:0
	},

	'XCHG': {
		operands: [
			{ operand1:6,  operand2:1},
			{ operand1:1,  operand2:1},
			{ operand1:1,  operand2:6},
			{ operand1:2,  operand2:2},
			{ operand1:2,  operand2:6 }
		],
		memory: [
			{ memory:0x2 }, { memory:0x2 }, { memory:0x2 }, { memory:0x2 }, { memory:0x2 }
		],
		status:0
	},

	'MUL': {
		operands: [
			{ operand1:1, operand2: undefined },
			{ operand1:6, operand2: undefined },
			{ operand1:2, operand2: undefined }
		],
		memory: [
			{ memory:0x1 }, { memory:0x1 }, { memory:0x1 }
		],
		status:0
	},
	'CMPSB': singleGenerateInstructionObject(0),
	'CMPSW': singleGenerateInstructionObject(0),
	'CMP': addLikeInstructionObject(0),
	'OR': addLikeInstructionObject(0),
	'SBB': addLikeInstructionObject(0),
	'SUB': {
		operands: [
			{ operand1:1,  operand2:1 },
			{ operand1:1,  operand2:6 },
			{ operand1:2,  operand2:4 },
			{ operand1:6,  operand2:1 },
			{ operand1:6,  operand2:4 },
			{ operand1:1,  operand2:5 },
			{ operand1:6,  operand2:5 },
			{ operand1:2,  operand2:2 },
			{ operand1:2,  operand2:6 },
			{ operand1:1,  operand2:4 }
		],
		memory: [
			{ memory:0x2 },
			{ memory:0x2 },
			{ memory:0x2 },
			{ memory:0x2 },
			{ memory:0x2 },
			{ memory:0x3 },
			{ memory:0x3 },
			{ memory:0x2 },
			{ memory:0x2 },
			{ memory:0x2 }
		],
		status:0
	},
	'TEST': addLikeInstructionObject(0),
	'XOR': addLikeInstructionObject(0),
	'RCL': shrLikeInstructionObject(0),
	'RCR': shrLikeInstructionObject(0),
	'ROL': {
		operands: [
			{ operand1:6,  operand2:4 },
			{ operand1:6,  operand2:'cl' },
			{ operand1:2,  operand2:4 },
			{ operand1:1,  operand2:'cl' },
			{ operand1:6,  operand2:5 },
			{ operand1:1,  operand2:5 },
			{ operand1:1,  operand2:4 }
		],
		memory: [
			{ memory:0x2 },
			{ memory:0x2 },
			{ memory:0x2 },
			{ memory:0x2 },
			{ memory:0x3 },
			{ memory:0x3 },
			{ memory:0x2 }
		],
		status:0
	},
	'ROR': shrLikeInstructionObject(0),
	'SAL': shrLikeInstructionObject(0),
	'SAR': shrLikeInstructionObject(0),
	'SHL': shrLikeInstructionObject(0),
	'SHR': shrLikeInstructionObject(0),
	'ADC': addLikeInstructionObject(0),
	'ADD': addLikeInstructionObject(1),
	'AND': addLikeInstructionObject(0),
	'MOV': {
		operands: [
			{ operand1:1,  operand2:1 },
			{ operand1:1,  operand2:6 },
			{ operand1:2,  operand2:4 },
			{ operand1:6,  operand2:1 },
			{ operand1:6,  operand2:4 },
			{ operand1:1,  operand2:5 },
			{ operand1:6,  operand2:5 },
			{ operand1:2,  operand2:2 },
			{ operand1:2,  operand2:6 },
			{ operand1:1,  operand2:4 },
			{ operand1:6,  operand2:2 }
		],
		memory: [
			{ memory:0x2 },
			{ memory:0x2 },
			{ memory:0x2 },
			{ memory:0x2 },
			{ memory:0x2 },
			{ memory:0x3 },
			{ memory:0x3 },
			{ memory:0x2 },
			{ memory:0x2 },
			{ memory:0x2 },
			{ memory:0x2 }
		],
		status:1
	}
}