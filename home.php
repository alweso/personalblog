<?php get_header(); ?>
<div class="col-sm-12 blog-main">
	<header class="page-header">
		<?php
		the_archive_title( '<h1 class="page-title">', '</h1>' );
		?>
	</header><!-- .page-header -->
	<?php if ( have_posts() ) : ?>
		<div class="row">
			<?php
			while ( have_posts() ) :
				the_post();
				?>
				<div class="col-xs-12 col-sm-3">
					<?php get_template_part( 'template-parts/archive-post/content', get_post_format() ); ?>
				</div>
				<?php
// End the loop.
			endwhile;
			?>
		</div>
		<?php
	else :
		get_template_part( 'template-parts/archive-post/content', 'none' ); 
	endif;
	?>
	<div class="nav-previous alignleft"><?php previous_posts_link( 'Older posts' ); ?></div>
	<div class="nav-next alignright"><?php next_posts_link( 'Newer posts' ); ?></div>
</div><!-- /.blog-main -->
<!-- <?php get_sidebar(); ?> -->
</div> <!-- / .row -->
</div> <!-- / .container -->
<?php get_footer(); ?>