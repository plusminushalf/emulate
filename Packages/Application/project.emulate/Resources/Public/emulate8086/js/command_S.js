command_S = function() {
	that = this;
	this.command = "S";
	this.display = "1: Memory<br>2. Register";
	this.optionLoaded = false;
	this.acceptedOptions = {
		'1':function(option) {
			if(!that.optionLoaded){
				that.optionLoaded = "1";
				$("#display").html("Enter Memory Segment<br>0000: Code Segment<br>\
					1000: Data Segment<br>2000: Extra Segment<br>3000: Stack Segment");
				return true;
			}
			option = '0x' + option;
			this.allowedSegments = ['0x0000', '0x1000', '0x2000', '0x3000']
			if(this.segment == undefined) {
				if(this.allowedSegments.indexOf(option) > -1) {
					this.segment = option;
					$("#display").html('Code Segment Selected Enter Ofset Address');
					return true;
				}
			} else {
				if(option>=0x0000 && option<=0xffff) {
					ajax('http://typo.flow/emulate8086/Standard/getMemoryValue',
						{
							data: JSON.stringify({"register": option})
						}
					).done(function(data) {
						$("#display").html(data);
					});
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
			ajax('http://typo.flow/emulate8086/Standard/getRegisterValue',
				{
					"data": JSON.stringify({"register": option})
				}
			).done(function(data) {
				$("#display").html(data);
			});
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