<?php
/**
 * tromax Theme Customizer
 *
 * @package tromax
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function tromax_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	
	
	
	//Logo Settings
	$wp_customize->add_section( 'title_tagline' , array(
	    'title'      => __( 'Title, Tagline & Logo', 'tromax' ),
	    'priority'   => 30,
	) );	
	
	$wp_customize->add_setting( 'tromax_logo_resize' , array(
	    'default'     => 100,
	    'sanitize_callback' => 'tromax_sanitize_positive_number',
	) );
	$wp_customize->add_control(
	        'tromax_logo_resize',
	        array(
	            'label' => __('Resize & Adjust Logo','tromax'),
	            'section' => 'title_tagline',
	            'settings' => 'tromax_logo_resize',
	            'priority' => 6,
	            'type' => 'range',
	            'active_callback' => 'tromax_logo_enabled',
	            'input_attrs' => array(
			        'min'   => 30,
			        'max'   => 200,
			        'step'  => 5,
			    ),
	        )
	);
	
	function tromax_logo_enabled($control) {
		$option = $control->manager->get_setting('custom_logo');
		return $option->value() == true;
	}
	
	
	
	//Replace Header Text Color with, separate colors for Title and Description
	//Override tromax_site_titlecolor
	$wp_customize->remove_control('header_text');
	$wp_customize->remove_setting('header_textcolor');
	$wp_customize->add_setting('tromax_site_titlecolor', array(
	    'default'     => '#FFFFFF',
	    'sanitize_callback' => 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(new WP_Customize_Color_Control( 
		$wp_customize, 
		'tromax_site_titlecolor', array(
			'label' => __('Site Title Color','tromax'),
			'section' => 'colors',
			'settings' => 'tromax_site_titlecolor',
			'type' => 'color'
		) ) 
	);
	
	$wp_customize->add_setting('tromax_header_desccolor', array(
	    'default'     => '#777777',
	    'sanitize_callback' => 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(new WP_Customize_Color_Control( 
		$wp_customize, 
		'tromax_header_desccolor', array(
			'label' => __('Site Tagline Color','tromax'),
			'section' => 'colors',
			'settings' => 'tromax_header_desccolor',
			'type' => 'color'
		) ) 
	);
	
	
	//Settings For Logo Area
	
	$wp_customize->add_setting(
		'tromax_hide_title_tagline',
		array( 'sanitize_callback' => 'tromax_sanitize_checkbox' )
	);
	
	$wp_customize->add_control(
			'tromax_hide_title_tagline', array(
		    'settings' => 'tromax_hide_title_tagline',
		    'label'    => __( 'Hide Title and Tagline.', 'tromax' ),
		    'section'  => 'title_tagline',
		    'type'     => 'checkbox',
		)
	);
		
	function tromax_title_visible( $control ) {
		$option = $control->manager->get_setting('tromax_hide_title_tagline');
	    return $option->value() == false ;
	}
	
		

	
	//FEATURED NEWS
	$wp_customize->add_section(
	    'tromax_a_fn_boxes',
	    array(
	        'title'     => __('Featured Posts','tromax'),
	        'priority'  => 35,
	    )
	);
	
	$wp_customize->add_setting(
		'tromax_fn_enable',
		array( 'sanitize_callback' => 'tromax_sanitize_checkbox' )
	);
	
	$wp_customize->add_control(
			'tromax_fn_enable', array(
		    'settings' => 'tromax_fn_enable',
		    'label'    => __( 'Enable Featured Posts', 'tromax' ),
		    'section'  => 'tromax_a_fn_boxes',
		    'type'     => 'checkbox',
		)
	);
	
 
	$wp_customize->add_setting(
		'tromax_fn_title',
		array( 'sanitize_callback' => 'sanitize_text_field' )
	);
	
	$wp_customize->add_control(
			'tromax_fn_title', array(
		    'settings' => 'tromax_fn_title',
		    'label'    => __( 'Title','tromax' ),
		    'description'    => __( 'Leave Blank to disable','tromax' ),
		    'section'  => 'tromax_a_fn_boxes',
		    'type'     => 'text',
		)
	);
 
 	$wp_customize->add_setting(
	    'tromax_fn_cat',
	    array( 'sanitize_callback' => 'tromax_sanitize_category' )
	);
	
	$wp_customize->add_control(
	    new Tromax_WP_Customize_Category_Control(
	        $wp_customize,
	        'tromax_fn_cat',
	        array(
	            'label'    => __('Posts Category.','tromax'),
	            'settings' => 'tromax_fn_cat',
	            'section'  => 'tromax_a_fn_boxes'
	        )
	    )
	);	
	
	
	// Layout and Design
	$wp_customize->add_panel( 'tromax_design_panel', array(
	    'priority'       => 40,
	    'capability'     => 'edit_theme_options',
	    'theme_supports' => '',
	    'title'          => __('Design & Layout','tromax'),
	) );
	
	$wp_customize->add_section(
	    'tromax_design_options',
	    array(
	        'title'     => __('Blog Layout','tromax'),
	        'priority'  => 0,
	        'panel'     => 'tromax_design_panel'
	    )
	);
	
	
	$wp_customize->add_setting(
		'tromax_blog_layout',
		array( 'sanitize_callback' => 'tromax_sanitize_blog_layout' )
	);
	
	function tromax_sanitize_blog_layout( $input ) {
		if ( in_array($input, array('grid','tromax') ) )
			return $input;
		else 
			return '';	
	}
	
	$wp_customize->add_control(
		'tromax_blog_layout',array(
				'label' => __('Select Layout','tromax'),
				'settings' => 'tromax_blog_layout',
				'section'  => 'tromax_design_options',
				'type' => 'select',
				'choices' => array(
						'grid' => __('Standard Blog Layout','tromax'),
						'tromax' => __('Tromax Theme Layout','tromax'),
					)
			)
	);
	
	$wp_customize->add_section(
	    'tromax_sidebar_options',
	    array(
	        'title'     => __('Sidebar Layout','tromax'),
	        'priority'  => 0,
	        'panel'     => 'tromax_design_panel'
	    )
	);
	
	$wp_customize->add_setting(
		'tromax_disable_sidebar',
		array( 'sanitize_callback' => 'tromax_sanitize_checkbox' )
	);
	
	$wp_customize->add_control(
			'tromax_disable_sidebar', array(
		    'settings' => 'tromax_disable_sidebar',
		    'label'    => __( 'Disable Sidebar Everywhere.','tromax' ),
		    'section'  => 'tromax_sidebar_options',
		    'type'     => 'checkbox',
		    'default'  => false
		)
	);
	
	$wp_customize->add_setting(
		'tromax_disable_sidebar_home',
		array( 'sanitize_callback' => 'tromax_sanitize_checkbox' )
	);
	
	$wp_customize->add_control(
			'tromax_disable_sidebar_home', array(
		    'settings' => 'tromax_disable_sidebar_home',
		    'label'    => __( 'Disable Sidebar on Home/Blog.','tromax' ),
		    'section'  => 'tromax_sidebar_options',
		    'type'     => 'checkbox',
		    'active_callback' => 'tromax_show_sidebar_options',
		    'default'  => false
		)
	);
	
	$wp_customize->add_setting(
		'tromax_disable_sidebar_front',
		array( 'sanitize_callback' => 'tromax_sanitize_checkbox' )
	);
	
	$wp_customize->add_control(
			'tromax_disable_sidebar_front', array(
		    'settings' => 'tromax_disable_sidebar_front',
		    'label'    => __( 'Disable Sidebar on Front Page.','tromax' ),
		    'section'  => 'tromax_sidebar_options',
		    'type'     => 'checkbox',
		    'active_callback' => 'tromax_show_sidebar_options',
		    'default'  => false
		)
	);
	
	
	$wp_customize->add_setting(
		'tromax_sidebar_width',
		array(
			'default' => 4,
		    'sanitize_callback' => 'tromax_sanitize_positive_number' )
	);
	
	$wp_customize->add_control(
			'tromax_sidebar_width', array(
		    'settings' => 'tromax_sidebar_width',
		    'label'    => __( 'Sidebar Width','tromax' ),
		    'description' => __('Min: 25%, Default: 33%, Max: 40%','tromax'),
		    'section'  => 'tromax_sidebar_options',
		    'type'     => 'range',
		    'active_callback' => 'tromax_show_sidebar_options',
		    'input_attrs' => array(
		        'min'   => 3,
		        'max'   => 5,
		        'step'  => 1,
		        'class' => 'sidebar-width-range',
		        'style' => 'color: #0a0',
		    ),
		)
	);
	
	/* Active Callback Function */
	function tromax_show_sidebar_options($control) {
	   
	    $option = $control->manager->get_setting('tromax_disable_sidebar');
	    return $option->value() == false ;
	    
	}
	
	function tromax_sanitize_text( $input ) {
	    return wp_kses_post( force_balance_tags( $input ) );
	}
	
	$wp_customize-> add_section(
    'tromax_custom_footer',
    array(
    	'title'			=> __('Custom Footer Text','tromax'),
    	'description'	=> __('Enter your Own Copyright Text.','tromax'),
    	'priority'		=> 11,
    	'panel'			=> 'tromax_design_panel'
    	)
    );
    
	$wp_customize->add_setting(
	'tromax_footer_text',
	array(
		'default'		=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
		)
	);
	
	$wp_customize->add_control(	 
	       'tromax_footer_text',
	        array(
	            'section' => 'tromax_custom_footer',
	            'settings' => 'tromax_footer_text',
	            'type' => 'text'
	        )
	);	
	
	
	//Select the Default Theme Skin
	$wp_customize->add_section(
	    'tromax_skin_options',
	    array(
	        'title'     => __('Choose Skin','tromax'),
	        'priority'  => 39,
	    )
	);
	
	$wp_customize->add_setting(
		'tromax_skin',
		array(
			'default'=> 'default',
			'sanitize_callback' => 'tromax_sanitize_skin' 
			)
	);
	
	$skins = array( 'default' => __('Default(red)','tromax'),
					'orange' =>  __('Orange','tromax'),
					'green' => __('Green','tromax'),
					);
	
	$wp_customize->add_control(
		'tromax_skin',array(
				'settings' => 'tromax_skin',
				'section'  => 'tromax_skin_options',
				'type' => 'select',
				'choices' => $skins,
			)
	);
	
	function tromax_sanitize_skin( $input ) {
		if ( in_array($input, array('default','orange','brown','green','grayscale') ) )
			return $input;
		else
			return '';
	}
	
	
	//Fonts
	$wp_customize->add_section(
	    'tromax_typo_options',
	    array(
	        'title'     => __('Google Web Fonts','tromax'),
	        'priority'  => 41,
	        'description' => __('Defaults: Lato, Open Sans.','tromax')
	    )
	);
	
	$font_array = array('Raleway','Khula','Open Sans','Droid Sans','Droid Serif','Roboto','Roboto Condensed','Lato','Bree Serif','Oswald','Slabo','Lora','Source Sans Pro','PT Sans','Ubuntu','Lobster','Arimo','Bitter','Noto Sans');
	$fonts = array_combine($font_array, $font_array);
	
	$wp_customize->add_setting(
		'tromax_title_font',
		array(
			'default'=> 'Lato',
			'sanitize_callback' => 'tromax_sanitize_gfont' 
			)
	);
	
	function tromax_sanitize_gfont( $input ) {
		if ( in_array($input, array('Raleway','Khula','Open Sans','Droid Sans','Droid Serif','Roboto','Roboto Condensed','Lato','Bree Serif','Oswald','Slabo','Lora','Source Sans Pro','PT Sans','Ubuntu','Lobster','Arimo','Bitter','Noto Sans') ) )
			return $input;
		else
			return '';	
	}
	
	$wp_customize->add_control(
		'tromax_title_font',array(
				'label' => __('Title','tromax'),
				'settings' => 'tromax_title_font',
				'section'  => 'tromax_typo_options',
				'type' => 'select',
				'choices' => $fonts,
			)
	);
	
	$wp_customize->add_setting(
		'tromax_body_font',
			array(	'default'=> 'Open Sans',
					'sanitize_callback' => 'tromax_sanitize_gfont' )
	);
	
	$wp_customize->add_control(
		'tromax_body_font',array(
				'label' => __('Body','tromax'),
				'settings' => 'tromax_body_font',
				'section'  => 'tromax_typo_options',
				'type' => 'select',
				'choices' => $fonts
			)
	);
	
	// Social Icons
	$wp_customize->add_section('tromax_social_section', array(
			'title' => __('Social Icons','tromax'),
			'priority' => 44 ,
	));
	
	$social_networks = array( //Redefinied in Sanitization Function.
					'none' => __('-','tromax'),
					'facebook' => __('Facebook','tromax'),
					'twitter' => __('Twitter','tromax'),
					'google-plus' => __('Google Plus','tromax'),
					'instagram' => __('Instagram','tromax'),
					'rss' => __('RSS Feeds','tromax'),
					'vine' => __('Vine','tromax'),
					'vimeo-square' => __('Vimeo','tromax'),
					'youtube' => __('Youtube','tromax'),
					'flickr' => __('Flickr','tromax'),
				);
				
	$social_count = count($social_networks);
				
	for ($x = 1 ; $x <= ($social_count - 3) ; $x++) :
			
		$wp_customize->add_setting(
			'tromax_social_'.$x, array(
				'sanitize_callback' => 'tromax_sanitize_social',
				'default' => 'none'
			));

		$wp_customize->add_control( 'tromax_social_'.$x, array(
					'settings' => 'tromax_social_'.$x,
					'label' => __('Icon ','tromax').$x,
					'section' => 'tromax_social_section',
					'type' => 'select',
					'choices' => $social_networks,			
		));
		
		$wp_customize->add_setting(
			'tromax_social_url'.$x, array(
				'sanitize_callback' => 'esc_url_raw'
			));

		$wp_customize->add_control( 'tromax_social_url'.$x, array(
					'settings' => 'tromax_social_url'.$x,
					'description' => __('Icon ','tromax').$x.__(' Url','tromax'),
					'section' => 'tromax_social_section',
					'type' => 'url',
					'choices' => $social_networks,			
		));
		
	endfor;
	
	function tromax_sanitize_social( $input ) {
		$social_networks = array(
					'none' ,
					'facebook',
					'twitter',
					'google-plus',
					'instagram',
					'rss',
					'vine',
					'vimeo-square',
					'youtube',
					'flickr'
				);
		if ( in_array($input, $social_networks) )
			return $input;
		else
			return '';	
	}
	
	$wp_customize->add_section(
	    'tromax_sec_upgrade',
	    array(
	        'title'     => __('Tromax Theme - Help & Support','tromax'),
	        'priority'  => 45,
	    )
	);
	
	$wp_customize->add_setting(
			'tromax_upgrade',
			array( 'sanitize_callback' => 'esc_textarea' )
		);
			
	$wp_customize->add_control(
	    new Tromax_WP_Customize_Upgrade_Control(
	        $wp_customize,
	        'tromax_upgrade',
	        array(
	            'label' => __('Thank You','tromax'),
	            'description' => __('Thank You for Choosing Tromax Theme by Rohitink.com. <br> Tromax is a Powerful Wordpress theme which also supports WooCommerce in the best possible way. It is "as we say" the last theme you would ever need. It has all the basic and advanced features needed to run a gorgeous looking site. For any Help related to this theme, please visit  <a href="https://rohitink.com/2016/11/16/tromax-responsive-wordpress-theme/">Tromax Help & Support</a>.','tromax'),
	            'section' => 'tromax_sec_upgrade',
	            'settings' => 'tromax_upgrade',			       
	        )
		)
	);
	
	$wp_customize->add_section(
	    'tromax_sec_pro',
	    array(
	        'title'     => __('Tromax Pro (Unlock More Features)','tromax'),
	        'priority'  => 44,
	    )
	);
	
	$wp_customize->add_setting(
			'tromax_upgrade_pro',
			array( 'sanitize_callback' => 'esc_textarea' )
		);
			
	$wp_customize->add_control(
	    new Tromax_WP_Customize_Upgrade_Control(
	        $wp_customize,
	        'tromax_upgrade_pro',
	        array(
	            'label' => __('Tromax Pro is a Beast!','tromax'),
	            'description' => __('Thanks for visiting this section.<br /> I hope you are enjoying the free version of this theme. I have not restricted any feature in the free version. But for those who want more power, more performance and more customization I have created a pro version for you as well. Some of the exciting Features of Tromax Pro are <br /><br />- Better Mobile Friendliness <br />- Unlimited Colors & Skins <br />- Many More Featured Areas <br />- Advanced Slider  <br />- 600+ Custom Fonts <br />- More Blog/Page Layouts <br />- Adsense Support  <br />- And Much More <br /><br /> To Purchase & Know more visit  <a href="https://rohitink.com/product/tromax-pro/">Tromax Pro</a>.','tromax'),
	            'section' => 'tromax_sec_pro',
	            'settings' => 'tromax_upgrade_pro',			       
	        )
		)
	);
	
	
	/* Sanitization Functions Common to Multiple Settings go Here, Specific Sanitization Functions are defined along with add_setting() */
	function tromax_sanitize_checkbox( $input ) {
	    if ( $input == 1 ) {
	        return 1;
	    } else {
	        return '';
	    }
	}
	
	function tromax_sanitize_positive_number( $input ) {
		if ( ($input >= 0) && is_numeric($input) )
			return $input;
		else
			return '';	
	}
	
	function tromax_sanitize_category( $input ) {
		if ( term_exists(get_cat_name( $input ), 'category') )
			return $input;
		else 
			return '';	
	}
	
	function tromax_sanitize_product_category( $input ) {
		if ( get_term( $input, 'product_cat' ) )
			return $input;
		else 
			return '';	
	}
	
	
}
add_action( 'customize_register', 'tromax_customize_register' );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function tromax_customize_preview_js() {
	wp_enqueue_script( 'tromax_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'tromax_customize_preview_js' );
