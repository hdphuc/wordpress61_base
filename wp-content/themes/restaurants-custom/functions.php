<?php
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 1568, 9999 );

register_nav_menus(
    array(
        'primary-menu' => esc_html__( 'Primary menu', 'twentytwentyone' ),
        'footer-menu'  => esc_html__( 'Secondary menu', 'twentytwentyone' ),
    )
);
