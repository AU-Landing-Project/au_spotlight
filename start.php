<?php
/*
 * AU Spotlight plugin
 * 
 * This adds the option to edit footer columns
 * GPL v2, copyright Jon Dron, Athabasca University, 2013
 */
elgg_register_event_handler('init', 'system', 'au_spotlight_init', 1);


function au_spotlight_init(){

	elgg_extend_view('css','au_spotlight/css');
	elgg_extend_view('page/elements/footer/footer_left', 'au_spotlight/footer_left',450);
	elgg_extend_view('page/elements/footer/footer_main', 'au_spotlight/footer_main',450);
	elgg_extend_view('page/elements/footer/footer_right', 'au_spotlight/footer_right',450);
	elgg_register_action('au_spotlight/settings/save', elgg_get_plugins_path() . 'au_spotlight/actions/au_spotlight/settings/save.php', 'admin');


}