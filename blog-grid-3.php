<?php 
/**
* Template Name: Blog grid 3
* Template Post Type: page
* @package WordPress
* @subpackage personal-blog
* @since personal-blog 1.0
*/

get_header(); ?>
<div class="container">
<div class="row">
<div class="col-sm-12 blog-grid-3">
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
if($post_query->have_posts() ) {
  while($post_query->have_posts() ) {
    $post_query->the_post();
    ?>
    <div class="col-4"><?php get_template_part( 'template-parts/archive-post/content', get_post_format() ); ?></div>
    <?php
  }
}
?>
	</div>

	
	<h2><?php the_posts_pagination(); ?></h2>
</div><!-- /.blog-main -->
<!-- <?php get_sidebar(); ?> -->
</div> <!-- / .row -->
</div> <!-- / .container -->
<?php get_footer(); ?>

