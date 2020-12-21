<article id="post-<?php the_ID(); ?>" <?php post_class('w-100 front-page-post'); ?>>
	<header class="entry-header">
		<?php if ( has_post_thumbnail() ) : ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
				<?php the_post_thumbnail('featured-small', ['class' => 'img-fluid', 'title' => 'Feature image']); ?>
			</a>
		<?php endif; ?>
		<div class="category-and-comments">
			<div>
				<?php the_category() ?>
			</div>
		</div>
			<?php if ( has_post_thumbnail() ) : ?>
		<?php
		the_title( sprintf( '<h4 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' );
		?>
		<?php else : ?>
		<?php
		the_title( sprintf( '<h4 class="entry-title no-image"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' );
		?>
	<?php endif ?>
	</header>
</article>
