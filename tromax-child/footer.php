<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package tromax
 */
?>

<?php include('cuadros.php');?>
    
    
	</div><!-- #content -->

	<?php get_sidebar('footer'); ?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info container">
			<?php printf( __( 'Powered by %1$s.', 'Guebsite' ), '<a href="'.esc_url("#").'" rel="designer">Guebsite</a>' ); ?>
			<span class="sep"></span>
			<?php echo ( get_theme_mod('tromax_footer_text') == '' ) ? ('&copy; '.date('Y').' '.get_bloginfo('name').__('. All Rights Reserved. ','Rentobregon')) : esc_html( get_theme_mod('tromax_footer_text') ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
	
</div><!-- #page -->


<?php wp_footer(); ?>

</body>
</html>
