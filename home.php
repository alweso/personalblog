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
 
	<label for="misha_order_by">Order</label>
	<select name="misha_order_by" id="misha_order_by">
		<option value="date-DESC">Date ↓</option><!-- I will explode these values by "-" symbol later -->
		<option value="date-ASC">Date ↑</option>
		<option value="comment_count-DESC">Comments ↓</option>
		<option value="comment_count-ASC">Comments ↑</option>
	</select>
 
<?php
		if( $terms = get_terms( array( 'taxonomy' => 'category', 'orderby' => 'name' ) ) ) : 
 
			echo '<select name="categoryfilter"><option value="">Select category...</option>';
			foreach ( $terms as $term ) :
				echo '<option value="' . $term->term_id . '">' . $term->name . '</option>'; // ID of the category as the value of an option
			endforeach;
			echo '</select>';
		endif;
	?>
	<!-- required hidden field for admin-ajax.php -->
	<input type="hidden" name="action" value="mishafilter" />
</form>
<div id="response"></div>
	</header><!-- .page-header -->
	
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
