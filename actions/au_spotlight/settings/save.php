<?php
// needed to save the array input from admin settings


$params = get_input('params');
$plugin_id = get_input('plugin_id');
$plugin = elgg_get_plugin_from_id($plugin_id);

if (!($plugin instanceof ElggPlugin)) {
	register_error(elgg_echo('plugins:settings:save:fail', array($plugin_id)));
	forward(REFERER);
}

$plugin_name = $plugin->getManifest()->getName();

$result = false;


// read in the context and save
$params['auspotlight_context'] = serialize($params['auspotlight_context']);				

foreach ($params as $k => $v) {
	$result = $plugin->setSetting($k, $v);
	if (!$result) {
		register_error(elgg_echo('plugins:settings:save:fail', array($plugin_name)));
		forward(REFERER);
		exit;
	}
}
$params['auspotlight_context_tl'] = serialize($params['auspotlight_context_tl']);				

foreach ($params as $k => $v) {
	$result = $plugin->setSetting($k, $v);
	if (!$result) {
		register_error(elgg_echo('plugins:settings:save:fail', array($plugin_name)));
		forward(REFERER);
		exit;
	}
}
$params['auspotlight_context_tm'] = serialize($params['auspotlight_context_tm']);				

foreach ($params as $k => $v) {
	$result = $plugin->setSetting($k, $v);
	if (!$result) {
		register_error(elgg_echo('plugins:settings:save:fail', array($plugin_name)));
		forward(REFERER);
		exit;
	}
}

$params['auspotlight_context_tr'] = serialize($params['auspotlight_context_tr']);				

foreach ($params as $k => $v) {
	$result = $plugin->setSetting($k, $v);
	if (!$result) {
		register_error(elgg_echo('plugins:settings:save:fail', array($plugin_name)));
		forward(REFERER);
		exit;
	}
}
$params['auspotlight_loggedinonly'] = serialize($params['auspotlight_loggedinonly']);				

foreach ($params as $k => $v) {
	$result = $plugin->setSetting($k, $v);
	if (!$result) {
		register_error(elgg_echo('plugins:settings:save:fail', array($plugin_name)));
		forward(REFERER);
		exit;
	}
}
system_message(elgg_echo('plugins:settings:save:ok', array($plugin_name)));
forward(REFERER);
