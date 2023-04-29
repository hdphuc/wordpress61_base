<?
/**
 * Home page template
 */
get_header();
?>

<div class="home-container">
    <div class="home-content">
        <section class="home-slider">
            <?php echo do_shortcode('[smartslider3 slider=2]'); ?>
        </section> 
        <section class="home-banner home-full-banner">
            <div class="home-banner-wrap">
                <a href="<?php echo get_theme_mod('home_banner_link_1') ?>">
                    <img src="<?php echo get_theme_mod('home_banner_img_1') ?>" alt="banner 1">
                </a>
            </div>
        </section>
        <section class="home-products home-block">
            <div class="container">
                <div class="section-block-header">
                    <h2 class="h2">Products best saler</h2>
                    <p class="desc">
                        This my websiete about food
                    </p>
                </div>
                <?php 
                    $args = array(
                        'post_type' => 'product',
                        'posts_per_page' => 3,
                        'orderby' => 'date',
                        'order' => 'DESC'
                    );
                    $loop = new WP_Query( $args ); ?>

                <div class="section-products-list woocommerce">
                    <?php if ( $loop->have_posts() ) : ?>
                        <ul class="products columns-4">
                            <?php while ( $loop->have_posts() ) : $loop->the_post(); global $product;
                            ?>
                            <li <?php wc_product_class( '', $product ); ?>>
                                <?php
                                /**
                                 * Hook: woocommerce_before_shop_loop_item.
                                 *
                                 * @hooked woocommerce_template_loop_product_link_open - 10
                                 */
                                do_action( 'woocommerce_before_shop_loop_item' );

                                /**
                                 * Hook: woocommerce_before_shop_loop_item_title.
                                 *
                                 * @hooked woocommerce_show_product_loop_sale_flash - 10
                                 * @hooked woocommerce_template_loop_product_thumbnail - 10
                                 */
                                do_action( 'woocommerce_before_shop_loop_item_title' );

                                /**
                                 * Hook: woocommerce_shop_loop_item_title.
                                 *
                                 * @hooked woocommerce_template_loop_product_title - 10
                                 */
                                do_action( 'woocommerce_shop_loop_item_title' );

                                /**
                                 * Hook: woocommerce_after_shop_loop_item_title.
                                 *
                                 * @hooked woocommerce_template_loop_rating - 5
                                 * @hooked woocommerce_template_loop_price - 10
                                 */
                                do_action( 'woocommerce_after_shop_loop_item_title' );

                                /**
                                 * Hook: woocommerce_after_shop_loop_item.
                                 *
                                 * @hooked woocommerce_template_loop_product_link_close - 5
                                 * @hooked woocommerce_template_loop_add_to_cart - 10
                                 */
                                do_action( 'woocommerce_after_shop_loop_item' );
                                ?>
                            </li>
                            <?php endwhile; ?>
                        </ul>
                    <?php else: ?>
                    <?php    echo __( 'No products found' ); ?>
                    <?php  endif; ?>
                    <?php wp_reset_query(); ?>
                    <?php wp_reset_postdata(); ?>
                </div>
            </div>
        </section>    
        <!-- <section class="home-about home-block">
            <div class="container">
                <div class="section-block-header">
                    <h2 class="h2">About</h2>
                    <p class="desc">
                        This my websiete about food
                    </p>
                </div>
            </div>
        </section> -->
        <section class="home-banner home-full-banner">
            <div class="home-banner-wrap">
                <a href="#">
                    <img src="http://wordpressbase.com.vn/wp-content/uploads/2023/04/image_2023_04_24T15_28_16_448Z.png" alt="banner">
                </a>
            </div>
        </section>
        <section class="home-products home-block">
            <div class="container">
                <div class="section-block-header">
                    <h2 class="h2">Products</h2>
                    <p class="desc">
                        This my websiete about food
                    </p>
                </div>
                <?php 
                    $args = array(
                        'post_type' => 'product',
                        'posts_per_page' => 20,
                        'orderby' => 'date',
                        'order' => 'DESC'
                    );
                    $products2 = new WP_Query( $args ); ?>

                <div class="section-products-list woocommerce">
                    <?php if ( $products2->have_posts() ) : ?>
                        <ul class="products columns-<?php echo esc_attr( wc_get_loop_prop( 'columns' ) ); ?>">
                            <?php while ( $products2->have_posts() ) : $products2->the_post(); global $product;
                            ?>
                            <li <?php wc_product_class( '', $product ); ?>>
                                <?php
                                /**
                                 * Hook: woocommerce_before_shop_loop_item.
                                 *
                                 * @hooked woocommerce_template_loop_product_link_open - 10
                                 */
                                do_action( 'woocommerce_before_shop_loop_item' );

                                /**
                                 * Hook: woocommerce_before_shop_loop_item_title.
                                 *
                                 * @hooked woocommerce_show_product_loop_sale_flash - 10
                                 * @hooked woocommerce_template_loop_product_thumbnail - 10
                                 */
                                do_action( 'woocommerce_before_shop_loop_item_title' );

                                /**
                                 * Hook: woocommerce_shop_loop_item_title.
                                 *
                                 * @hooked woocommerce_template_loop_product_title - 10
                                 */
                                do_action( 'woocommerce_shop_loop_item_title' );

                                /**
                                 * Hook: woocommerce_after_shop_loop_item_title.
                                 *
                                 * @hooked woocommerce_template_loop_rating - 5
                                 * @hooked woocommerce_template_loop_price - 10
                                 */
                                do_action( 'woocommerce_after_shop_loop_item_title' );

                                /**
                                 * Hook: woocommerce_after_shop_loop_item.
                                 *
                                 * @hooked woocommerce_template_loop_product_link_close - 5
                                 * @hooked woocommerce_template_loop_add_to_cart - 10
                                 */
                                do_action( 'woocommerce_after_shop_loop_item' );
                                ?>
                            </li>
                            <?php endwhile; ?>
                        </ul>
                    <?php else: ?>
                    <?php    echo __( 'No products found' ); ?>
                    <?php  endif; ?>
                    <?php wp_reset_query(); ?>
                    <?php wp_reset_postdata(); ?>
                </div>
            </div>
        </section>    
    </div>
</div>

<?php
get_footer();
?>