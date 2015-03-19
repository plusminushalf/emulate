(function(){

    var memory;
    $("#command").prop('disabled', true);
    var request = ajax('/emulate/emulate8086/Standard/getMemory', { data: ""});
    request.done(function(data) {
        memory = data;
        $("#command").prop('disabled', false);
        console.log(memory);
    });
    request.fail(function() {
        alert( "Error while loading emulator's memory please refresh." );
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
            console.log(JSON.stringify(commands_entered.commands));
            $("#display").html('wait');
            return ajax('/emulate/emulate8086/Standard/saveCode',
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
                    $("#display").html('wait');
                    return ajax('/emulate/emulate8086/Standard/executeCode',
                        {
                            data: JSON.stringify({"offset": parseInt(option, 16)})
                        }
                    ).done(function(data) {
                            if(data == 'logout') {
                                location.reload();
                            }
                            console.log(data);
                            if(data == 'true') {
                                $(document).trigger($.Event('keydown', {which: 27}));
                                return true;
                            }
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

                memory.registers[parent.attr('data-register').toLowerCase()] = parseInt(option, 16);

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

                memory.segments[segment][parseInt(parent.attr('data-offset'))] = parseInt(option, 16);

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