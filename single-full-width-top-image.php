<?php
/**
* Template Name: Full width top image
* Template Post Type: post
* @package WordPress
* @subpackage personal-blog
* @since personal-blog 1.0
*/
?>

<?php
get_header();
if ( have_posts() ) {
	while ( have_posts() ) : the_post();
		?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>
			<div class="header-wrap" style="background: url('<?php echo esc_url($backgroundImg[0]); ?>');height:60vh;position:relative;">
				<div class="dark-background" style="text-align: left;position:relative;">
					<div  style="
					text-align: center;">

						</div>
														<header class="entry-header" style="    color: white;width:100%;
    position: absolute;
    bottom: 0;
    left: 0;">
    	<div class="container">
    		<div class="row">
    			<div class="col-sm-8 offset-sm-2">

					<div class="author-and-date author-and-date--on-transparent">
						<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" class="author-avatar">
							<?php echo get_avatar( get_the_author_meta( 'ID' ), 40); ?>
						</a>
						<span>						<span>by <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php the_author(); ?></a></span>
						<span>on <?php the_date( 'F j, Y' ); ?></span></span>
					</div>
    				<h1 class="entry-title"><?php the_title(); ?></h1>
    			</div>
    		</div>
    	</div>

						</header>
				</div>
			</div>

			<div class="container post-container">
				<div class="row">
					<div class="col-sm-8 offset-sm-2 blog-main">
						<div class="article-wrap">
						<div class="entry-content">
							   																		<div class="categories ">
								<?php the_category() ?>
							</div>
							<?php
							the_content(
								sprintf(
									wp_kses(
										/* translators: %s: Name of current post. Only visible to screen readers */
										__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'personal-blog' ),
										array(
											'span' => array(
												'class' => array(),
											),
										)
									),
									get_the_title()
								)
							);

							wp_link_pages(
								array(
									'before' => '<div class="page-links">' . __( 'Pages:', 'personal-blog' ),
									'after'  => '</div>',
								)
							);
							?>
						</div><!-- .entry-content -->
						<?php
						if (comments_open()){
							comments_template();
						} ?>
						</div>



					</article><!-- #post-<?php the_ID(); ?> -->

					<?php
				endwhile;
			}
			?>
			<?php posts_nav_link(); ?>
		</div><!-- /.blog-main -->
		<!-- <?php get_sidebar(); ?> -->
	</div> <!-- / .row -->
</div> <!-- / .container -->
<?php get_footer(); ?>
