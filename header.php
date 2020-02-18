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
                         <div class="container-fluid">
        <div class="row">
            <div class="col-12">
        <div>
        <!--  -->
            <nav class="navbar navbar-expand-lg">
  <a class="navbar-brand" href="#">
      <?php the_custom_logo() ?>
  </a>
  <div>
     <?php

                    wp_nav_menu( array( 'theme_location' => 'primary' ) ); 
                    ?>
  </div>


                   <!--  <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form> -->

</nav>






        </div>
    </div>
            </div>
        </div>
    </div>

    <div class="category-menu">
         <div class="container">
        <div class="row">
            <div class="col-12">
      </div></div></div>
    </div>


<!-- <div class="container">
<div class="row"> -->