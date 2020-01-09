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

add_action( 'wp_enqueue_scripts', 'misha_script_and_styles');
 
function misha_script_and_styles() {
    // absolutely need it, because we will get $wp_query->query_vars and $wp_query->max_num_pages from it.
    global $wp_query;
 
    // when you use wp_localize_script(), do not enqueue the target script immediately
    wp_register_script( 'misha_scripts', get_stylesheet_directory_uri() . '/js/script.js', array('jquery') );
 
    // passing parameters here
    // actually the <script> tag will be created and the object "misha_loadmore_params" will be inside it 
    wp_localize_script( 'misha_scripts', 'misha_loadmore_params', array(
        'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
        'posts' => json_encode( $wp_query->query_vars ), // everything about your loop is here
        'current_page' => $wp_query->query_vars['paged'] ? $wp_query->query_vars['paged'] : 1,
        'max_page' => $wp_query->max_num_pages
    ) );
 
    wp_enqueue_script( 'misha_scripts' );
}

add_action('wp_ajax_loadmorebutton', 'misha_loadmore_ajax_handler');
add_action('wp_ajax_nopriv_loadmorebutton', 'misha_loadmore_ajax_handler');
 
function misha_loadmore_ajax_handler(){
 
    // prepare our arguments for the query
    $params = json_decode( stripslashes( $_POST['query'] ), true ); // query_posts() takes care of the necessary sanitization 
    $params['paged'] = $_POST['page'] + 1; // we need next page to be loaded
    $params['post_status'] = 'publish';
 
    // it is always better to use WP_Query but not here
    query_posts( $params );
 
    if( have_posts() ) :
 
        // run the loop
        while( have_posts() ): the_post();
 
            // look into your theme code how the posts are inserted, but you can use your own HTML of course
            // do you remember? - my example is adapted for Twenty Seventeen theme?>
            <div class="col-xs-12 col-sm-4">
                    <?php get_template_part( 'template-parts/archive-post/content', get_post_format() ); ?>
                </div><?php
            // for the test purposes comment the line above and uncomment the below one
            // the_title();
 
 
        endwhile;
    endif;
    die; // here we exit the script and even no wp_reset_query() required!
}
 
 
 
add_action('wp_ajax_mishafilter', 'misha_filter_function'); 
add_action('wp_ajax_nopriv_mishafilter', 'misha_filter_function');
 
function misha_filter_function(){
 
    // example: date-ASC 
    $order = explode( '-', $_POST['misha_order_by'] );
 
    $params = array(
        'posts_per_page' => $_POST['misha_number_of_results'], // when set to -1, it shows all posts
        'orderby' => $order[0], // example: date
        'order' => $order[1] // example: ASC
    );
 
 
    query_posts( $params );
 
    global $wp_query;
 
    if( have_posts() ) :
 
        ob_start(); // start buffering because we do not need to print the posts now
 
        while( have_posts() ): the_post();
 
            // adapted for Twenty Seventeen theme?>
           <div class="col-xs-12 col-sm-4">
                    <?php get_template_part( 'template-parts/archive-post/content', get_post_format() ); ?>
                </div>
                <?php
 
        endwhile;
 
        $posts_html = ob_get_contents(); // we pass the posts to variable
        ob_end_clean(); // clear the buffer
    else:
        $posts_html = '<p>Nothing found for your criteria.</p>';
    endif;
 
    // no wp_reset_query() required
 
    echo json_encode( array(
        'posts' => json_encode( $wp_query->query_vars ),
        'max_page' => $wp_query->max_num_pages,
        'found_posts' => $wp_query->found_posts,
        'content' => $posts_html
    ) );
 
    die();
}

?>