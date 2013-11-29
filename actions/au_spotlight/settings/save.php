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

//delete the associated data and context if the context is blank
	
$contexts=$params['auspotlight_context'];
$tls=$params['auspotlight_context_tl'];
$tms=$params['auspotlight_context_tm'];
$trs=$params['auspotlight_context_tr'];
$lios=$params['auspotlight_loggedinonly'];
foreach($contexts as $k => $v){
	if($v==""){
		//delete context and all corresponding text
		unset($contexts[$k]);
		unset($tls[$k]);
		unset($tms[$k]);	
		unset($trs[$k]);		
		unset($lios[$k]);			
	}
	
}


// read in the context and save
$params['auspotlight_context'] = serialize($contexts);				
save_params($params,$plugin,$plugin_name);

$params['auspotlight_context_tl'] = serialize($tls);				
save_params($params,$plugin,$plugin_name);

$params['auspotlight_context_tm'] = serialize($tms);				
save_params($params,$plugin,$plugin_name);

$params['auspotlight_context_tr'] = serialize($trs);				
save_params($params,$plugin,$plugin_name);

$params['auspotlight_loggedinonly'] = serialize($lios);				
save_params($params,$plugin,$plugin_name);

system_message(elgg_echo('plugins:settings:save:ok', array($plugin_name)));
forward(REFERER);

function save_params($params,$plugin,$plugin_name){	
	foreach ($params as $k => $v) {
		$result = $plugin->setSetting($k, $v);
		if (!$result) {
			register_error(elgg_echo('plugins:settings:save:fail', array($plugin_name)));
			forward(REFERER);
			exit;
		}

	}

	
	
}

