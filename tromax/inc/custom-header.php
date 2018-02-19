<?php
/**
 * Sample implementation of the Custom Header feature
 * http://codex.wordpress.org/Custom_Headers
 *
 * You can add an optional custom header image to header.php like so ...

	<?php if ( get_header_image() ) : ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
	</a>
	<?php endif; // End header image check. ?>

 *
 * @package tromax
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses tromax_header_style()
 * @uses tromax_admin_header_style()
 * @uses tromax_admin_header_image()
 */
function tromax_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'tromax_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '#ffffff',
		'height'				 => 400,
		'width'					 => 1200,
		'flex-height'            => true,
		'wp-head-callback'       => 'tromax_header_style',
		'admin-head-callback'    => 'tromax_admin_header_style',
		'admin-preview-callback' => 'tromax_admin_header_image',
	) ) );
}
add_action( 'after_setup_theme', 'tromax_custom_header_setup' );

if ( ! function_exists( 'tromax_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see tromax_custom_header_setup().
 */
function tromax_header_style() {
	?>
	<style>
	#masthead {
			background-image: url(<?php header_image(); ?>);
			background-size: <?php echo get_theme_mod('tromax_himg_style','cover'); ?>;
			background-position-x: <?php echo get_theme_mod('tromax_himg_align','center'); ?>;
			background-repeat: <?php echo  get_theme_mod('tromax_himg_repeat') ? "repeat" : "no-repeat" ?>;
		}
	</style>	
	<?php
}
endif; // tromax_header_style

if ( ! function_exists( 'tromax_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * @see tromax_custom_header_setup().
 */
function tromax_admin_header_style() {
?>
	<style type="text/css">
		.appearance_page_custom-header #headimg {
			border: none;
		}
		#headimg h1,
		#desc {
		}
		#headimg h1 {
		}
		#headimg h1 a {
		}
		#desc {
		}
		#headimg img {
		}
	</style>
<?php
}
endif; // tromax_admin_header_style

if ( ! function_exists( 'tromax_admin_header_image' ) ) :
/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * @see tromax_custom_header_setup().
 */
function tromax_admin_header_image() {
	$style = sprintf( ' style="color:#%s;"', get_header_textcolor() );
?>
	<div id="headimg">
		<h1 class="displaying-header-text"><a id="name"<?php echo $style; ?> onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
		<div class="displaying-header-text" id="desc"<?php echo $style; ?>><?php bloginfo( 'description' ); ?></div>
		<?php if ( get_header_image() ) : ?>
		<img src="<?php header_image(); ?>" alt="">
		<?php endif; ?>
	</div>
<?php
}
endif; // tromax_admin_header_image