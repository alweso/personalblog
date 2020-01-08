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

function wpdocs_theme_name_scripts() {
    wp_enqueue_style( 'style-name',  get_template_directory_uri() . '/fontawesome-free-5.11.2-web/css/all.css');
}

function my_theme_scripts() {
    wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', array( 'jquery' ), '1.0.0', true );
}


add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );
add_action( 'wp_enqueue_scripts', 'my_theme_scripts' );
add_action( 'wp_enqueue_scripts', 'bootstrapstarter_enqueue_styles' );
add_action( 'wp_enqueue_scripts', 'bootstrapstarter_enqueue_scripts' );

function bootstrapstarter_wp_setup() {
    add_theme_support( 'title-tag' );
}

add_action( 'after_setup_theme', 'bootstrapstarter_wp_setup' );

// add_action( 'init', 'bootstrapstarter_register_menu' );

function bootstrapstarter_widgets_init() {

    register_sidebar( array(
        'name'          => 'Footer 1',
        'id'            => 'footer_1',
        'before_widget' => '<div class="">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => 'Footer 2',
        'id'            => 'footer_2',
        'before_widget' => '<div class="">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => 'Footer 3',
        'id'            => 'footer_3',
        'before_widget' => '<div class="">',
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
add_theme_support(
    'custom-logo',
    array(
        'height'      => 100,
        'width'       => 200,
        'flex-width'  => true,
        'flex-height' => true,
    )
);

if ( ! isset( $content_width ) ) $content_width = 1300;

require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';

register_nav_menus( array(
	'primary' => __( 'Primary Menu', 'pascarubuddy' ),
) );
// require_once('bootstrap-navwalker/class-wp-bootstrap-navwalker.php');


// function custom_excerpt_length( $length ) {
// return 10;
// }
// add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);

  if (count($excerpt) >= $limit) {
      array_pop($excerpt);
      $excerpt = implode(" ", $excerpt) . '...';
  } else {
      $excerpt = implode(" ", $excerpt);
  }

  $excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);

  return $excerpt;
}

function content($limit) {
    $content = explode(' ', get_the_content(), $limit);

    if (count($content) >= $limit) {
        array_pop($content);
        $content = implode(" ", $content) . '...';
    } else {
        $content = implode(" ", $content);
    }

    $content = preg_replace('/\[.+\]/','', $content);
    $content = apply_filters('the_content', $content); 
    $content = str_replace(']]>', ']]&gt;', $content);

    return $content;
}


function themename_custom_header_setup() {
    $args = array(
        'default-image'      => get_template_directory_uri() . 'img/default-image.jpg',
        'default-text-color' => '000',
        'width'              => 1000,
        'height'             => 250,
        'flex-width'         => true,
        'flex-height'        => true,
    );
    add_theme_support( 'custom-header', $args );
}
add_action( 'after_setup_theme', 'themename_custom_header_setup' );

add_action('wp_ajax_myfilter', 'misha_filter_function'); // wp_ajax_{ACTION HERE} 
add_action('wp_ajax_nopriv_myfilter', 'misha_filter_function');

function misha_filter_function(){
    $args = array(
        'orderby' => 'date', // we will sort posts by date
        'order' => $_POST['date'] // ASC or DESC
    );

    // for taxonomies / categories
    if( isset( $_POST['categoryfilter'] ) )
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'category',
                'field' => 'id',
                'terms' => $_POST['categoryfilter']
            )
        );


    // if post thumbnail is set
    if( isset( $_POST['featured_image'] ) && $_POST['featured_image'] == 'on' )
        $args['meta_query'][] = array(
            'key' => '_thumbnail_id',
            'compare' => 'EXISTS'
        );
    // if you want to use multiple checkboxed, just duplicate the above 5 lines for each checkbox

    $query = new WP_Query( $args );

    if( $query->have_posts() ) : ?>
       <div class="container">
        <div class="row">
            <?php while( $query->have_posts() ): $query->the_post(); ?>

                <div class="col-sm-4">
                    <?php get_template_part( 'template-parts/archive-post/content', get_post_format() ); ?>
                </div>
            <?php endwhile; ?>
        </div></div>
        <?php 
        wp_reset_postdata();
    else :
        echo 'No posts found';
    endif;

    die();
}

add_action( 'after_setup_theme', 'wpdocs_theme_setup' );
function wpdocs_theme_setup() {
    // add_image_size( 'blog-thumb', 400, 550, true ); // (cropped)
    // add_image_size( 'single-post-thumb', 1000, 650); 

   // Blog posts: 1200 x 630px
// Hero images (full screen images): 2880 x 1500px
// Landscape feature image: 900 x 1200px
// Portrait feature image: 1200 x 900
// Fullscreen slideshow: 2800 x 1500px
// Gallery images: 1500px x auto width

    // Add featured image sizes
    add_image_size( 'hero', 2880, 1500 ); 
    add_image_size( 'landscape-post-image', 1200, 900 ); 
    add_image_size( 'featured-small', 700, 460, true, true ); // width, height, crop
    add_image_size( 'featured-gallery',600, 400, true ); // width, height, crop
    // add_image_size( 'featured-small', 320, 147, true ); // width, height, crop

    // Add other useful image sizes for use through Add Media modal
    add_image_size( 'medium-width', 480 );
    add_image_size( 'medium-height', 9999, 480 );
    add_image_size( 'medium-something', 480, 480 );

    // Register the three useful image sizes for use in Add Media modal
    add_filter( 'image_size_names_choose', 'wpshout_custom_sizes' );
    function wpshout_custom_sizes( $sizes ) {
        return array_merge( $sizes, array(
            'medium-width' => __( 'Medium Width' ),
            'medium-height' => __( 'Medium Height' ),
            'medium-something' => __( 'Medium Something' ),
        ) );
    }
}

/**
 * Registers an editor stylesheet for the theme.
 */
function wpdocs_theme_add_editor_styles() {
    add_editor_style( 'style.css' );
}
add_action( 'admin_init', 'wpdocs_theme_add_editor_styles' );

?>