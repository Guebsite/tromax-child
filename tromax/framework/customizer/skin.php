<?php
function tromax_customize_register_skin($wp_customize) {
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

    $skins = array( 
    	'default' => __('Default(red)','tromax'),
        'orange' =>  __('Orange','tromax'),
        'green' => __('Green','tromax'),
        'blue' => __('Blue', 'tromax'),
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
        if ( in_array($input, array('default','orange', 'green','blue') ) )
            return $input;
        else
            return '';
    }
}
add_action('customize_register', 'tromax_customize_register_skin');