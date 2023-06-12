<?php

/**
 * Footer for the theme
 */
?>
<footer class="p-lg-5 p-sm-3">
    <hr class="footer-hr bg-primary mb-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3 col-12">
                <div class="footer-content">
                    <div class="footer-logo">
                        <a href="<?php echo esc_url(home_url('/')); ?>">
                        <?php if (!empty(get_theme_mod('logo_footer'))): ?>
                            <img class="d-lock" src="<?php echo get_theme_mod('logo_footer'); ?>" alt="logo">
                        <?php else: ?>
                            <?php bloginfo('name'); ?>
                        <?php endif; ?>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="footer-menu">
                    <?php
                    if (has_nav_menu('footer-menu')) {
                        wp_nav_menu(
                            array(
                                'theme_location' => 'footer-menu',
                                'menu_id'        => 'footer-menu',
                                'menu_class'     => 'list-inline footer-menu',
                                'container'      => false,
                            )
                        );
                    }
                    ?>
                </div>
            </div>
            <div class="col-lg-3 col-12">
                <div class="footer-social">
                    <ul class="row list-inline">
                        <li class="col">
                            <a href="<?php echo get_theme_mod('facebook_link'); ?>" class="rounded border p-3">
                                <i class="fa fa-facebook-f"></i>
                            </a>
                        </li>
                        <li class="col">
                            <a href="<?php echo get_theme_mod('instagram_link'); ?>" class="rounded border p-3">
                                <i class="fa fa-instagram"></i>
                            </a>
                        </li>
                        <li class="col">
                            <a href="<?php echo get_theme_mod('tiktok_link'); ?>" class="rounded border p-3">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M448,209.91a210.06,210.06,0,0,1-122.77-39.25V349.38A162.55,162.55,0,1,1,185,188.31V278.2a74.62,74.62,0,1,0,52.23,71.18V0l88,0a121.18,121.18,0,0,0,1.86,22.17h0A122.18,122.18,0,0,0,381,102.39a121.43,121.43,0,0,0,67,20.14Z"/></svg>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="class-coppyright text-center">
            <p class="align-items-center d-flex flex-wrap justify-content-center fst-italic"> © 2023 Savourieatery <span class="p-2">|</span><small><a href="<?php echo get_the_permalink(pll_get_post(get_page_by_path( 'privacy-policy' )->ID));?>">Privacy Policy</a> </small></p>
        </div>
    </div>
</footer>

<script src="<?php echo get_template_directory_uri(); ?>/assets/js/bootstrap.min.js"></script>
<!-- <script src="<?php echo get_template_directory_uri(); ?>/assets/js/fontawesome.min.js"></script> -->
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/main.js"></script>
<?php wp_footer(); ?>
</body>

</html>