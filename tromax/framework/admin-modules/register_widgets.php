<?php
/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function tromax_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Sidebar', 'tromax' ),
        'id'            => 'tromax-sidebar-1',
        'description'   => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-title title-font">',
        'after_title'   => '</h1>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 1', 'tromax' ),
        'id'            => 'tromax-footer-1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-title title-font">',
        'after_title'   => '</h1>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 2', 'tromax' ),
        'id'            => 'tromax-footer-2',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-title title-font">',
        'after_title'   => '</h1>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 3', 'tromax' ),
        'id'            => 'tromax-footer-3',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-title title-font">',
        'after_title'   => '</h1>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 4', 'tromax' ),
        'id'            => 'tromax-footer-4',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-title title-font">',
        'after_title'   => '</h1>',
    ) );
}
add_action( 'widgets_init', 'tromax_widgets_init' );