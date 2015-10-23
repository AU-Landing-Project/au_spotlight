<?php

namespace AU\Spotlight;

/*
 * uses settings from admin to set contents of footer
 */

$contexts = array();
$contexts_str = elgg_get_plugin_setting('auspotlight_context', PLUGIN_ID);
if ($contexts_str) {
	$contexts = unserialize($contexts_str);
}

//make sure there is some default text in case none is defined
$text = '';
$default_text = elgg_get_plugin_setting('auspotlight_generic_tm_loggedin', PLUGIN_ID);
if ($default_text != "" && elgg_is_logged_in()) {
	$text = $default_text;
} else {
	$text = elgg_get_plugin_setting('auspotlight_generic_tm', PLUGIN_ID);
}


//check whether we have defined a context for this page
$thiscontext = array_search(elgg_get_context(), $contexts);
if ($thiscontext !== false) {
	//get the relevant column text
	$ts = array();
	$ts_str = elgg_get_plugin_setting('auspotlight_context_tm', PLUGIN_ID);
	if ($ts_str) {
		$ts = unserialize($ts_str);
	}
	$loggedinonly = array();
	$loggedinonly_str = elgg_get_plugin_setting('auspotlight_loggedinonly', PLUGIN_ID);
	if ($loggedinonly_str) {
		$loggedinonly = unserialize($loggedinonly_str);
	}
	
	if ((elgg_is_logged_in() && $loggedinonly[$thiscontext]) || !$loggedinonly[$thiscontext]) {
		if ($ts[$thiscontext] != null) {
			$text = $ts[$thiscontext];
		}
	}
}

echo "<p>" . $text . "</p>";
