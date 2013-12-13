elgg.register_hook_handler('init', 'system', function() {
	$("#embediFrame").click(function () {
		$(this).select();
	});
});
