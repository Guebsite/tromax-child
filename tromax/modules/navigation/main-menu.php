<nav id="site-navigation" class="main-navigation" role="navigation">
    <div class="container">
        <?php $walker = new Tromax_menu_with_Icon;
        if (!has_nav_menu('primary')) :
            $walker = '';
        endif;
        wp_nav_menu( array( 'theme_location' => 'primary', 'walker' => $walker ) ); ?>

        <div id="searchicon">
            <i class="fa fa-search"></i>
        </div>
    </div>
</nav><!-- #site-navigation -->