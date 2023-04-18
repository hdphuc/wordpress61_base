<?php

/**
 * Footer for the theme
 */
?>
<footer class="p-5">
    <hr class="footer-hr bg-primary mb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-12">
                <div class="footer-content">
                    <div class="footer-logo">
                        <a href="<?php echo esc_url(home_url('/')); ?>">
                            <img class="d-lock" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="logo">
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
                                'menu_class'     => 'footer-menu',
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
                            <a href="#" class="rounded border p-3">
                                <i class="fa fa-facebook-f"></i>
                            </a>
                        </li>
                        <li class="col">
                            <a href="#" class="rounded border p-3">
                                <i class="fa fa-twitter"></i>
                            </a>
                        </li>
                        <li class="col">
                            <a href="#" class="rounded border p-3">
                                <i class="fa fa-instagram"></i>
                            </a>
                        </li>
                        <li class="col">
                            <a href="#" class="rounded border p-3">
                                <i class="fa fa-youtube"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="<?php echo get_template_directory_uri(); ?>/assets/js/bootstrap.min.js"></script>
<!-- <script src="<?php echo get_template_directory_uri(); ?>/assets/js/fontawesome.min.js"></script> -->
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/main.js"></script>
<?php wp_footer(); ?>
</body>

</html>