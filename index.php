<?php
/**
* Template Name: Index Page
* Template Post Type: page
* @package WordPress
* @subpackage personal-blog
* @since personal-blog 1.0
*/

get_header(); ?>
<div class="container">
	<div class="row">
		<div class="col-sm-8">
			<header class="page-header">
				<?php the_archive_title( '<h1 class="page-title mt-4 mb-4">', '</h1>' ); ?>
				<h5>
					<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
				</h5>
			</header><!-- .page-header -->
			<div class="row">
				<?php
				$args = array(
					'post_type' => 'post'
				);
				$post_query = new WP_Query($args);
				?>

				<div class="row">
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
			</div>
			<h2><?php the_posts_pagination(); ?></h2>
		</div><!-- /.blog-main -->
		<?php get_sidebar(); ?>
	</div> <!-- / .row -->
</div> <!-- / .container -->
<?php get_footer(); ?>
