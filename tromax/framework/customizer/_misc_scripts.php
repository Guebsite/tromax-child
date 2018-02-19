<?php
function tromax_customize_register_misc($wp_customize) {
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
}
add_action('customize_register', 'tromax_customize_register_misc');