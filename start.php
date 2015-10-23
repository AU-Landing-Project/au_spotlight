<?php

namespace AU\Spotlight;

/*
 * AU Spotlight plugin
 * 
 * This adds the option to edit footer columns
 * GPL v2, copyright Jon Dron, Athabasca University, 2013
 */

const PLUGIN_ID = 'au_spotlight';

elgg_register_event_handler('init', 'system', __NAMESPACE__ . '\\init', 1);

function init() {

	elgg_extend_view('css/elgg', 'css/au_spotlight');
	elgg_extend_view('css/admin', 'css/au_spotlight');
	
	elgg_extend_view('page/elements/footer', 'au_spotlight/footer', 450);
	elgg_extend_view('page/elements/footer/footer_left', 'au_spotlight/footer_left', 450);
	elgg_extend_view('page/elements/footer/footer_main', 'au_spotlight/footer_main', 450);
	elgg_extend_view('page/elements/footer/footer_right', 'au_spotlight/footer_right', 450);
	
	elgg_register_action('au_spotlight/settings/save', __DIR__ . '/actions/au_spotlight/settings/save.php', 'admin');
}
