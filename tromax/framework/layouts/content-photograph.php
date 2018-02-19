<?php
/**
 * @package Tromax
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('col-md-6 col-sm-6 grid grid_2_column photograph'); ?>>

    <div class="featured-thumb col-md-12 col-sm-12">
        <?php if (has_post_thumbnail()) : ?>
            <a href="<?php the_permalink() ?>"><?php the_post_thumbnail('tromax-pop-thumb'); ?></a>
        <?php else: ?>
            <a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><img src="<?php echo get_template_directory_uri()."/assets/images/placeholder2.jpg"; ?>"></a>
        <?php endif; ?>
    </div><!--.featured-thumb-->

    <div class="out-thumb col-md-12 col-sm-12">
        <header class="entry-header">
            <h1 class="entry-title title-font"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
            <span class="entry-excerpt">
        </header><!-- .entry-header -->
    </div><!--.out-thumb-->

</article><!-- #post-## -->