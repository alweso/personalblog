<?php get_header(); ?>
<div class="container">
<div class="row">
    <div class="col-sm-8">

  <!--     <?php
      the_content();
      ?> -->

      <?php

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				the_content();

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}

			endwhile; // End of the loop.
			?>

    </div> <!-- /.blog-main -->

    <?php get_sidebar(); ?>
    </div> <!-- / .row -->
</div> <!-- / .container -->
<?php get_footer(); ?>