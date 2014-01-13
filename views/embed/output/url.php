<?php
/**
 * Elgg URL display
 * Displays a URL as a link
 *
 * @package Elgg
 * @subpackage Core
 *
 * @uses string $vars['text']        The string between the <a></a> tags.
 * @uses string $vars['href']        The unencoded url string
 * @uses bool   $vars['encode_text'] Run $vars['text'] through htmlspecialchars() (false)
 * @uses bool   $vars['is_action']   Is this a link to an action (false)
 * @uses bool   $vars['is_trusted']  Is this link trusted (false)
 */

$url = elgg_extract('href', $vars, null);
if (!$url and isset($vars['value'])) {
	$url = trim($vars['value']);
	unset($vars['value']);
}

if (isset($vars['text'])) {
	if (elgg_extract('encode_text', $vars, false)) {
		$text = htmlspecialchars($vars['text'], ENT_QUOTES, 'UTF-8', false);
	} else {
		$text = $vars['text'];
	}
	unset($vars['text']);
} else {
	$text = htmlspecialchars($url, ENT_QUOTES, 'UTF-8', false);
}

unset($vars['encode_text']);

if ($url) {
	$url = elgg_normalize_url($url);

	if (elgg_extract('is_action', $vars, false)) {
		$url = elgg_add_action_tokens_to_url($url, false);
	}

	if (!elgg_extract('is_trusted', $vars, false)) {
		if (!isset($vars['rel'])) {
			$vars['rel'] = 'nofollow';
			$url = strip_tags($url);
		}
	}

	// check if we need to add embed view
	if (stristr($url, elgg_get_site_url())) {
		if (!stristr($url, "view=embed")) {
			// because of a bug in Elgg 1.8
			$fragment = parse_url($url, PHP_URL_FRAGMENT);
			
			$url = elgg_http_add_url_query_elements($url, array("view" => "embed"));
			
			if (!empty($fragment)) {
				$url .= "#" . $fragment;
			}
		}
	}
	
	$vars['href'] = $url;
}

unset($vars['is_action']);
unset($vars['is_trusted']);

$attributes = elgg_format_attributes($vars);
echo "<a $attributes>$text</a>";
