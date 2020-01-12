<?php
/**
* Template Name: Home page
*
* @package WordPress
* @subpackage pascarubuddy
* @since pascarubuddy 1.0
*/

get_header(); ?>
<!-- PARTICLE SYSTEM -->
<div class="page-bg"></div>

<div class="animation-wrapper">
  <div class="particle particle-1"></div>
  <div class="particle particle-2"></div>
  <div class="particle particle-3"></div>
  <div class="particle particle-4"></div>
</div>

<div class="page-wrapper"> 
  <h1>CSS Particles</h1>
</div>


<div class="container">
<div class="row">
    <div class="col-sm-8">

      <form>
  User name:<br>
  <input type="text" name="username"><br>
  User password:<br>
  <input type="password" name="psw">
</form>

<form action="/action_page.php">
  First name:<br>
  <input type="text" name="firstname" value="Mickey"><br>
  Last name:<br>
  <input type="text" name="lastname" value="Mouse"><br><br>
  <input type="submit" value="Submit">
</form>

<form action="/action_page.php">
  First name:<br>
  <input type="text" name="firstname" value="Mickey"><br>
  Last name:<br>
  <input type="text" name="lastname" value="Mouse"><br><br>
  <input type="submit" value="Submit">
  <input type="reset">
</form>


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
   </div> <!-- / .row -->
</div> <!-- / .container --> 
<?php get_footer(); ?>

