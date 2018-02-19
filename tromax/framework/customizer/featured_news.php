<?php
function tromax_customize_register_featured_news($wp_customize) {
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
}
add_action('customize_register', 'tromax_customize_register_featured_news');