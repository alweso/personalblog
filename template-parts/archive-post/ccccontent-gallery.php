<?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="background: url('<?php echo $backgroundImg[0]; ?>');height:100%;position:relative;background-size:cover;
  ">
	<header class="entry-header" >


		<div class="category-and-comments">
			<div>
				<?php the_category() ?>
			</div>
		</div>
	</header><!-- .entry-header -->

	<div class="entry-content" style="position: absolute;bottom: 0;background: #58a89dde;margin: 0;padding: 15px;">
    <i class="fas fa-images" style="color:white;font-size:20px;position:absolute;right:15px;top:10px;"></i>
				<?php
		the_title( sprintf( '<h4 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' );
		?>
		<div class="excerpt" style="margin-bottom:20px">
					<?php echo excerpt(30); ?>
		</div>
		<?php get_template_part( 'template-parts/archive-post/author-comments-date', 'none' ); ?>

	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
