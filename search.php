<?php
/**
 * The template for displaying search results pages.
 *
 * @package tromax
 */

get_header(); ?>

	<section id="primary" class="<?php apply_filters('tromax_primary-width','tromax_primary_class') ?> content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Resultados de Búsqueda para:  %s', 'tromax' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
				/**
				 * Run the loop for the search to output the results.
				  */
				do_action('tromax_blog_layout'); 
				?>

			<?php endwhile; ?>

			<?php tromax_pagination(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
