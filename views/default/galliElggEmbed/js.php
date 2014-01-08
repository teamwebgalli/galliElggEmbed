//<script>
elgg.provide('elgg.galliElggEmbed');

elgg.galliElggEmbed.init = function() {
	$("#embediFrame").click(function () {
		$(this).select();
	});
	
	$("#embedFullLayout").live("change", function() {
		var embed_code = $("#embediFrame").val();
		var page_url = document.location.href;
		
		if ($(this).is(":checked")) {
			var embed_url = page_url.replace("?view=embed", "");
			var embed_url = page_url.replace("&view=embed", "");
			
			if (page_url.search("view=embed") == -1) {
				// embed view not in url, so add
				page_url = elgg.galliElggEmbed.addQueryStringParameter(page_url, 'view', 'embed');
			}
		} else {
			
			if (page_url.search("view=embed") == -1) {
				// embed view not in url, so add
				page_url = elgg.galliElggEmbed.addQueryStringParameter(page_url, 'view', 'embed');
			}
		}
		
		embed_code = embed_code.replace(page_url, embed_url);
		$("#embediFrame").val(embed_code);
	});
};

elgg.galliElggEmbed.addQueryStringParameter = function(uri, key, value) {
	var re = new RegExp("([?|&])" + key + "=.*?(&|#|$)", "i");
	
	if (uri.match(re)) {
		return uri.replace(re, '$1' + key + "=" + value + '$2');
	} else {
		var hash = '';
		var separator = uri.indexOf('?') !== -1 ? "&" : "?";

		if (uri.indexOf('#') !== -1) {
			hash = uri.replace(/.*#/, '#');
			uri = uri.replace(/#.*/, '');
		}
		
		return uri + separator + key + "=" + value + hash;
	}
};

elgg.register_hook_handler('init', 'system', elgg.galliElggEmbed.init);