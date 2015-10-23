<?php

namespace AU\Spotlight;

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
<div id="auspot-default">
	<h2><?php echo elgg_echo('au_spotlight:default'); ?></h2>
	<table>
		<caption>
			<?php echo elgg_echo('au_spotlight:defaulthelp'); ?>
		</caption>
		<tr><td><?php echo elgg_echo('au_spotlight:left'); ?></td><td>

				<?php echo elgg_view("input/longtext", array(
					"name" => "params[auspotlight_generic_tl]",
					"value" => $vars['entity']->auspotlight_generic_tl
				)); ?>
			</td></tr>
		<tr><td><?php echo elgg_echo('au_spotlight:middle'); ?></td><td>
				<?php echo elgg_view("input/longtext", array(
					"name" => "params[auspotlight_generic_tm]",
					"value" => $vars['entity']->auspotlight_generic_tm
				)); ?>
			</td></tr>
		<tr><td><?php echo elgg_echo('au_spotlight:right'); ?></td><td>
				<?php echo elgg_view("input/longtext", array(
					"name" => "params[auspotlight_generic_tr]",
					"value" => $vars['entity']->auspotlight_generic_tr
				)); ?>

			</td></tr>
	</table>
</div>

<?php // now show the form for logged-in users  ?>
<div id="auspot-default-logged-in">
	 <h2><?php echo elgg_echo('au_spotlight:defaultloggedin'); ?></h2>
	<table>
		<caption><?php echo elgg_echo('au_spotlight:defaultloggedinhelp'); ?>
		</caption>
		<tr><td><?php echo elgg_echo('au_spotlight:left'); ?></td><td>

				<?php echo elgg_view("input/longtext", array(
					"name" => "params[auspotlight_generic_tl_loggedin]",
					"value" => $vars['entity']->auspotlight_generic_tl_loggedin
				)); ?>
			</td></tr>
		<tr><td><?php echo elgg_echo('au_spotlight:middle'); ?></td><td>
				<?php echo elgg_view("input/longtext", array(
					"name" => "params[auspotlight_generic_tm_loggedin]",
					"value" => $vars['entity']->auspotlight_generic_tm_loggedin
				)); ?>
			</td></tr>
		<tr><td><?php echo elgg_echo('au_spotlight:right'); ?></td><td>
				<?php echo elgg_view("input/longtext", array(
					"name" => "params[auspotlight_generic_tr_loggedin]",
					"value" => $vars['entity']->auspotlight_generic_tr_loggedin
				)); ?>

			</td></tr>
	</table>
</div>


<div id="auspot-contexts">
	<?php
	// now deal with other contexts
	echo "<h2>" . elgg_echo('au_spotlight:contexttitle') . "</h2>";
	?>

	<?php
//display user-defined contexts and associated text

	echo "<p>" . elgg_echo('au_spotlight:contexts') . "</p>";
	echo "<p>" . elgg_echo('au_spotlight:delete') . "</p>";
	//let admin choose to show context only to admins
	echo "<p>" . elgg_echo('au_spotlight:showcontext');
	if (elgg_get_plugin_setting('auspotlight_showcontext', PLUGIN_ID)) {
		$checked = true;
	} else {
		$checked = false;
	}
	echo elgg_view("input/checkbox", array(
		"name" => "params[auspotlight_showcontext]",
		"checked" => $checked,
		'value' => true
	)) . "</p>";

	//get the various arrays from the serialized variables
	$contexts = array();
	if ($vars['entity']->auspotlight_context) {
		$contexts = unserialize($vars['entity']->auspotlight_context);
	}
	
	$tls = array();
	if ($vars['entity']->auspotlight_context_tl) {
		$tls = unserialize($vars['entity']->auspotlight_context_tl);
	}
	
	$tms = array();
	if ($vars['entity']->auspotlight_context_tm) {
		$tms = unserialize($vars['entity']->auspotlight_context_tm);
	}
	
	$trs = array();
	if ($vars['entity']->auspotlight_context_tr) {
		$trs = unserialize($vars['entity']->auspotlight_context_tr);
	}
	
	$loggedinonly = array();
	if ($vars['entity']->auspotlight_loggedinonly) {
		$loggedinonly = unserialize($vars['entity']->auspotlight_loggedinonly);
	}

	//display forms for existing contexts
	foreach ($contexts as $k => $v) {
		echo "<h3>" . elgg_echo('au_spotlight:context') . ": $v </h3>";
		echo "<p>" . elgg_view("input/text", array(
			"name" => "params[auspotlight_context][$k]",
			"value" => $v
		)) . "</p>";

		//checkbox for whether to show only to logged
		echo "<p>" . elgg_echo('au_spotlight:loggedinonly') . " ";
		if ($loggedinonly[$k]) {
			$checked = true;
		} else {
			$checked = false;
		}
		echo elgg_view("input/checkbox", array(
			"name" => "params[auspotlight_loggedinonly][$k]",
			"checked" => $checked,
			'value' => 1,
			'default' => 0
		)) . "</p>";
		?>
	
		<table>
			<tr><td><?php echo elgg_echo('au_spotlight:left'); ?></td><td>

	<?php echo elgg_view("input/longtext", array(
		"name" => "params[auspotlight_context_tl][$k]",
		"value" => $tls[$k]
		)); ?>
				</td></tr>
			<tr><td><?php echo elgg_echo('au_spotlight:middle'); ?></td><td>
	<?php echo elgg_view("input/longtext", array(
		"name" => "params[auspotlight_context_tm][$k]",
		"value" => $tms[$k]
		)); ?>
				</td></tr>
			<tr><td><?php echo elgg_echo('au_spotlight:right'); ?></td><td>
	<?php echo elgg_view("input/longtext", array(
		"name" => "params[auspotlight_context_tr][$k]",
		"value" => $trs[$k]
		)); ?>

				</td></tr>
		</table>


	<?php
} //end foreach
//finally, add a blank form to add a new context

echo "<h3>" . elgg_echo('au_spotlight:newcontext') . "</h3>";
echo "<p>" . elgg_view("input/text", array(
	"name" => "params[auspotlight_context][]"
)) . "</p>";

//checkbox for whether to show only to logged
echo "<p>" . elgg_echo('au_spotlight:loggedinonly') . " ";

echo elgg_view("input/checkbox", array(
	"name" => "params[auspotlight_loggedinonly][]",
	"checked" => false,
	'value' => 1,
	'default' => 0
)) . "</p>";
?>
	<table>
		<tr><td><?php echo elgg_echo('au_spotlight:left'); ?></td><td>

<?php echo elgg_view("input/longtext", array(
	"name" => "params[auspotlight_context_tl][]"
)); ?>
			</td></tr>
		<tr><td><?php echo elgg_echo('au_spotlight:middle'); ?></td><td>
				<?php echo elgg_view("input/longtext", array(
					"name" => "params[auspotlight_context_tm][]"
				)); ?>
			</td></tr>
		<tr><td><?php echo elgg_echo('au_spotlight:right'); ?></td><td>
				<?php echo elgg_view("input/longtext", array(
					"name" => "params[auspotlight_context_tr][]"
				)); ?>

			</td></tr>
	</table>

</div>



