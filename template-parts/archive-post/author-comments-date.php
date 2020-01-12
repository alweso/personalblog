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