<?php
/**
 * Elgg footer
 * Footer that displays across the site
 * provides a three-column view.
 * based on elastic theme by andrej at http://community.elgg.org/plugins/1133163/1.01/elastic-responsive-theme
 *
 */
?>

<div id="au_spotlight-footer-content">
	<div id="au_spotlight-footer-left">
		<div>
			<?php echo elgg_view('page/elements/footer/footer_left'); ?> 
		</div>
	</div>
	<div id="au_spotlight-footer-main">
		<div>
			<?php echo elgg_view('page/elements/footer/footer_main'); ?> 
		</div>
	</div>
	<div id="au_spotlight-footer-right">
		<div>
			<?php echo elgg_view('page/elements/footer/footer_right'); ?> 
		</div>
	</div>
	<div class="clearfix"></div>
</div>
<div class="clearfix"></div>
<div id="footer_links">
<?php echo elgg_view_menu('footer', array('sort_by' => 'priority', 'class' => 'elgg-menu-hz')); ?>

</div>
<div class="clearfix"></div>