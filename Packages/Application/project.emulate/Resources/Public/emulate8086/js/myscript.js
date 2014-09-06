(function(){
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
	$(document).keyup(function(e) {
		if(e.which == 27) {
			terminal.reset();
			$("#error").text("");
		}
	});
}).call(this);