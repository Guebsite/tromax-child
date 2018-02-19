<?php
function tromax_customize_register_header($wp_customize) {
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
}
add_action('customize_register', 'tromax_customize_register_header');