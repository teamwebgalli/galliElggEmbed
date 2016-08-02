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
	elgg_extend_view('page/elements/sidebar', 'galliElggEmbed/share', 1000);

	elgg_require_js("galliElggEmbed");

	elgg_register_viewtype_fallback("embed");
}
