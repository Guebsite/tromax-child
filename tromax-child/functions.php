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
                'name' => 'Barra Inicio',
                'id' => 'barra_inicio',
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

if ( ! function_exists( 'custom_real_estate' ) ) {

// Register Custom Taxonomy
function custom_real_estate() {

	$labels = array(
		'name'                       => _x( 'Inmobiliarias', 'Taxonomy General Name', 'inmobiliaria' ),
		'singular_name'              => _x( 'Inmobiliaria', 'Taxonomy Singular Name', 'inmobiliaria' ),
		'menu_name'                  => __( 'Inmobiliarias', 'inmobiliaria' ),
		'all_items'                  => __( 'All Items', 'inmobiliaria' ),
		'parent_item'                => __( 'Parent Item', 'inmobiliaria' ),
		'parent_item_colon'          => __( 'Parent Item:', 'inmobiliaria' ),
		'new_item_name'              => __( 'New Item Name', 'inmobiliaria' ),
		'add_new_item'               => __( 'Add New Item', 'inmobiliaria' ),
		'edit_item'                  => __( 'Edit Item', 'inmobiliaria' ),
		'update_item'                => __( 'Update Item', 'inmobiliaria' ),
		'view_item'                  => __( 'View Item', 'inmobiliaria' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'inmobiliaria' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'inmobiliaria' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'inmobiliaria' ),
		'popular_items'              => __( 'Popular Items', 'inmobiliaria' ),
		'search_items'               => __( 'Search Items', 'inmobiliaria' ),
		'not_found'                  => __( 'Not Found', 'inmobiliaria' ),
		'no_terms'                   => __( 'No items', 'inmobiliaria' ),
		'items_list'                 => __( 'Items list', 'inmobiliaria' ),
		'items_list_navigation'      => __( 'Items list navigation', 'inmobiliaria' ),
	);
	$rewrite = array(
		'slug'                       => 'inmobiliaria',
		'with_front'                 => true,
		'hierarchical'               => false,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'Inmobiliaria', array( 'product' ), $args );

}
add_action( 'init', 'custom_real_estate', 0 );

}

/* SITEMAP  */
// header('Content-Disposition: attachment; filename="sitemap.xml"'); // SI SE HABILITA, NOS DEVUELVE UN FICHERO SITEMAP.XML
function poetxmlsitemapgenerator_init(){
// OBTENER LISTA DE LOS POST
  $posts = get_posts(array(
   'numberposts' => -1,
   'orderby'     => 'modified',
   'post_type'   => array ( 'product','page','post'),  // URL QUE SE MOSTRARÁN EN EL SITEMAP.
    'order'       => 'DESC' // ORDEN: EL MÁS RECIENTE CREADO O ACTUALIZADO SE SITUARÁ EN PRIMER LUGAR.
  ));
  
// GENERAR CADENAS XML SITEMAP 
$xmlsitemap = '<?xml version="1.0" encoding="UTF-8"?>';
$xmlsitemap .= '<?xml-stylesheet type="text/xsl" href="sitemap-style.xsl"?>';  // HOJA DE ESTILO PARA LA PRESENTACIÓN EN HTML
$xmlsitemap .='<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

// URL´S DE LOS POSTS, PÁGINAS Y PRODUCTOS Y CATEGORÍAS DE PRODUCTO.
  foreach($posts as $post) {
    setup_postdata($post);
    $postdate = explode(" ", $post->post_modified);
    $xmlsitemap .= '<url>'.
      '<loc>'. get_permalink($post->ID) .'</loc>'. // URL DE LAS PÁGINAS, POST, CATEGORIAS, PRODUCTOS
      '<lastmod>' . $postdate[0] . 'T' . $postdate[1] . $tempo .  '</lastmod>'.   // DEJA CONSTANCIA EN EL SITEMAP DE LA ÚLTIMA ACTUALIZACIÓN.
      '<changefreq>weekly</changefreq>'. // FRECUENCIA CON LA QUE PUEDE CAMBIAR ESTA PÁGINA: ALWAYS, HOURLY, DAILY, WEEKLY, MONTHLY, YEARLY, NEVER
	   '<priority>0.9</priority>'. //  FIJA LA RELEVANCIA/IMPORTANCIA  DE LAS PÁGINAS/PRODUCTOS ETC, AHORA ESTÁ AL 90%
    '</url>';
    }

// PÁGINA PRINCIPAL
  $xmlsitemap .= '<url>'.
      '<loc>'. get_site_url() .'</loc>'.
      '<lastmod>' . $postdate[0] . 'T' . $postdate[1] . $tempo .  '</lastmod>'. 
      '<changefreq>monthly</changefreq>'.
	  '<priority>1</priority>'. 
  '</url>';
 
// TODAS LAS CATEGORIAS DEL BLOG 
  $categories=  get_categories();
  foreach ($categories as $category) {
    $xmlsitemap .= '<url>'.
      '<loc>'. get_category_link($category->term_id) .'</loc>'.
      '<lastmod>' . $postdate[0] . 'T' . $postdate[1] . $tempo .  '</lastmod>'. 
      '<changefreq>weekly</changefreq>'.
	  '<priority>0.5</priority>'. 
    '</url>';
  }  
  
// LISTAR TODAS LAS TAGS 
  $tags = get_tags();
  foreach ( $tags as $tag ) {
    $xmlsitemap .= '<url>'.
      '<loc>'. get_tag_link($tag->term_id) .'</loc>'.
      '<lastmod>' . $postdate[0] . 'T' . $postdate[1] . $tempo .  '</lastmod>'. 
      '<changefreq>weekly</changefreq>'.
	   '<priority>0.7</priority>'.  
    '</url>';
  }
  
  $xmlsitemap .= '</urlset>';
  $file = ABSPATH . "sitemap.xml";
  
// ESCRIBIR LA CADENA DE SITEMAP XML 
  $fp = fopen(ABSPATH . "sitemap.xml", 'w');
  fwrite($fp, $xmlsitemap);
  fclose($fp);
}

// XML SITEMAP GENERADO 
add_action('publish_page', 'poetxmlsitemapgenerator_init');
add_action('publish_post', 'poetxmlsitemapgenerator_init');
add_action('trashed_post', 'poetxmlsitemapgenerator_init');
add_action('save_post',    'poetxmlsitemapgenerator_init');
// add_action('before_delete_post','poetxmlsitemapgenerator_init');

// Productos relacionados por etiqueta 
add_filter( 'woocommerce_product_related_posts_relate_by_category', '__return_false' );

// Cambio de texto Oferta por Promoción
add_filter( 'woocommerce_sale_flash', 'dinapyme_wc_modificar_texto_oferta' );

function dinapyme_wc_modificar_texto_oferta( $texto ) {
    //cabia el valor del texto original 'Sale!' de WooCommerce por el texto '¡Promoción!'
    return str_replace( __( 'Sale!', 'woocommerce' ), __( '¡Promoción!', 'woocommerce' ), $texto );
}

// Mostrar 24 productos por página
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 24;' ), 20 );