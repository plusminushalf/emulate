(function(){
	loadScript = function() {
		this.loadedScript = [];
	}

	loadScript.prototype = {
		load: function(url) {
			if(this.loadedScript.indexOf(url) == -1) {
				this.loadedScript.push(url);
				$('head').append('<script src="' + url +'" type="text/javascript"></script>');
			}
		},
		removeAll: function() {
			that = this;
			url = that.loadedScript[that.loadedScript.length - 1]
			$.each(this.loadedScript, function(index, value) {
				if(value != url) {
					index = that.loadedScript.indexOf(value);
					that.loadedScript.splice(index, 1);
					$("script[src='" + value +"']").remove();
				}
			});
		}
	}
}).call(this);