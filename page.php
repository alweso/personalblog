<?php
/**
* Template Name: page template
*/

?>
<?php get_header(); ?>
<div class="">
<?php
	function wcr_category_fields($term) {
    // we check the name of the action because we need to have different output
    // if you have other taxonomy name, replace category with the name of your taxonomy. ex: book_add_form_fields, book_edit_form_fields
    if (current_filter() == 'category_edit_form_fields') {
        $short_description = get_term_meta($term->term_id, 'short_description', true);
        $color_code = get_term_meta($term->term_id, 'color_code', true);
        ?>
        <tr class="form-field">
            <th valign="top" scope="row"><label for="term_fields[short_description]"><?php _e('Short description'); ?></label></th>
            <td>
                <textarea class="large-text" cols="50" rows="5" id="term_fields[short_description]" name="term_fields[short_description]"><?php echo esc_textarea($short_description); ?></textarea><br/>
                <span class="description"><?php _e('Please enter short description'); ?></span>
            </td>
        </tr>
        <tr class="form-field">
            <th valign="top" scope="row"><label for="term_fields[color_code]"><?php _e('Color code'); ?></label></th>
            <td>
                <input type="text" size="40" value="<?php echo esc_attr($color_code); ?>" id="term_fields[color_code]" name="term_fields[color_code]"><br/>
                <span class="description"><?php _e('Please enter color hex code'); ?></span>
            </td>
        </tr>   
	<?php } elseif (current_filter() == 'category_add_form_fields') {
        ?>
        <div class="form-field">
            <label for="term_fields[short_description]"><?php _e('Short description'); ?></label>
            <textarea cols="40" rows="5" id="term_fields[short_description]" name="term_fields[short_description]"></textarea>
            <p class="description"><?php _e('Please enter short description'); ?></p>
        </div>
        <div class="form-field">
            <label for="term_fields[color_code]"><?php _e('Color code'); ?></label>
            <input type="text" size="40" value="" id="term_fields[color_code]" name="term_fields[color_code]">
            <p class="description"><?php _e('Please enter color hex code'); ?></p>
        </div>  
    <?php
    }
}

// Add the fields, using our callback function  
// if you have other taxonomy name, replace category with the name of your taxonomy. ex: book_add_form_fields, book_edit_form_fields
add_action('category_add_form_fields', 'wcr_category_fields', 10, 2);
add_action('category_edit_form_fields', 'wcr_category_fields', 10, 2); ?>



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