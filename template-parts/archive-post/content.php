<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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

	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php if ( has_post_thumbnail() ) : 
			echo excerpt(30); 
		else :
			echo excerpt(80); 
		endif ?>
	</div><!-- .entry-content -->
	<div class="author-and-date author-and-date--type2 d-flex justify-content-between">
		<div>
			<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" class="author-avatar">
				<?php echo get_avatar( get_the_author_meta( 'ID' ), 25); ?>
			</a>
			<span>by <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php the_author(); ?></a></span>
		</div>

		<div>
			<i class="far fa-comments"></i> 
			<span><?php echo get_comments_number(); ?></span>
			<i class="far fa-clock"></i>
			<span><?php echo get_the_date( 'F j, Y' ); ?></span>
		</div>
	</div> 
</article><!-- #post-<?php the_ID(); ?> -->