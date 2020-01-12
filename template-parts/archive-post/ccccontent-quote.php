<?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>
<article id="post-<?php the_ID(); ?>"
	<?php if ( has_post_thumbnail() ) : 
			post_class('format-quote--with-image position-relative');
		else :
			post_class('format-quote--no-image position-relative');
		endif ?>
		 style="<?php if ( has_post_thumbnail() ) : ?>background: url('<?php echo $backgroundImg[0]; ?>');<?php endif ?>">
	<header class="entry-header h-100" <?php if ( has_post_thumbnail() ) : ?> style="position: absolute;top: 0;left: 0;background: #58a89dde;" <?php endif ?> >
		<?php the_category() ?>
		<blockquote><?php echo excerpt(50); ?></blockquote>
		<?php get_template_part( 'template-parts/archive-post/author-comments-date', 'none' ); ?>
	</header><!-- .entry-header -->
</article><!-- #post-<?php the_ID(); ?> -->