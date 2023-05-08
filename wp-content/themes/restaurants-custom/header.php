<?php

/**
 * Header for the theme 
 * 
 */

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title() ?></title>
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/fontawesome.min.css">
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery-3.6.4.min.js"></script>
    <?php wp_head(); ?>
</head>
<body <?php body_class() ?>>
    <!-- Nav bar -->
    <header class="main-header navbar-expand-lg sticky-top bg-light" id="main-header">
        <div class="header-container">
            <nav class="navbar navbar-light navbar-expand-lg">
                <div class="container-fluid w-100">
                    <a class="navbar-brand" href="<?php echo home_url('/') ?>">
                    <img src="<?php echo get_theme_mod('logo_header') ?>" alt="" width="30" height="24" class="d-inline-block align-text-top">
                        <?php bloginfo('name'); ?>
                    </a>
                    <button class="navbar-toggler ms-auto me-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="ms-auto me-lg-auto me-1 collapse navbar-collapse w-auto flex-grow-0" id="navbarNav">
                        <?php
                        if (has_nav_menu('primary-menu')) {
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'primary-menu',
                                    'menu_id'        => 'main-menu',
                                    'menu_class'     => 'navbar-nav',
                                    'menu_id' => 'main-menu',
                                    'container'      => false,
                                    'walker'         => new Restaurant_Walker_Nav_Menu(),
                                )
                            );
                        }
                        ?>
                    </div>
                    <div class="header-order-menu">
                        <a href="<?php echo get_theme_mod('title_order_now_link') ?>">
                            <strong> <?php echo get_theme_mod('title_order_now') ?> </strong> <br>
                            <?php echo get_theme_mod('title_order_now_desc') ?>
                        </a>
                    </div>
                </div>
               
            </nav>
        </div>
    </header>