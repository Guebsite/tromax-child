<?php
/*
** WooCommerce Compatibility File for Tromax Theme
** Created by Rohit Tripathi, Rohitink.com (c) 2015
** @package tromax
*/

// Remove each style one by one
add_filter( 'woocommerce_enqueue_styles', 'tromax_dequeue_woocommerce_styles' );
function tromax_dequeue_woocommerce_styles( $enqueue_styles ) {
	unset( $enqueue_styles['woocommerce-general'] );	// Remove the gloss
	//unset( $enqueue_styles['woocommerce-layout'] );		// Remove the layout
	//unset( $enqueue_styles['woocommerce-smallscreen'] );	// Remove the smallscreen optimisation
	return $enqueue_styles;
}

//Custom Hooking for Product Loop Page Items.
function tromax_before_wc_title() {
	echo "<div class='product-desc'>";
}
add_action('woocommerce_before_shop_loop_item_title', 'tromax_before_wc_title', 15);

function tromax_after_wc_title() {
	echo "</div>";
}
add_action('woocommerce_after_shop_loop_item_title', 'tromax_after_wc_title');

/**
 * Remove the "shop" title on the main shop page
*/
function tromax_woo_hide_page_title() {
	return false;
}
add_filter( 'woocommerce_show_page_title' , 'tromax_woo_hide_page_title' );

/**
 * Change the Breadcrumb
 */
add_filter( 'woocommerce_breadcrumb_defaults', 'tromax_change_breadcrumb_delimiter' );
function tromax_change_breadcrumb_delimiter( $defaults ) {
	// Change the breadcrumb delimeter from '/' to '>>'
	$defaults['delimiter'] = ' <i class="fa fa-angle-right"></i> ';
	return $defaults;
}

/*
 * WooCommerce Output Wrappers for for Single Product(single-product.php) and Product Archives(archive-product.php)
 */
add_action('woocommerce_before_main_content', 'tromax_single_custom_header', 1 );

function tromax_single_custom_header() {
    if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
        <div class="header-title col-md-12">
            <span><?php woocommerce_page_title(); ?></span>
        </div>
    <?php endif; ?>

    <div id="primary-mono" class="content-area <?php do_action('tromax_primary-width') ?>">
        <main id="main" class="site-main" role="main">
    <?php
}

add_action( 'woocommerce_after_main_content', 'tromax_single_custom_footer', 50 );

function tromax_single_custom_footer() {
    echo "</main></div>";
}


/**
 * WooCommerce Extra Feature
 * --------------------------
 *
 * Change number of related products on product page
 * Set your own value for 'posts_per_page'
 *
 */ 
add_filter( 'woocommerce_output_related_products_args', 'tromax_change_related_products_count' );

function tromax_change_related_products_count( $args ) {
     $args['posts_per_page'] = 3;
     $args['columns'] = 3;

     return $args;
}

//Product Gallery Size 
function tromax_gallery_four_columns(  ){
    return 4;
}
add_filter( 'woocommerce_product_thumbnails_columns', 'tromax_gallery_four_columns');

// Change number or products per row to 3
add_filter('loop_shop_columns', 'tromax_loop_columns');
if (!function_exists('tromax_loop_columns')) {
	function tromax_loop_columns() {
		return 3; // 3 products per row
	}
}

// Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php)
add_filter( 'woocommerce_add_to_cart_fragments', 'tromax_header_add_to_cart_fragment' );

function tromax_header_add_to_cart_fragment( $fragments ) {
	ob_start();
	?>
			<a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'tromax'); ?>">
						<div class="count"><?php echo sprintf(_n('%d item', '%d items', WC()->cart->cart_contents_count, 'tromax'), WC()->cart->cart_contents_count);?></div>
						
					</a>
	<?php
	
	$fragments['a.cart-contents'] = ob_get_clean();
	
	return $fragments;
}
