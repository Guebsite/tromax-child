<?php
// Layout and Design
function tromax_customize_register_layouts($wp_customize) {
    $wp_customize->add_panel('tromax_design_panel', array(
        'priority' => 40,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __('Design & Layout', 'tromax'),
    ));

    $wp_customize->add_section(
        'tromax_design_options',
        array(
            'title' => __('Blog Layout', 'tromax'),
            'priority' => 0,
            'panel' => 'tromax_design_panel'
        )
    );


    $wp_customize->add_setting(
        'tromax_blog_layout',
        array('sanitize_callback' => 'tromax_sanitize_blog_layout')
    );

    function tromax_sanitize_blog_layout($input)
    {
        if (in_array($input, array('grid', 'tromax', 'photograph')))
            return $input;
        else
            return '';
    }

    $wp_customize->add_control(
        'tromax_blog_layout', array(
            'label' => __('Select Layout', 'tromax'),
            'settings' => 'tromax_blog_layout',
            'section' => 'tromax_design_options',
            'type' => 'select',
            'choices' => array(
                'grid' => __('Standard Blog Layout', 'tromax'),
                'tromax' => __('Tromax Theme Layout', 'tromax'),
                'photograph' => __('Photograph Layout', 'tromax'),
            )
        )
    );

    $wp_customize->add_section(
        'tromax_sidebar_options',
        array(
            'title' => __('Sidebar Layout', 'tromax'),
            'priority' => 0,
            'panel' => 'tromax_design_panel'
        )
    );

    $wp_customize->add_setting(
        'tromax_disable_sidebar',
        array('sanitize_callback' => 'tromax_sanitize_checkbox')
    );

    $wp_customize->add_control(
        'tromax_disable_sidebar', array(
            'settings' => 'tromax_disable_sidebar',
            'label' => __('Disable Sidebar Everywhere.', 'tromax'),
            'section' => 'tromax_sidebar_options',
            'type' => 'checkbox',
            'default' => false
        )
    );

    $wp_customize->add_setting(
        'tromax_disable_sidebar_home',
        array('sanitize_callback' => 'tromax_sanitize_checkbox')
    );

    $wp_customize->add_control(
        'tromax_disable_sidebar_home', array(
            'settings' => 'tromax_disable_sidebar_home',
            'label' => __('Disable Sidebar on Home/Blog.', 'tromax'),
            'section' => 'tromax_sidebar_options',
            'type' => 'checkbox',
            'active_callback' => 'tromax_show_sidebar_options',
            'default' => false
        )
    );

    $wp_customize->add_setting(
        'tromax_disable_sidebar_front',
        array('sanitize_callback' => 'tromax_sanitize_checkbox')
    );

    $wp_customize->add_control(
        'tromax_disable_sidebar_front', array(
            'settings' => 'tromax_disable_sidebar_front',
            'label' => __('Disable Sidebar on Front Page.', 'tromax'),
            'section' => 'tromax_sidebar_options',
            'type' => 'checkbox',
            'active_callback' => 'tromax_show_sidebar_options',
            'default' => false
        )
    );


    $wp_customize->add_setting(
        'tromax_sidebar_width',
        array(
            'default' => 4,
            'sanitize_callback' => 'tromax_sanitize_positive_number')
    );

    $wp_customize->add_control(
        'tromax_sidebar_width', array(
            'settings' => 'tromax_sidebar_width',
            'label' => __('Sidebar Width', 'tromax'),
            'description' => __('Min: 25%, Default: 33%, Max: 40%', 'tromax'),
            'section' => 'tromax_sidebar_options',
            'type' => 'range',
            'active_callback' => 'tromax_show_sidebar_options',
            'input_attrs' => array(
                'min' => 3,
                'max' => 5,
                'step' => 1,
                'class' => 'sidebar-width-range',
                'style' => 'color: #0a0',
            ),
        )
    );

    /* Active Callback Function */
    function tromax_show_sidebar_options($control)
    {

        $option = $control->manager->get_setting('tromax_disable_sidebar');
        return $option->value() == false;

    }

    function tromax_sanitize_text($input)
    {
        return wp_kses_post(force_balance_tags($input));
    }

    $wp_customize->add_section(
        'tromax_custom_footer',
        array(
            'title' => __('Custom Footer Text', 'tromax'),
            'description' => __('Enter your Own Copyright Text.', 'tromax'),
            'priority' => 11,
            'panel' => 'tromax_design_panel'
        )
    );

    $wp_customize->add_setting(
        'tromax_footer_text',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
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
}
add_action('customize_register', 'tromax_customize_register_layouts');