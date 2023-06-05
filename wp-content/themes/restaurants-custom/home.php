<?php
/**
 * Home page template
 */
 get_header();
?>

<div class="home-container">
    <div class="home-content">
        <section class="home-slider">
            <?php echo do_shortcode(get_theme_mod('short_code_slider')); ?>
        </section> 
        <section class="home-banner home-full-banner">
            <div class="home-banner-wrap">
                <a href="<?php echo __(get_theme_mod('home_banner_link_1')) ?>">
                    <img src="<?php echo __(get_theme_mod('home_banner_img_1')) ?>" alt="banner 1">
                </a>
            </div>
        </section>
        <section class="home-products home-block">
            <div class="container">
                <div class="section-block-header">
                    <h2 class="h2"><?php echo __(get_theme_mod('title_block_product_best_sale')) ?></h2>
                    <p class="desc">
                        <?php echo __(get_theme_mod('description_block_product_best_sale')) ?>
                    </p>
                </div>
                <?php 
                    $args = array(
                        'post_type' => 'product',
                        'posts_per_page' => get_theme_mod('number_product_best_sale') ?? 0,
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
                <a href="<?php echo __(get_theme_mod('home_banner_link_2')) ?>">
                    <img src="<?php echo __(get_theme_mod('home_banner_img_2')) ?>" alt="banner">
                </a>
            </div>
        </section>
        <section class="home-products home-block">
            <div class="container">
                <div class="section-block-header">
                    <h2 class="h2"><?php echo __(get_theme_mod('title_block_product_list')) ?></h2>
                    <p class="desc">
                        <?php echo __(get_theme_mod('description_block_product_list')) ?>
                    </p>
                </div>
                <?php 
                    $args = array(
                        'post_type' => 'product',
                        'posts_per_page' => get_theme_mod('number_product_list') ?? 0,
                        'orderby' => 'date',
                        'order' => 'DESC'
                    );
                    if (get_theme_mod('product_list_ids')) {
                        $args['post_in'] = get_theme_mod('product_list_ids');
                    }
                    if (get_theme_mod('catgory_product_list')) {
                        $args['tax_query'] = array(
                            array(
                                'taxonomy' => 'product_cat',
                                'field' => 'term_id',
                                'terms' => get_theme_mod('catgory_product_list')
                            )
                        );
                    }
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
        <section class="home-aboutus home-block">
            <div class="container">
                <div class="section-block-header">
                    <h2 class="h2"><?php echo __(get_theme_mod('title_home_about_us'), 'restaurant'); ?></h2>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <h3 class="h3"><?php echo __(get_theme_mod('title_who_are_we'), 'restaurant'); ?></h3>
                        <?php echo __(get_theme_mod('content_about_us'), 'restaurant'); ?>
                    </div>
                    <div class="col-12 col-sm-6">
                        <h3 class="h3"><?php echo __(get_theme_mod('title_plant_meat'), 'restaurant'); ?></h3>
                        <?php echo __(get_theme_mod('content_plant_meat'), 'restaurant'); ?>
                    </div>
                </div>
            </div>
        </section>
        <section class="home-aboutus home-block">
            <div class="container">
                <div class="section-block-header">
                    <h2 class="h2"><?php echo __(get_theme_mod('title_home_contact_us'), 'restaurant'); ?></h2>
                </div>
                <div class="row">
                    <div class="col-12">
                        <?php echo do_shortcode(get_theme_mod('short_code_contact_us')); ?>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<?php
get_footer();
?>