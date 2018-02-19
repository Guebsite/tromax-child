<header id="masthead" class="site-header" role="banner">
    <div class="container masthead-container">
        <div class="site-branding">
            <?php if ( tromax_has_logo()) : ?>
                <div id="site-logo">
                    <?php tromax_logo(); ?>
                </div>
            <?php endif; ?>
            <div id="text-title-desc">
                <h1 class="site-title title-font"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
            </div>
        </div>
    </div>

</header><!-- #masthead -->