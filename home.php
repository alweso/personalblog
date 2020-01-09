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
		<form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="filter" style="margin-bottom: 25px">
	<?php
		if( $terms = get_terms( array( 'taxonomy' => 'category', 'orderby' => 'name' ) ) ) : 
 
			echo '<select name="categoryfilter"><option value="" style="margin-right: 20px">Select category...</option>';
			foreach ( $terms as $term ) :
				echo '<option value="' . $term->term_id . '">' . $term->name . '</option>'; // ID of the category as the value of an option
			endforeach;
			echo '</select>';
		endif;
	?>
<!-- 	<label style="margin-right: 20px">
		<input type="radio" name="date" value="ASC"/> Date: Ascending
	</label>
	<label style="margin-right: 20px">
		<input type="radio" name="date" value="DESC" selected="selected" /> Date: Descending
	</label>
	<label style="margin-right: 20px">
		<input type="checkbox" name="featured_image" /> Only posts with featured images
	</label> -->
	<button>Apply filter</button>
	<input type="hidden" name="action" value="myfilter">
</form>
<div id="response"></div>
	</header><!-- .page-header -->
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
<!-- 	<h2><?php the_posts_pagination(); ?>dsfdasfdsafdsafsa</h2>  -->

	<?php
global $wp_query; // you can remove this line if everything works for you
 
// don't display the button if there are not enough posts
if (  $wp_query->max_num_pages > 1 )
	echo '<div class="misha_loadmore">More posts</div>'; // you can use <a> as well
?>

</div><!-- /.blog-main -->
<!-- <?php get_sidebar(); ?> -->
</div> <!-- / .row -->
</div> <!-- / .container -->
<?php get_footer(); ?>
