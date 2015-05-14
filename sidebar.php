<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package nii_framework
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div id="secondary" class="uk-width-medium-1-4 widget-area" role="complementary">
	<div>
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</div>
</div><!-- #secondary -->
