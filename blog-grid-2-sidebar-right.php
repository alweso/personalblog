<?php 
/**
* Template Name: Blog grid 2 sidebar right
* Template Post Type: page
* @package WordPress
* @subpackage personal-blog
* @since personal-blog 1.0
*/

get_header(); ?>
<div class="container">
<div class="row">
<div class="col-sm-8 blog-grid-3">
	<header class="page-header">
		<?php
		the_archive_title( '<h1 class="page-title mt-4 mb-4">', '</h1>' );
		?> 
		<h5><?php 
           if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); 
?></h5>
	</header><!-- .page-header -->
	<div class="row">
	<?php
    $args = array(
        'post_type' => 'post'
    );

    $post_query = new WP_Query($args);
// 
?>

<div id="misha_posts_wrap" class="row">
	<!-- Posts will be here -->
</div>
<?php
if (  $wp_query->max_num_pages > 1 ) :
	echo '<div class="loader-wrap"><div id="misha_loadmore" class="loader"></div></div>'; // you can use <a> as well
endif;?>
	</div>

	
	<h2><?php the_posts_pagination(); ?></h2>
</div><!-- /.blog-main -->
 <?php get_sidebar(); ?> 
</div> <!-- / .row -->
</div> <!-- / .container -->
<?php get_footer(); ?>

