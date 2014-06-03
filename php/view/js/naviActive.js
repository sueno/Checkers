(function($) {

	$.fn.naviActive = function(options) {

		var settings = {}

		if (options) {
			$.extend(settings, options);
		}

		return this.each(function(options) {
			$(this).attr("class", "active");
		});

	}
})(jQuery);