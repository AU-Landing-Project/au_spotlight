<?php
	/**
	 * Elgg au_spotlight Plugin
	 * @package au
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author  jond
	 * @copyright Athabasca University
	 */

	// Get settings


	$generic_text_left = $vars['entity']->auspotlight_generic_tl;
	$generic_text_middle = $vars['entity']->auspotlight_generic_tm;
	$generic_text_right = $vars['entity']->auspotlight_generic_tr;
	
//show the default form	
?>
<h2><?php echo elgg_echo('au_spotlight:default'); ?></h2>
<table>
<caption><?php echo elgg_echo('au_spotlight:help'); ?>
</caption>
<tr><td><?php echo elgg_echo('au_spotlight:left'); ?></td><td>

<?php echo elgg_view("input/longtext", array ("name"=>"params[auspotlight_generic_tl]", "value" =>$vars['entity']->auspotlight_generic_tl)); ?>
</td></tr>
<tr><td><?php echo elgg_echo('au_spotlight:middle'); ?></td><td>
	<?php echo elgg_view("input/longtext", array ("name"=>"params[auspotlight_generic_tm]", "value" =>$vars['entity']->auspotlight_generic_tm)); ?>
</td></tr>
<tr><td><?php echo elgg_echo('au_spotlight:right'); ?></td><td>
	<?php echo elgg_view("input/longtext", array ("name"=>"params[auspotlight_generic_tr]", "value" =>$vars['entity']->auspotlight_generic_tr)); ?>
	
</td></tr>
</table>

<?php // now show the form for logged-in users ?>

<h2><?php echo elgg_echo('au_spotlight:defaultloggedin'); ?></h2>
<table>
<caption><?php echo elgg_echo('au_spotlight:help'); ?>
</caption>
<tr><td><?php echo elgg_echo('au_spotlight:left'); ?></td><td>

<?php echo elgg_view("input/longtext", array ("name"=>"params[auspotlight_generic_tl_loggedin]", "value" =>$vars['entity']->auspotlight_generic_tl_loggedin)); ?>
</td></tr>
<tr><td><?php echo elgg_echo('au_spotlight:middle'); ?></td><td>
	<?php echo elgg_view("input/longtext", array ("name"=>"params[auspotlight_generic_tm_loggedin]", "value" =>$vars['entity']->auspotlight_generic_tm_loggedin)); ?>
</td></tr>
<tr><td><?php echo elgg_echo('au_spotlight:right'); ?></td><td>
	<?php echo elgg_view("input/longtext", array ("name"=>"params[auspotlight_generic_tr_loggedin]", "value" =>$vars['entity']->auspotlight_generic_tr_loggedin)); ?>
	
</td></tr>
</table>





<?php
// now deal with other contexts
echo "<h2>".elgg_echo('au_spotlight:contexttitle')."</h2>";

?>

<p>
<?php 
	//add a new context
	echo elgg_echo('au_spotlight:numcontexts'); 
?>
</p>
<p>
<?php echo elgg_view("input/text", array("name"=>'params[auspotlight_numcontexts]',"value"=>$vars['entity']->auspotlight_numcontexts,"maxlength"=>3)); ?>
</p>

<?php
//display user-defined contexts and associated text
	if($vars['entity']->auspotlight_numcontexts){
		echo "<h4>".elgg_echo('au_spotlight:contexts')."</h4>";	
		/*generate a list of possible contexts based on pagehandlers
		echo "<p><strong>".elgg_echo('au_spotlight:candidatecontexts')."</strong><em>";
		$candidate_contexts=array_keys(elgg_get_config('pagehandler'));
		foreach ($candidate_contexts as $candidate){
			echo " &nbsp; $candidate ";
		}
		echo "</em></p>";
		*/ 
	}
	//let admin choose to show context only to admins
	echo "<p>".elgg_echo('au_spotlight:showcontext');
		if (elgg_get_plugin_setting('auspotlight_showcontext','au_spotlight')){
			$checked=true;
		} else {
			$checked=false;
		}
	echo elgg_view("input/checkbox", array("name"=>"params[auspotlight_showcontext]",
			"checked"=>$checked,
			'value'=>true,
			'default'=>false))."</p>";
	
	$contexts=unserialize($vars['entity']->auspotlight_context);
	$tls=unserialize($vars['entity']->auspotlight_context_tl);
	$tms=unserialize($vars['entity']->auspotlight_context_tm);
	$trs=unserialize($vars['entity']->auspotlight_context_tr);
	$loggedinonly=unserialize(elgg_get_plugin_setting('auspotlight_loggedinonly','au_spotlight'));
	
	
	for($n=1;$n<=$vars['entity']->auspotlight_numcontexts;$n++){
		echo "<h3>".elgg_echo('au_spotlight:context')." $n</h3>";
		echo "<p>".elgg_view("input/text", array("name"=>"params[auspotlight_context][$n]","value"=>$contexts[$n]))."</p>";
		
		//checkbox for whether to show only to logged
		echo "<p>".elgg_echo('au_spotlight:loggedinonly')." ";
		if ($loggedinonly[$n]){
			$checked=true;
		} else {
			$checked=false;
		}
		echo elgg_view("input/checkbox", array("name"=>"params[auspotlight_loggedinonly][$n]","checked"=>$checked,'value'=>1,'default'=>0))."</p>";
?>
		<table>
		<caption><?php echo elgg_echo('au_spotlight:help'); ?>
		

		</caption>
		<tr><td><?php echo elgg_echo('au_spotlight:left'); ?></td><td>
		
		<?php echo elgg_view("input/longtext", array ("name"=>"params[auspotlight_context_tl][$n]", "value" =>$tls[$n])); ?>
		</td></tr>
		<tr><td><?php echo elgg_echo('au_spotlight:middle'); ?></td><td>
			<?php echo elgg_view("input/longtext", array ("name"=>"params[auspotlight_context_tm][$n]", "value" =>$tms[$n])); ?>
		</td></tr>
		<tr><td><?php echo elgg_echo('au_spotlight:right'); ?></td><td>
			<?php echo elgg_view("input/longtext", array ("name"=>"params[auspotlight_context_tr][$n]", "value" =>$trs[$n])); ?>
			
		</td></tr>
		</table>


<?php		
	}

?>






