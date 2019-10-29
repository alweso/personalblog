<?php
/**
 *
 */
?>

<?php get_header(); ?>
    <div class="col-sm-8 blog-main">
main page
      <?php
      if ( have_posts() ) : while ( have_posts() ) : the_post();
        get_template_part( 'content', get_post_format() );
      endwhile; endif;
      ?>

    </div> <!-- /.blog-main -->

    <?php get_sidebar(); ?>
<?php get_footer(); ?>