<?php
/**
* Template Name: Just a  Page
* Template Post Type: page
* @package WordPress
* @subpackage personal-blog
* @since personal-blog 1.0
*/

get_header(); ?>
 <?php
  $categories = get_categories();
  foreach ($categories as $cat) {
        echo '<div class="category-color-box" style="height:0;width:0;overflow:hidden;opacity:0;">';
        // echo '<h1 class="acf-category-name">'.$cat->name.'</h1>';
        echo '<h1 class="acf-category-id">category-'.$cat->term_id.'</h1>';
        echo '<h1 class="acf-category-color">'.get_field('category_colors', $cat).'</h1>';
        //echo '<br />';

        echo '</div>';
    }
?>
<div class="">
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


</div> <!-- / .container -->
<?php get_footer(); ?>
