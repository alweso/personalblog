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
				$custom_query_args = array(
					'post_type' => 'post',
					'posts_per_page' => 10,
					'post_status' => 'publish',
					'ignore_sticky_posts' => true,
					//'category_name' => 'custom-cat',
					'order' => 'DESC', // 'ASC'
					'orderby' => 'date' // modified | title | name | ID | rand
				);
				$custom_query = new WP_Query( $custom_query_args );
				?>

				<?php if ( $custom_query->have_posts() ) : ?>
					<div class="row">
						<?php while( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
							<div class="col-3">
								<?php get_template_part( 'template-parts/archive-post/content', get_post_format() ); ?>
							</div>
							<?php
						endwhile; ?>
					</div>
					<?php wp_reset_postdata(); // reset the query
				else:
					echo '<p>'.__('Sorry, no posts matched your criteria.').'</p>';
				endif; ?>


			</div>
			<h2><?php the_posts_pagination(); ?></h2>
		</div><!-- /.blog-main -->
		<?php get_sidebar(); ?>
	</div> <!-- / .row -->
</div> <!-- / .container -->
<?php get_footer(); ?>
