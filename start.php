<?php
/**
 *	galliElggEmbed
 *	Author : Mahin Akbar | Team Webgalli
 *	Team Webgalli | Elgg developers and consultants
 *	Web	: http://webgalli.com
 *	Skype : 'team.webgalli'
 *	@package galliElggEmbed
 *	Licence : GPLV2
 *	Copyright : Team Webgalli 2013-2015
 */
 

elgg_register_event_handler('init', 'system', 'galliElggEmbed_init');

function galliElggEmbed_init() {
	elgg_extend_view('js/elgg', 'galliElggEmbed/js');
	elgg_extend_view('page/elements/sidebar', 'galliElggEmbed/share', 1000);
	
	elgg_register_viewtype_fallback("embed");
	elgg_register_simplecache_view("js/galliElggEmbed/embed");
	$js_url = elgg_get_simplecache_url("js", "galliElggEmbed/embed");
	elgg_register_js("galliElggEmbed", $js_url);
}
