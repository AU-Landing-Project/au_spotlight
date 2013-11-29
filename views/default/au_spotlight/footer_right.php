<?php

/*
 * uses settings from admin to set contents of footer
 */

$contexts=unserialize(elgg_get_plugin_setting('auspotlight_context','au_spotlight'));

//make sure there is some default text in case none is defined
//make sure there is some default text in case none is defined
if (elgg_get_plugin_setting('auspotlight_generic_tr_loggedin','au_spotlight')!="" ){
	$text=elgg_get_plugin_setting('auspotlight_generic_tr_loggedin','au_spotlight');
}else{
	$text = elgg_get_plugin_setting('auspotlight_generic_tr','au_spotlight');
}


//check whether we have defined a context for this page

if(array_search(elgg_get_context(),$contexts)>0){
	//get the relevant column text
	$thiscontext=array_search(elgg_get_context(),$contexts);
	$ts=unserialize(elgg_get_plugin_setting('auspotlight_context_tr','au_spotlight'));
	$loggedinonly=unserialize(elgg_get_plugin_setting('auspotlight_loggedinonly','au_spotlight'));
	if ((elgg_is_logged_in()&&$loggedinonly[$thiscontext])||!$loggedinonly[$thiscontext]){
		if ($ts[$thiscontext]!=null){
			$text=$ts[$thiscontext];
		}
	}
	
}else{
	//debug

	
}

echo "<p>".$text."</p>";