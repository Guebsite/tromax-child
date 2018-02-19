<?php
function tromax_customize_register_google_fonts($wp_customize) {
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
}
add_action('customize_register', 'tromax_customize_register_google_fonts');