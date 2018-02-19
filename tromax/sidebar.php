<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package tromax
 */

if ( ! is_active_sidebar( 'tromax-sidebar-1' ) ) {
	return;
}

if ( tromax_load_sidebar() ) : ?>
<div id="secondary" class="widget-area <?php apply_filters('tromax_secondary-width','tromax_secondary_class') ?>" role="complementary">
	<?php dynamic_sidebar( 'tromax-sidebar-1' ); ?>
</div><!-- #secondary -->
<?php endif; ?>
