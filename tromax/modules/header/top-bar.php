<div id="top-bar">
    <div class="container">

        <?php if (class_exists('woocommerce')) : ?>
            <div id="util-links">

                <div id="top-cart">
                    <div class="top-cart-icon">
                        <i class="fa fa-shopping-cart"></i>

                        <a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'tromax'); ?>">
                            <div class="count"><?php echo sprintf(_n('%d item', '%d items', WC()->cart->cart_contents_count, 'tromax'), WC()->cart->cart_contents_count);?></div>

                        </a>


                    </div>
                </div>

                <div id="userlinks">
                    <i class="fa fa-user"></i>
                    <?php if ( is_user_logged_in() ) { ?>
                        <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('My Account','tromax'); ?>"><?php _e('My Account','tromax'); ?></a>
                    <?php }
                    else { ?>
                        <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('Login / Register','tromax'); ?>"><?php _e('Login / Register','tromax'); ?></a>
                    <?php } ?>
                </div>

            </div><!--#util-links-->
        <?php endif; ?>
        <div class="social-icons">
            <?php get_template_part('/modules/social/social', 'fa'); ?>
        </div>
        <?php get_template_part('/modules/navigation/top', 'menu'); ?>
    </div>
</div>