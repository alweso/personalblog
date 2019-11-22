<?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="background: url('<?php echo $backgroundImg[0]; ?>');height:100%;position:relative;background-size:cover;height: 490px;
    margin-bottom: 28px;">
	<header class="entry-header" >


		<div class="category-and-comments">
			<div>
				<?php the_category() ?>
			</div>
		</div>
	</header><!-- .entry-header -->

	<div class="entry-content" style="position: absolute;bottom: 0;background: #58a89dde;margin: 0;padding: 15px;
    padding-bottom: 0;">
    <i class="fas fa-images" style="color:white;font-size:20px;position:absolute;right:15px;top:10px;"></i>
				<?php
		the_title( sprintf( '<h4 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' );
		?>
		<div class="excerpt" style="margin-bottom:20px">
					<?php echo excerpt(30); ?>
		</div>
			<div class="author-and-date author-and-date--type2 d-flex justify-content-between" style="color: white">
		<div>
			<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" class="author-avatar">
				<?php echo get_avatar( get_the_author_meta( 'ID' ), 25); ?>
			</a>
			<span>by <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" style="color:white"><?php the_author(); ?></a></span>
		</div>

		<div>
			<i class="far fa-comments"></i> 
			<span><?php echo get_comments_number(); ?></span>
			<i class="far fa-clock"></i>
			<span><?php echo get_the_date( 'F j, Y' ); ?></span>
		</div>
	</div> 
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->