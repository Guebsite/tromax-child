<?php
/**
 * tromax functions and definitions
 *
 * @package tromax
 */



if ( ! function_exists( 'custom_taxonomy' ) ) {

// Register Custom Taxonomy
function custom_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Colecciones', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Coleccion', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Colecciones', 'text_domain' ),
		'all_items'                  => __( 'Todas las Zonas', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Item Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Item', 'text_domain' ),
		'edit_item'                  => __( 'Edit Item', 'text_domain' ),
		'update_item'                => __( 'Update Item', 'text_domain' ),
		'view_item'                  => __( 'View Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                       => 'colecciones',
		'with_front'                 => true,
		'hierarchical'               => true,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'taxonomyone', array( 'product' ), $args );

}
add_action( 'init', 'custom_taxonomy', 0 );

}

if ( ! function_exists( 'custom_taxonomy' ) ) {

// Register Custom Taxonomy
function custom_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Equipamientos', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Equipamiento', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Equipamientos', 'text_domain' ),
		'all_items'                  => __( 'All Items', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Item Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Item', 'text_domain' ),
		'edit_item'                  => __( 'Edit Item', 'text_domain' ),
		'update_item'                => __( 'Update Item', 'text_domain' ),
		'view_item'                  => __( 'View Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                       => 'equipamiento',
		'with_front'                 => true,
		'hierarchical'               => true,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'taxonomytwo', array( 'product' ), $args );

}
add_action( 'init', 'custom_taxonomy', 0 );

}

function woo_reorder_tabs( $tabs ) {
 
	$tabs['reviews']['priority'] = 5;			// Reviews primero
	$tabs['description']['priority'] = 10;			// Description segundo
	$tabs['additional_information']['priority'] = 15;	// Información adicional tercero
    $tabs['common_tab']['priority'] = 20;	// Información adicional tercero
    
 
	return $tabs;
}


if ( function_exists('register_sidebar') ) {
 register_sidebar(array(
                'name' => 'Barra lateral blog',
                'id' => 'barra_blog1',
 'before_widget' => '<li id="%1$s" class="widget %2$s">',
 'after_widget' => '</li>',
 'before_title' => '<h2 class="widgettitle">',
 'after_title' => '</h2>',
 ));
}

if ( function_exists('register_sidebar') ) {
 register_sidebar(array(
                'name' => 'Barra Archivos Blog',
                'id' => 'barra_blog2',
 'before_widget' => '<li id="%1$s" class="widget %2$s">',
 'after_widget' => '</li>',
 'before_title' => '<h2 class="widgettitle">',
 'after_title' => '</h2>',
 ));
}

add_theme_support( 'wc-product-gallery-lightbox' );

if ( ! function_exists('custom_real_estate') ) {

// Register Custom Post Type
function custom_real_estate() {

	$labels = array(
		'name'                  => _x( 'inmobiliarias', 'Post Type General Name', 'real_state' ),
		'singular_name'         => _x( 'inmobiliaria', 'Post Type Singular Name', 'real_state' ),
		'menu_name'             => __( 'Inmobiliarias', 'real_state' ),
		'name_admin_bar'        => __( 'Inmobiliaria', 'real_state' ),
		'archives'              => __( 'Item Archives', 'real_state' ),
		'attributes'            => __( 'Item Attributes', 'real_state' ),
		'parent_item_colon'     => __( 'Parent Item:', 'real_state' ),
		'all_items'             => __( 'All Items', 'real_state' ),
		'add_new_item'          => __( 'Add New Item', 'real_state' ),
		'add_new'               => __( 'Add New', 'real_state' ),
		'new_item'              => __( 'Nueva Inmobiliaria', 'real_state' ),
		'edit_item'             => __( 'Editar Inmobiliaria', 'real_state' ),
		'update_item'           => __( 'Actualizar Inmobiliaria', 'real_state' ),
		'view_item'             => __( 'Ver Inmobiliaria', 'real_state' ),
		'view_items'            => __( 'View Inmobiliarias', 'real_state' ),
		'search_items'          => __( 'Search Inmobiliaria', 'real_state' ),
		'not_found'             => __( 'Not found', 'real_state' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'real_state' ),
		'featured_image'        => __( 'Featured Image', 'real_state' ),
		'set_featured_image'    => __( 'Set featured image', 'real_state' ),
		'remove_featured_image' => __( 'Remove featured image', 'real_state' ),
		'use_featured_image'    => __( 'Use as featured image', 'real_state' ),
		'insert_into_item'      => __( 'Insert into item', 'real_state' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'real_state' ),
		'items_list'            => __( 'Items list', 'real_state' ),
		'items_list_navigation' => __( 'Items list navigation', 'real_state' ),
		'filter_items_list'     => __( 'Filter items list', 'real_state' ),
	);
	$rewrite = array(
		'slug'                  => 'inmobiliaria',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => false,
	);
	$args = array(
		'label'                 => __( 'inmobiliaria', 'real_state' ),
		'description'           => __( 'Inmobiliarias', 'real_state' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'revisions', 'page-attributes', ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
	);
	register_post_type( 'inmobiliarias', $args );

}
add_action( 'init', 'custom_real_estate', 0 );

}