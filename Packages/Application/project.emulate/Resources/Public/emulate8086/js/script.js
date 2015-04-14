(function(){

    window.onbeforeunload = function () {
        if(memoryChanged.changed) {
            return "Emulator changes are not saved.";
        } else {
            window.onbeforeunload = undefined;
        }
    };

    var memory;
    var memoryChanged = {
        changed: false,
        number: 0
    };
    $("#command").prop('disabled', true);
    var request = ajax('/emulate/emulate8086/Standard/getMemory', { data: ""});
    request.done(function(data) {
        memory = data;
        $("#command").prop('disabled', false);
        // Memory check/validation
        console.log(memory);
    });
    request.fail(function() {
        alert( "Error while loading emulator's memory please refresh." );
    });

    $('#saveMemory').on('click', function(){
        if(memoryChanged.changed && memoryChanged.number > 0) {
            var request = ajax('/emulate/emulate8086/Standard/setMemory', {data: JSON.stringify(memory)});
            request.done(function(data) {
                if(data[0]) {
                    $('.btn.btn-warning.btn-circle').addClass('btn-success').removeClass('btn-warning');
                    memoryChanged.number = 0;
                    memoryChanged.changed = false;
                }
            });
            request.fail(function() {
                alert( "Error while saving emulator's memory please refresh." );
            });
        }
    });


    watch(memoryChanged, "changed", function(){
        if(memoryChanged.changed) $('.btn.btn-success.btn-circle').addClass('btn-warning').removeClass('btn-success');
    });

    var timer = setInterval(function () {
        if(memoryChanged.changed && memoryChanged.number > 0) {
            var request = ajax('/emulate/emulate8086/Standard/setMemory', {data: JSON.stringify(memory)});
            request.done(function(data) {
                if(data[0]) {
                    $('.btn.btn-warning.btn-circle').addClass('btn-success').removeClass('btn-warning');
                    memoryChanged.number = 0;
                    memoryChanged.changed = false;
                }
            });
            request.fail(function() {
                alert( "Error while saving emulator's memory please refresh." );
            });
        }
    }, 30000);

    watch(memoryChanged, "number", function(){
        if(memoryChanged.changed && memoryChanged.number == 15) {
            var request = ajax('/emulate/emulate8086/Standard/setMemory', {data: JSON.stringify(memory)});
            request.done(function(data) {
                if(data[0]) {
                    $('.btn.btn-warning.btn-circle').addClass('btn-success').removeClass('btn-warning');
                    memoryChanged.number = 0;
                    memoryChanged.changed = false;
                    clearInterval(timer);
                    timer = setsetInterval(function () {
                        if(memoryChanged.changed && memoryChanged.number > 0) {
                            var request = ajax('/emulate/emulate8086/Standard/setMemory', {data: JSON.stringify(memory)});
                            request.done(function(data) {
                                if(data[0]) {
                                    $('.btn.btn-warning.btn-circle').addClass('btn-success').removeClass('btn-warning');
                                    memoryChanged.number = 0;
                                    memoryChanged.changed = false;
                                }
                            });
                            request.fail(function() {
                                alert( "Error while saving emulator's memory please refresh." );
                            });
                        }
                    }, 30000);
                }
            });
            request.fail(function() {
                alert( "Error while saving emulator's memory please refresh." );
            });
        }
    });



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
                parent.html(childInput.val().toUpperCase());
                commands_entered.addLine(parent.attr('data-offset'), childInput.val().toUpperCase(), that.memory);
                $(this).remove();
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
            if(op >= 0x00 && op <= 0xff) {
                return 4;
            }
            if(op > 0xff && op <= 0xffff) {
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
            for(var offset in commands_entered.commands) {
                if(commands_entered.commands.hasOwnProperty(offset)) {
                    var code = commands_entered.commands[offset].code;
                    var memoryRequired = commands_entered.commands[offset].memory-1;
                    memory.segments.code[offset] = code;
                    memoryChanged.number++;
                    while(memoryRequired--) {
                        offset++;
                        memory.segments.code[offset] = -1;
                        memoryChanged.number++;
                    }
                }
            }
            memoryChanged.changed = true;
            delete commands_entered;
            commands_entered = new commandsEntered();
            return cb();
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
            delete commands_entered;
            commands_entered = new commandsEntered();
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
                    $('#display').html('wait');
                    execute(option, memory, function(state) {
                        if(state) $(document).trigger($.Event('keydown', {which: 27}));
                        else $('#display').html('Possibility of Infinite loop');
                    });
                    return true;
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

                memory.registers[parent.attr('data-register').toLowerCase()] = parseInt(option, 16);
                memoryChanged.changed = true;
                memoryChanged.number++;
                parent.addClass('editRegister');
                parent.html(option.substring(2).toUpperCase());
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

                var segment;
                switch(parent.attr('data-segment')) {
                    case '0x1000':
                        segment = 'data';
                        break;
                    case '0x2000':
                        segment = 'extra';
                        break;
                    case '0x3000':
                        segment = 'stack';
                        break;
                }

                memory.segments[segment][parseInt(parent.attr('data-offset'), 16)] = parseInt(option, 16);
                memoryChanged.changed = true;
                memoryChanged.number++;
                that.remove();
                parent.addClass('editMemory');
                parent.html(option.substring(2).toUpperCase());
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

                        var segment;

                        switch(this.segment) {
                            case '0x1000':
                                segment = 'data';
                                break;
                            case '0x2000':
                                segment = 'extra';
                                break;
                            case '0x3000':
                                segment = 'stack';
                                break;
                        }

                        memoryValue = memory.segments[segment][parseInt(option, 16)];

                        if(memoryValue == undefined) memoryValue = 0;

                        $('#display').html(parseInt(this.segment, 16).toString(16) + ':' + parseInt(option, 16).toString(16) + ' ' + '<c class="editMemory text-info" data-segment="' + this.segment + '" data-offset="' + option + '">' + memoryValue.toString(16).toUpperCase() + '</c>');
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

                registerValue = memory.registers[option.toLowerCase()];
                $('#display').html(option + ': ' + '<c class="editRegister text-info" data-register="' + option + '">' + registerValue.toString(16).toUpperCase() + '</c>');
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
            return this[command];
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
        var date1 = new Date();
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
        //console.log(new Date() - date1);
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
                { operand1:5, operand2: undefined },
                { operand1:4, operand2: undefined }
            ],
            memory: [
                { memory:mem }, { memory:mem }
            ],
            status:stts
        }
    }

    var instructorObject = function(stts) {
        return {
            operands: [
                { operand1:1,  operand2:undefined },
                { operand1:2,  operand2:undefined },
                { operand1:6,  operand2:undefined }
            ],
            memory: [
                { memory:0x1 }, { memory:0x1 }, { memory:0x1 }
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

    var execute = function(offset, memory, cb) {
        this.memory = memory;
        setTimeout(function() {
            var state = true, i = 0;
            offset = parseInt(offset, 16);
            do {
                var result = this.executeOffset(offset);
                if(result.constructor === Object) {
                    offset = result.offset;
                    result = true;
                } else {
                    if(result == -1) {
                        alert('Memory Error reloading page your data will be lost.\ ' +
                        'Sorry for the inconvenience We would try to fix this error as soon as possible.\ ' +
                        'We have logged this error.');
                        location.reload();
                    }
                    ++offset;
                }
                ++i;
            } while(result == true && i < 100000);
            if(i >= 100000) state = false;
            cb(state);
        }, 0);

        /*
            -1 on faliure
            true on going ahead
            false to stop
         */
        this.executeOffset = function(offset) {
            if(this.memory.segments.code.hasOwnProperty(offset)) var line = this.memory.segments.code[offset];
            else line = 0;
            if(line === 0 || line === -1) {
                return true;
            }
            line = line.split(" ");
            var instruction = null;
            var operands = null;
            if(line[0] != undefined) instruction = line[0].toLowerCase();
            if(line[1] != undefined) operands = line[1].toLowerCase();
            if(this.hasOwnProperty(instruction)) return this[instruction](operands);
        };

        this.getValueFromMemory = function(operand) {
            var value;
            if(this.memory.registers.hasOwnProperty(operand)) return this.memory.registers[operand];
            if(operand.indexOf('[') != -1) {
                operand = operand.slice(1, operand.length-1);
            }
            if(this.memory.registers.hasOwnProperty(operand)) operand = this.memory.registers[operand];
            if(
                this.memory.segments.data.hasOwnProperty(operand) ||
                this.memory.segments.data.hasOwnProperty(operand+1)
            ) {
                var v1 = this.memory.segments.data[operand] || 0;
                v1 = this.convertTostring(v1, 16, 2);
                var v2 = this.memory.segments.data[operand+1] || 0;
                v2 = this.convertTostring(v2, 16, 2);
                value = parseInt(v2 + v1, 16);
            }
            var reg8bit = {
                'ah': 'ax',
                'al': 'ax',
                'bl': 'bx',
                'bh': 'bx',
                'ch': 'cx',
                'cl': 'cx',
                'dh': 'dx',
                'dl': 'dx'};
            if(reg8bit.hasOwnProperty(operand)) {
                var v = this.memory.registers[reg8bit[operand]];
                v = this.convertTostring(v, 16, 4);
                if(operand.indexOf('h') != -1) {
                    value = parseInt(v.slice(0, 2), 16);
                } else {
                    value = parseInt(v.slice(2), 16);
                }
            }
            return value;
        };

        this.setValueInMemory = function(operand, value) {
            if(this.memory.registers.hasOwnProperty(operand)) {
                this.memory.registers[operand] = value;
            }
            var reg8bit = {
                'ah': 'ax',
                'al': 'ax',
                'bl': 'bx',
                'bh': 'bx',
                'ch': 'cx',
                'cl': 'cx',
                'dh': 'dx',
                'dl': 'dx'};
            if(reg8bit.hasOwnProperty(operand)) {
                var v = this.memory.registers[reg8bit[operand]];
                v = this.convertTostring(v, 16, 4);
                value = this.convertTostring(value, 16, 4);
                if(operand.indexOf('h') != -1) {
                    value = parseInt(value.slice(2)+v.slice(2), 16);
                } else {
                    value = parseInt(v.slice(0, 2)+value.slice(2), 16);
                }
                this.memory.registers[reg8bit[operand]] = value;
            }
            if(operand.indexOf('[') != -1) {
                operand = operand.slice(1, operand.length-1);
                if(this.memory.registers.hasOwnProperty(operand)) operand = this.memory.registers[operand];
                if(operand.constructor == String) operand = parseInt(operand, 16);
                value = value.toString(16);
                if(value.length <= 2) {
                    this.memory.segments.data[operand] = parseInt(value, 16);
                } else {
                    this.convertTostring(al, 16, 4);
                    this.memory.segments.data[operand] = parseInt(value.slice(2), 16);
                    this.memory.segments.data[operand+1] = parseInt(value.slice(0, 2), 16);
                }
            }
            memoryChanged.changed = true;
            memoryChanged.number++;
        };

        this.mov = function(operands) {
            operands = operands.split(',');
            var value = this.getValueFromMemory(operands[1]) || parseInt(operands[1], 16);
            this.setValueInMemory(operands[0], value);
            return true;
        };

        this.aaa = function(operands) {
            var value = this.getValueFromMemory('al');
            value = this.convertTostring(value, 16, 2);
            if(parseInt(value[value.length-1], 16) > 9 || this.memory.flags.auxilary == 1) {
                value = parseInt(value, 16) + 6;
                if(value > 255) {
                    value = 255;
                    this.memory.flags.overflow = 1;
                }
                value = this.convertTostring(al, 16, 2);;
                value = parseInt(value[value.length-1], 16);
                this.setValueInMemory('al', value);
                value = this.getValueFromMemory('ah') + 1;
                this.setValueInMemory('ah', value);
                this.memory.flags.auxilary = 1;
                this.memory.flags.carry = 1;
            } else {
                value = parseInt(value[value.length-1], 16);
                this.setValueInMemory('al', value);
                this.memory.flags.auxilary = 0;
                this.memory.flags.carry = 0;
            }
            return true;
        };

        this.aad = function() {
            var al = this.getValueFromMemory('al');
            var ah = this.getValueFromMemory('ah');
            al = ah*10 + al;
            ah = 0;
            this.setValueInMemory('ah', ah);
            this.setValueInMemory('al', al);
            this.signFlagCheck(ax);
            al = this.convertTostring(al, 16, 2);
            ah = this.convertTostring(ah, 16, 2);
            var ax = parseInt(ah + al, 16);
            this.zeroFlagCheck(ax);
            this.parityFlagCheck(ax);
            this.signFlagCheck(ax);
            return true;
        };

        this.aam = function() {
            var al = this.getValueFromMemory('al');
            var ah = parseInt(al/10);
            al = al%10;
            this.setValueInMemory('al', al);
            this.setValueInMemory('ah', ah);
            al = this.convertTostring(al, 16, 2);
            ah = this.convertTostring(ah, 16, 2);
            var ax = parseInt(ah + al, 16);
            this.zeroFlagCheck(ax);
            this.parityFlagCheck(ax);
            this.signFlagCheck(ax);
            return true;
        };

        this.aas = function() {
            
        };

        this.hlt = function(operands) {
            return false;
        };

        this.convertTostring = function (value, base, bytes) {
            value = value.toString(base);
            var a = bytes-value.length;
            if(a < 0) {

            }
            while(a--) value = '0'+value;
            return value;
        };

        this.overflowFlagCheck = function(value, bytes) {
            if(bytes == 4 && value > 65535) this.memory.flags.sign = 1;
            if(bytes == 2 && value > 255) this.memory.flags.sign = 1;
            else this.memory.flags.sign = 0;
            return this.memory.flags.sign;
        };

        this.parityFlagCheck = function(value) {
            value = this.convertTostring(value, 2, 16).slice(8);
            var cnt = 0;
            for(i = 0; i < value.length; ++i ) {
                if(value[i] == 1) cnt++;
            }
            if(cnt&1 == 0) this.memory.flags.parity = 1;
            else this.memory.flags.parity = 0;
            return this.memory.flags.parity;
        };

        this.signFlagCheck = function(value) {
            value = this.convertTostring(value, 2, 16);
            if(value[0] == 1) this.memory.flags.zero = 1;
            else this.memory.flags.zero = 0;
            return this.memory.flags.zero;
        };

        this.zeroFlagCheck = function(value) {
            if(value == 0) this.memory.flags.zero = 1;
            else this.memory.flags.zero = 0;
            return this.memory.flags.zero;
        };

    }


}).call(this);