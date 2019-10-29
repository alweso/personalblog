<?php get_header(); ?>
<div class="col-sm-8 blog-main">
 <?php 
 if ( have_posts() ) { 
 while ( have_posts() ) : the_post();
 ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if ( has_post_thumbnail() ) : ?>
		    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
		        <?php the_post_thumbnail('post-thumbnail', ['class' => 'img-fluid', 'title' => 'Feature image']); ?>
		    </a>
		<?php endif; ?>
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
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