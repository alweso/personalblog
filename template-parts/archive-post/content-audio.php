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
			<?php get_template_part( 'template-parts/archive-post/author-comments-date', 'none' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php echo excerpt(15); ?>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->