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

function restaurant_setup()
{
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(1568, 9999);
    register_nav_menus(
        array(
            'primary-menu' => esc_html__('Primary menu', 'restaurant'),
            'footer-menu'  => esc_html__('Secondary menu', 'restaurant'),
        )
    );

    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');

    // add scripts theme in folder assets
    add_action('wp_enqueue_scripts', 'restaurant_scripts');

    // remove sidebar in woocommerce singer product
    remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
}
add_action('after_setup_theme', 'restaurant_setup');


// add function scripts theme

function restaurant_scripts()
{
    // wp_enqueue_style( 'restaurant-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );
    // wp_style_add_data( 'restaurant-style', 'rtl', 'replace' );

    wp_enqueue_style('restaurant-style', get_template_directory_uri() . '/assets/css/style.css', array(), wp_get_theme()->get('Version'));
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
        if ($depth > 0) {
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
        if (in_array('menu-item-has-children', $classes)) {
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

add_action('wp_login_failed', 'custom_login_failed');

function custom_login_failed($username)
{
    $referrer = wp_get_referer();

    if ($referrer && !strstr($referrer, 'wp-login') && !strstr($referrer, 'wp-admin')) {
        wp_redirect(add_query_arg('login', 'failed', $referrer));
        exit;
    }
}

add_filter('authenticate', 'custom_authenticate_username_password', 30, 3);
function custom_authenticate_username_password($user, $username, $password)
{
    if (is_a($user, 'WP_User')) {
        return $user;
    }

    if (empty($username) || empty($password)) {
        $error = new WP_Error();
        $user  = new WP_Error('authentication_failed', __('<strong>ERROR</strong>: Invalid username or incorrect password.', 'restaurant'));

        return $error;
    }
}

/**
 * Ajax load product by category
 */

add_action('wp_ajax_nopriv_get_products_by_cat', 'prefix_load_products_by_category');
add_action('wp_ajax_get_products_by_cat', 'prefix_load_products_by_category');

function prefix_load_products_by_category()
{
    $cat_id = $_POST['cat'];
    ob_start();
    get_product_by_cats($cat_id);
    wp_reset_postdata();

    $response = ob_get_clean();
    ob_end_clean();
            
    echo $response;
    die();
}


function get_product_by_cats($cat_id, $per_page = null) {

    $args = array(
        'post_type' => 'product',
        'post_status' => 'publish',
        'tax_query' => array(
            array(
                'taxonomy' => 'product_cat',
                'field'    => 'term_id',
                'terms'     =>  [$cat_id],
                'operator'  => 'IN'
            )
            ),
        'order' => 'name',
        'order_by' => 'ASC',
    );

    if ($per_page !== null) {
        $args['posts_per_page'] = $per_page;
    }

    $products = new WP_Query($args);
     ?>

    <div class="section-products-list woocommerce">
        <?php if ($products->have_posts()) : ?>
            <ul class="products columns-4">
                <?php while ($products->have_posts()) : $products->the_post();
                    global $product;
                ?>
                    <li <?php wc_product_class('', $product); ?>>
                        <?php
                        /**
                         * Hook: woocommerce_before_shop_loop_item.
                         *
                         * @hooked woocommerce_template_loop_product_link_open - 10
                         */
                        do_action('woocommerce_before_shop_loop_item');

                        /**
                         * Hook: woocommerce_before_shop_loop_item_title.
                         *
                         * @hooked woocommerce_show_product_loop_sale_flash - 10
                         * @hooked woocommerce_template_loop_product_thumbnail - 10
                         */
                        do_action('woocommerce_before_shop_loop_item_title');

                        /**
                         * Hook: woocommerce_shop_loop_item_title.
                         *
                         * @hooked woocommerce_template_loop_product_title - 10
                         */
                        do_action('woocommerce_shop_loop_item_title');

                        /**
                         * Hook: woocommerce_after_shop_loop_item_title.
                         *
                         * @hooked woocommerce_template_loop_rating - 5
                         * @hooked woocommerce_template_loop_price - 10
                         */
                        do_action('woocommerce_after_shop_loop_item_title');

                        /**
                         * Hook: woocommerce_after_shop_loop_item.
                         *
                         * @hooked woocommerce_template_loop_product_link_close - 5
                         * @hooked woocommerce_template_loop_add_to_cart - 10
                         */
                        do_action('woocommerce_after_shop_loop_item');
                        ?>
                    </li>
                <?php endwhile; ?>
            </ul>
        <?php else : ?>
            <?php echo __('No products found', 'restaurant'); ?>
        <?php endif; ?>
        <?php wp_reset_query(); ?>
        <?php wp_reset_postdata(); ?>
    </div>
    <?php
}