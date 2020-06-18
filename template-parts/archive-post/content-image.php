<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if ( has_post_thumbnail() ) : ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
				<?php the_post_thumbnail('post-thumbnail', ['class' => 'img-fluid', 'title' => 'Feature image']); ?>
			</a>
		<?php endif; ?>
		<?php
		the_title( sprintf( '<h4 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' );
		?>
		<?php the_category() ?>
		<div class="author-and-date d-flex">
			<!-- <a href="#" class="author-avatar">
				<?php echo get_avatar( get_the_author_meta( 'ID' )); ?>
			</a> -->
			<div>
				<p>by <?php the_author(); ?></p>
				<?php the_date( 'F j, Y' ); ?> 
			</div>
		</div>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php echo excerpt(15); ?>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->