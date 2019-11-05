<?php get_header(); ?>
<div class="col-sm-8 blog-main">
 <?php 
 if ( have_posts() ) { 
 while ( have_posts() ) : the_post();
 ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<h1> this is the date <?php the_date( 'l F j, Y' ); ?> </h1>
		<h1> this is the author <?php the_author(); ?> </h1>

		<p class="author-description">
		<?php the_author_meta( 'description' ); ?>
		<a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
			View more posts of this author
		</a>
	</p><!-- .author-description -->


		<?php echo get_avatar( get_the_author_meta( 'ID' )); ?>

		<?php if ( has_post_thumbnail() ) : ?>
		    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
		        <?php the_post_thumbnail('post-thumbnail', ['class' => 'img-fluid', 'title' => 'Feature image']); ?>
		    </a>
		<?php endif; ?>
	</header>

	<div class="entry-content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentynineteen' ),
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
				'before' => '<div class="page-links">' . __( 'Pages:', 'twentynineteen' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->
<?php
	if (comments_open()){
    comments_template();
} ?>


</article><!-- #post-<?php the_ID(); ?> -->

 <?php
 endwhile;
 } 
 ?>
<?php posts_nav_link(); ?>
</div><!-- /.blog-main -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>