<?php get_header(); ?>
<div class="container post-container">
<div class="row">

	<?php 
	if ( have_posts() ) { 
		while ( have_posts() ) : the_post();
			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<div class="col-sm-8 offset-sm-2 blog-main">
				<header class="entry-header">
					<div class="categories">
						<?php the_category() ?>
					</div>
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
\
											<div class="author-and-date">
						<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" class="author-avatar">
							<?php echo get_avatar( get_the_author_meta( 'ID' ), 40); ?>
						</a>

						<span>by <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php the_author(); ?></a></span>
						<?php the_date( 'F j, Y' ); ?> 
						<span><?php the_category() ?></span>
					</div>

	<?php if ( has_post_thumbnail() ) : ?>
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="feature-image">
			<?php the_post_thumbnail('landscape-post-image', ['class' => 'img-fluid', 'title' => 'Feature image']); ?>
		</a>
	<?php endif; ?>

</header>
</div>
<div class="col-sm-8 offset-sm-2 blog-main">
<div class="entry-content">
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


</article><!-- #post-<?php the_ID(); ?> -->

<?php
endwhile;
} 
?>
<?php posts_nav_link(); ?>
</div><!-- /.blog-main -->
<?php get_sidebar(); ?> 
</div> <!-- / .row -->
</div> <!-- / .container -->
<?php get_footer(); ?>