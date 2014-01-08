<?php

?>
//<script>
elgg.galliElggEmbed.embedInit = function() {
	var site_url = elgg.get_site_url();
	
	var selector = 'a[href^="' + site_url.replace("https://", "http://") + '"]:not([href*="view=embed"]),'
					+ 'a[href^="' + site_url.replace("http://", "https://") + '"]:not([href*="view=embed"])';
	
	$embed_links = $(selector);
	
	$embed_links.live("click", function() {
		var href = $(this).attr('href');
		href = elgg.galliElggEmbed.addQueryStringParameter(href, 'view', 'embed');
		
		$(this).attr('href', href);
	});
};

elgg.register_hook_handler('init', 'system', elgg.galliElggEmbed.embedInit);