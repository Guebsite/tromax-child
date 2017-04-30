<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package tromax
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'tromax' ); ?></a>
	<div id="jumbosearch">
		<span class="fa fa-remove closeicon"></span>
		<div class="form">
			<?php get_search_form(); ?>
		</div>
	</div>	
	
	<div id="top-bar">
	   
		<div class="container">
			
			<div id="util-links">
				<?php if (class_exists('woocommerce')) : ?>
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
					
				<?php endif; ?>

				
			</div><!--#util-links-->
			
			<div class="social-icons">
				<?php get_template_part('social', 'fa'); ?>	 
			</div>
			<div id="top-menu">
				<?php wp_nav_menu( array( 'theme_location' => 'top' ) ); ?>
			</div>
		</div>
	</div>
	
	<header id="masthead" class="site-header" role="banner">
	    
		<div class="container masthead-container">
		<div class="social">
	<span class="line"></span>
	<ul>
		<li class="facebook">
			<a href="https://facebook.com/lucas.russo.923" target="_blank">
				<i class="fa fa-facebook fa-2x"></i>
			</a>
		</li>
		<li class="twitter">
			<a href="https://twitter.com/lucasrdvp" target="_blank">
				<i class="fa fa-twitter fa-2x"></i>
			</a>
		</li>
		
		<li class="youtube">
			<a href="#" target="_blank">
				<i class="fa fa-youtube fa-2x"></i>
			</a>
		</li>
		
		
		
		
		
	</ul>
</div>
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
	
	<div id="slickmenu"></div>
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
		
	<?php get_template_part('featured', 'showcase'); ?>
	
	<?php get_template_part('featured', 'news'); ?>
	
	<div class="mega-container">
		
	
		<div id="content" class="site-content container">
<?php echo do_shortcode( '[searchandfilter fields="search,product_cat,taxonomyone,taxonomytwo" empty_search_url="http://www.rentobregon.com.mx/inmuebles/" search_placeholder="Buscar propiedades en Cd.Obregón" submit_label="Buscar"]' ); ?>