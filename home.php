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
		<form id="misha_filters" action="#">
	<label for="misha_number_of_results">Per page</label>
	<select name="misha_number_of_results" id="misha_number_of_results">
		<option><?php echo get_option( 'posts_per_page' ) ?></option><!-- it is from Settings > Reading -->
		<option>5</option>
		<option>10</option>
		<option value="-1">All</option>
	</select>
 
	<label for="misha_order_by">Order</label>
	<select name="misha_order_by" id="misha_order_by">
		<option value="date-DESC">Date ↓</option><!-- I will explode these values by "-" symbol later -->
		<option value="date-ASC">Date ↑</option>
		<option value="comment_count-DESC">Comments ↓</option>
		<option value="comment_count-ASC">Comments ↑</option>
	</select>
 
	<!-- required hidden field for admin-ajax.php -->
	<input type="hidden" name="action" value="mishafilter" />
</form>
<div id="response"></div>
	</header><!-- .page-header -->
	<?php if ( have_posts() ) : ?>
		<div id="initial-posts" class="row allposts row-eq-height">
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
<!-- 	<h2><?php the_posts_pagination(); ?>dsfdasfdsafdsafsa</h2>  -->
<div id="misha_posts_wrap" class="row">
	<!-- Posts will be here -->
</div>
	<?php
if (  $wp_query->max_num_pages > 1 ) :
	echo '<div id="misha_loadmore">More posts</div>'; // you can use <a> as well
endif;?>

</div><!-- /.blog-main -->
<!-- <?php get_sidebar(); ?> -->
</div> <!-- / .row -->
</div> <!-- / .container -->
<?php get_footer(); ?>
