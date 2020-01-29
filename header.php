<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title><?php bloginfo('name'); ?></title>
        <meta name="description" content="<?php bloginfo('description'); ?>"> 
        <?php wp_head(  ); ?>

        <!-- Make space for fixed navbar on smaller screens when admin bar is visible (dev) -->
        <script>
            jQuery(document).ready(function($) {
                var height= $(".nojq").height();
                $(".main-navigation").css({top: height});
            });
        </script>
    </head>

    <body <?php body_class(); ?>>

        <header class="banner">
            <div class="container-med">
                <h1 class="title-tag text-center">
                    <a href="<?php echo esc_url(site_url( '/' )); ?>"><?php bloginfo('name'); ?></a>
                </h1>
            </div>
        </header>

        <div class="container-med">
            <nav id="site-navigation" class="main-navigation">
                <!-- Optional navbar brand (need to add styles for this) -->
                <!-- <a href="#" class="navbar-brand">Brand</a> -->
                <button class="menu-toggle" aria-controls="primary-menu"
                    aria-expanded="false"><span class="hamburger"></span></button>
                    <?php wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'container_class' => 'main-navigation__container'
                    )); ?>
            </div>
        </nav><!-- #site-navigation -->