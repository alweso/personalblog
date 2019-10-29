<?php get_header(); ?>
<div class="col-sm-8 blog-main">
				<header class="page-header">
			<?php
			the_archive_title( '<h1 class="page-title">', '</h1>' );
			?>
		</header><!-- .page-header -->
	<?php if ( have_posts() ) : ?>
	<div class="row">


		<?php
// Start the Loop.
		while ( have_posts() ) :
			the_post();
			?>
					<div class="col-xs-12 col-sm-4">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
		<?php if ( has_post_thumbnail() ) : ?>
		    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
		        <?php the_post_thumbnail('post-thumbnail', ['class' => 'img-fluid', 'title' => 'Feature image']); ?>
		    </a>
		<?php endif; ?>
		<?php
					if ( is_sticky() && is_home() && ! is_paged() ) {
						printf( '<span class="sticky-post">%s</span>', _x( 'Featured', 'post', 'twentynineteen' ) );
					}
					the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
					?>
				</header><!-- .entry-header -->

				<div class="entry-content">
					<?php the_excerpt(); ?>
				</div><!-- .entry-content -->
			</article><!-- #post-<?php the_ID(); ?> -->
		</div>
			<?php
// End the loop.
		endwhile;
		?>
	</div>
		<?php

// // Previous/next page navigation.
// twentynineteen_the_posts_navigation();

	else :
// If no content, include the "No posts found" template.
	endif;
	?>
	<div class="nav-previous alignleft"><?php previous_posts_link( 'Older posts' ); ?></div>
<div class="nav-next alignright"><?php next_posts_link( 'Newer posts' ); ?></div>
</div><!-- /.blog-main -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
