<?php 
/**
* Template Name: Blog - background posts
* Template Post Type: page
* @package WordPress
* @subpackage pascarubuddy
* @since pascarubuddy 1.0
*/

get_header(); ?>
<div class="container">
<div class="row">
<div class="col-sm-12 blog-main">
	<header class="page-header">
		<?php
		the_archive_title( '<h1 class="page-title mt-4 mb-4">', '</h1>' );
		?> home.php
	</header><!-- .page-header -->
	
<!-- 	<h2><?php the_posts_pagination(); ?>dsfdasfdsafdsafsa</h2>  -->
	<?php if ( have_posts() ) : ?>
		<div class="row allposts row-eq-height">
			<?php
			while ( have_posts() ) :
				the_post();
				?>
				<div class="col-xs-12 col-sm-4">
					<?php get_template_part( 'template-parts/archive-post/content', get_post_format() ); ?>
				</div>
				<?php
// End the loop.
			endwhile;
			?>
		</div>
		<?php
	else :
		get_template_part( 'template-parts/archive-post/content', 'none' ); 
	endif;
	?>
	<?php
if (  $wp_query->max_num_pages > 1 ) :
	echo '<div id="misha_loadmore">More posts</div>'; // you can use <a> as well
endif;?>

</div><!-- /.blog-main -->
<!-- <?php get_sidebar(); ?> -->
</div> <!-- / .row -->
</div> <!-- / .container -->
<?php get_footer(); ?>
