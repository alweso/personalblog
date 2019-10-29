<?php

function bootstrapstarter_enqueue_styles() {
    wp_register_style('bootstrap', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css' );
    $dependencies = array('bootstrap');
    wp_enqueue_style( 'bootstrapstarter-style', get_stylesheet_uri(), $dependencies ); 
}

function bootstrapstarter_enqueue_scripts() {
    $dependencies = array('jquery');
    wp_enqueue_script('bootstrap', get_template_directory_uri().'/bootstrap/js/bootstrap.min.js', $dependencies, '3.3.6', true );
}

add_action( 'wp_enqueue_scripts', 'bootstrapstarter_enqueue_styles' );
add_action( 'wp_enqueue_scripts', 'bootstrapstarter_enqueue_scripts' );

function bootstrapstarter_wp_setup() {
    add_theme_support( 'title-tag' );
}

add_action( 'after_setup_theme', 'bootstrapstarter_wp_setup' );

// add_action( 'init', 'bootstrapstarter_register_menu' );

function bootstrapstarter_widgets_init() {

    register_sidebar( array(
        'name'          => 'Footer - Copyright Text',
        'id'            => 'footer_copyright_text',
        'before_widget' => '<div class="footer_copyright_text">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => 'Sidebar - Inset',
        'id'            => 'sidebar-1',
        'before_widget' => '<div class="sidebar-module sidebar-module-inset">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ) );
    
    register_sidebar( array(
        'name'          => 'Sidebar - Default',
        'id'            => 'sidebar-2',
        'before_widget' => '<div class="sidebar-module">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ) );

}
add_action( 'widgets_init', 'bootstrapstarter_widgets_init' );
add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio' ) );
add_theme_support( 'post-thumbnails', array( 'post', 'page' ) ); // Posts and Pages
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

if ( ! isset( $content_width ) ) $content_width = 1300;

require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';

register_nav_menus( array(
	'primary' => __( 'Primary Menu', 'pascarubuddy' ),
) );
// require_once('bootstrap-navwalker/class-wp-bootstrap-navwalker.php');
?>