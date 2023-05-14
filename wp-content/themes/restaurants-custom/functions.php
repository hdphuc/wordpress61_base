<?php
// add function setup theme restaurant

/**
 * Theme customizer 
 */
require_once('inc/theme-customizer-option.php');

/**
 * Theme customizer 
 */
require_once('inc/theme-restapi-route.php');

require_once('inc/class-setting-time-order.php');

function restaurant_setup() {
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 1568, 9999 );
    register_nav_menus(
        array(
            'primary-menu' => esc_html__( 'Primary menu', 'restaurant' ),
            'footer-menu'  => esc_html__( 'Secondary menu', 'restaurant' ),
        )
    );

    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );

    // add scripts theme in folder assets
    add_action( 'wp_enqueue_scripts', 'restaurant_scripts' );

    // remove sidebar in woocommerce singer product
    remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
}
add_action( 'after_setup_theme', 'restaurant_setup' );


// add function scripts theme

function restaurant_scripts() {
    // wp_enqueue_style( 'restaurant-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );
    // wp_style_add_data( 'restaurant-style', 'rtl', 'replace' );

    wp_enqueue_style( 'restaurant-style', get_template_directory_uri() . '/assets/css/style.css', array(), wp_get_theme()->get( 'Version' ) );
}


// Custom main menu
// use walker class to add class to menu item

class Restaurant_Walker_Nav_Menu extends Walker_Nav_Menu
{
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        // check if has children add class dropdown
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes = array_merge($classes, ['nav-item']);
        if (in_array('menu-item-has-children', $classes)) {
            $classes = array_merge($classes, ['dropdown']);
        }
        if ( $depth > 0 ) {
            $classes = array_merge($classes, ['dropdown-item']);
        }
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = ' class="' . esc_attr($class_names) . '"';
        $output .= '<li id="menu-item-' . $item->ID . '"' . $class_names . '>';
        $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
        $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
        $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';
        $item_output = $args->before;
        $linkClass =  !empty($args->link_class) ? $args->link_class : 'nav-link';
        if ( in_array('menu-item-has-children', $classes) ) {
            $linkClass .= ' dropdown-toggle';
            $attributes .= ' id="dropdown-submenu-' . $depth . '" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"';
        }
        $item_output .= '<a' . $attributes . ' class="' .  $linkClass . '" >';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

    function start_lvl(&$output, $depth = 0, $args = array())
    {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"sub-menu dropdown-menu\" aria-labelledby=\"dropdown-submenu-" . $depth . "\">\n";
    }

    function end_lvl(&$output, $depth = 0, $args = array())
    {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }

    function end_el(&$output, $item, $depth = 0, $args = array())
    {
        $output .= "</li>\n";
    }

}

add_action( 'wp_login_failed', 'custom_login_failed' );

function custom_login_failed( $username )
{
    $referrer = wp_get_referer();

    if ( $referrer && ! strstr($referrer, 'wp-login') && ! strstr($referrer,'wp-admin') )
    {
        wp_redirect( add_query_arg('login', 'failed', $referrer) );
        exit;
    }
}

add_filter( 'authenticate', 'custom_authenticate_username_password', 30, 3);
function custom_authenticate_username_password( $user, $username, $password )
{
    if ( is_a($user, 'WP_User') ) { return $user; }

    if ( empty($username) || empty($password) )
    {
        $error = new WP_Error();
        $user  = new WP_Error('authentication_failed', __('<strong>ERROR</strong>: Invalid username or incorrect password.'));

        return $error;
    }
}