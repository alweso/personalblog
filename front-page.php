<?php 
/**
* Template Name: Front Page
* Template Post Type: page
* @package WordPress
* @subpackage personal-blog
* @since personal-blog 1.0
*/

get_header(); ?>
<div class="container frontpage">
	<div class="row">
		<div class="col-sm-9 frontpage-latest">
			<div class="row">
				<?php
				$args = array(
					'post_type' => 'post',
					'posts_per_page' => 5
				);
				$count = 0;
				$post_query = new WP_Query($args);
				if($post_query->have_posts() ) {
					while($post_query->have_posts() ) {
						$count++;
						$post_query->the_post();


						if ($count === 1) { ?>
							<div class="col-8"><?php get_template_part( 'template-parts/archive-post/content', get_post_format() ); ?></div><?php
						} else {?>
							<div class="col-4"><?php get_template_part( 'template-parts/archive-post/content', get_post_format() ); ?></div><?php
						}
					}
				}
				?>

			</div>
		</div><!-- /.blog-main -->
		<?php get_sidebar(); ?> 
	</div> <!-- / .row -->
</div> <!-- / .container -->
<?php get_footer(); ?>

