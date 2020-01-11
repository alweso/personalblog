<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<?php wp_head(); ?>
<script src="https://kit.fontawesome.com/eb33fc95bf.js" crossorigin="anonymous"></script>
</head>

<body <?php body_class(); ?>>
    <div class="main-header">
        <div>
        <!--  -->



            <nav class="navbar navbar-expand-lg">
  <a class="navbar-brand" href="#">
      <?php the_custom_logo() ?>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
 <?php
                    wp_nav_menu( array(
                        'theme_location'    => 'primary',
                        'depth'             => 2,
                        'container'         => 'div',
                        'container_class'   => 'collapse navbar-collapse',
                        'container_id'      => 'navbarSupportedContent',
                        'menu_class'        => 'navbar-nav mr-auto',
                        'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                        'walker'            => new WP_Bootstrap_Navwalker()
                    ) );
                    ?>

                   <!--  <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form> -->

    <?php get_search_form(true) ?>
    <div>
        <button>Register</button>
        <button>Log in</button>
    </div>
</nav>




        </div>
    </div>
    <div class="category-menu" style="background: grey">
      <?php
 wp_nav_menu( array(
                        'theme_location'    => 'secondary',
                        'depth'             => 2,
                        'container'         => 'div',
                        'container_class'   => 'category-menu',
                        'container_id'      => 'navbarSupportedContent',
                        'menu_class'        => 'navbar-nav mr-auto',
                        'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                        'walker'            => new WP_Bootstrap_Navwalker()
                    ) );
    ?>
    </div>


<!-- <div class="container">
<div class="row"> -->