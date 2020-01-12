<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
 

comment_form(); ?>

<?php
if (have_comments()) : ?>
    <ol class="post-comments">
        <?php
            wp_list_comments(array(
                'style'       => 'ol',
                'short_ping'  => true,
            ));
        ?>
    </ol>
    
 <?php the_comments_pagination() ?>

<?php
endif;


 ?>
<?php if (is_singular() && comments_open() && (get_option('thread_comments') == 1)) {
    wp_enqueue_script('comment-reply', 'wp-includes/js/comment-reply', array(), false, true);
} ?>