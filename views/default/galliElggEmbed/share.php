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
$url = current_page_url();

$iframe = "<iframe src='$url' style=' border-width:0 ' width='600'  height='600' frameborder='0' scrolling='auto'></iframe>";

$body = elgg_echo('galliElggEmbed:info');
$body .= elgg_view('input/text', array( 'value' => $iframe, 'id' => 'embediFrame'));
$body .= '<div class="mts">';
$body .= elgg_view('input/checkbox', array('id' => 'embedFullLayout', 'checked' => 'checked'));
$body .= elgg_echo('galliElggEmbed:info:full_layout');
$body .= '</div>';

echo elgg_view_module('aside', elgg_echo('galliElggEmbed:embedthis'), $body);
