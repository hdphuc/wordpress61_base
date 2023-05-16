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
                    <div class="header-button-action">
                        <?php if (!is_user_logged_in()): ?>
                            <?php if (get_theme_mod('show_btn_sign_in')): ?>
                            <div class="btn-sing-in">
                                <?php if ( !is_account_page() ): ?>
                                <button type="button" class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#sign-in" data-bs-whatever="@mdo">
                                    <?php echo get_theme_mod('title_btn_sign_in'); ?>
                                </button>
                                <?php else: ?>
                                    <a class="btn btn-sm" href="<?php echo get_permalink(wc_get_page_id('myaccount')); ?>">
                                        <?php echo get_theme_mod('title_btn_sign_in'); ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                            <?php endif; ?>
                            <?php if (get_theme_mod('show_btn_register')): ?>
                                |
                            <div class="btn-sing-in">
                                <!-- <button type="button" class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#register" data-bs-whatever="@mdo"> -->
                                    <a href="<?php echo get_theme_mod('url_register_page'); ?>" class="btn btn-sm">
                                        <?php echo get_theme_mod('title_btn_register'); ?>
                                    </a>
                                <!-- </button> -->
                            </div>
                            <?php endif; ?>
                        <?php else: 
                            $user = wp_get_current_user();
                            ?>
                            <div class="btn-sing-in auth-info me-2">
                                <a href="<?php echo get_permalink(wc_get_page_id('myaccount')); ?>">
                                    <?php echo $user->user_login; ?>
                                </a>
                            </div>
                            |
                            <div class="btn-sing-in auth-info ms-2 me-3">
                                <a href="<?php echo wp_logout_url() ; ?>">
                                    <?php echo __('Logout'); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                        <div class="header-order-menu">
                            <a href="<?php echo get_theme_mod('title_order_now_link') ?>">
                                <strong> <?php echo get_theme_mod('title_order_now') ?> </strong> <br>
                                <?php echo get_theme_mod('title_order_now_desc') ?>
                            </a>
                        </div>
                    </div>
                </div>
               
            </nav>
        </div>
    </header>
<?php
/**
 * Modals
 */
get_template_part('template-parts/login-modal');
get_template_part('template-parts/register-modal');