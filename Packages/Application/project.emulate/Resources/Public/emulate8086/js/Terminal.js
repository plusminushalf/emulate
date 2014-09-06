(function(){
	Terminal = function() {
		this.loadedCommand = false;
		this.supportedCommands = {
			E: new command_E(),
			G: new command_G(),
			M: new command_M(),
			S: new command_S()
		}
	}
	Terminal.prototype = {
		check: function(command) {
			if(this.supportedCommands.hasOwnProperty(command)) {
				return true;
			}
			return false;
		},
		load: function(command) {
			if(this.check(command)) {
				this.loadedCommand = this.supportedCommands[command];
				return this.loadedCommand.generateDisplay();
			}
			return false;
		},
		process: function(option) {
			return this.loadedCommand.process(option);
		},
		reset: function() {
			this.loadedCommand.reset();
			this.loadedCommand = false;
			$("#display").html("E: Ex_Mon<br>G: Go To<br>M: Move<br>S: Sub_MIR");
		}
	}
}).call(this);