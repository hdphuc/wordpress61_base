<?php

/**
 * Template Name: Promotion page
 */

defined('ABSPATH') || exit;
?>

<?php
get_header();
?>
<div class="container mt-5 mb-5">
    <?php
    /**
     * Hook: woocommerce_before_main_content.
     *
     * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
     * @hooked woocommerce_breadcrumb - 20
     * @hooked WC_Structured_Data::generate_website_data() - 30
     */
    do_action('woocommerce_before_main_content');

    ?>

    <header class="woocommerce-products-header mt-4 mb-4">
        <?php if (apply_filters('woocommerce_show_page_title', true)) : ?>
            <h1 class="woocommerce-products-header__title page-title"><?php the_title(); ?></h1>
        <?php endif; ?>
    </header>
    <div class="content">
        <?php the_content(); ?>
    </div>
    <div class="list-tab-items d-flex flex-wrap justify-content-center mb-5 w-100">
        <ul class="nav nav-tabs w-100 justify-content-center" role="tablist" >
            <li class="nav-item">
                <button class="nav-link active" aria-selected="true" data-bs-target="#meatless_monday" data-bs-toggle="tab" role="presentation"><?php echo __('Meatless Monday', 'restaurant'); ?></button>
            </li>
            <li class="nav-item">
                <button class="nav-link" aria-selected="false" data-bs-target="#happy_hour" data-bs-toggle="tab" role="presentation"><?php echo __('Happy hour', 'restaurant'); ?></button>
            </li>
            <li class="nav-item">
                <button class="nav-link" aria-selected="false" data-bs-target="#student_discount" data-bs-toggle="tab" role="presentation"><?php echo __('Student discount', 'restaurant'); ?></button>
            </li>
        </ul>
    </div>
        <div class="tab-content">
            <div id="meatless_monday" class="tab-pane fade show active">
                <div class="section-products-list woocommerce">
                    <?php
                    $args = array(
                        'post_type' => 'product',
                        'posts_per_page' => 8,
                        'orderby' => 'date',
                        'order' => 'DESC',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'product_cat',
                                'field' => 'name',
                                'terms' => 'Meatless Monday'
                            )
                        )
                    );
                    $loop = new WP_Query($args);
                    ?>
                    <?php if ($loop->have_posts()) : ?>
                        <ul class="products columns-4">
                            <?php while ($loop->have_posts()) : $loop->the_post();
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
                        <div class="p-5 d-flex justify-content-center align-items-center">
                            <?php echo __('No products found', 'restaurant'); ?>
                        </div>
                    <?php endif; ?>
                    <?php wp_reset_query(); ?>
                    <?php wp_reset_postdata(); ?>
                </div>
            </div>
            <div id="happy_hour" class="tab-pane fade">
                <div class="section-products-list woocommerce">
                    <?php
                    $args = array(
                        'post_type' => 'product',
                        'posts_per_page' => 8,
                        'orderby' => 'date',
                        'order' => 'DESC',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'product_cat',
                                'field' => 'name',
                                'terms' => 'Happy hour'
                            )
                        )
                    );
                    $loop = new WP_Query($args);
                    ?>
                    <?php if ($loop->have_posts()) : ?>
                        <ul class="products columns-4">
                            <?php while ($loop->have_posts()) : $loop->the_post();
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
                        <div class="p-5 d-flex justify-content-center align-items-center">
                            <?php echo __('No products found', 'restaurant'); ?>
                        </div>
                    <?php endif; ?>
                    <?php wp_reset_query(); ?>
                    <?php wp_reset_postdata(); ?>
                </div>
            </div>
            <div id="student_discount" class="tab-pane fade">
                <div class="section-products-list woocommerce">
                    <?php
                    $args = array(
                        'post_type' => 'product',
                        'posts_per_page' => 8,
                        'orderby' => 'date',
                        'order' => 'DESC',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'product_cat',
                                'field' => 'name',
                                'terms' => 'Student discount'
                            )
                        )
                    );
                    $loop = new WP_Query($args);
                    ?>
                    <?php if ($loop->have_posts()) : ?>
                        <ul class="products columns-4">
                            <?php while ($loop->have_posts()) : $loop->the_post();
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
                        <div class="p-5 d-flex justify-content-center align-items-center">
                            <?php echo __('No products found', 'restaurant'); ?>
                        </div>
                    <?php endif; ?>
                    <?php wp_reset_query(); ?>
                    <?php wp_reset_postdata(); ?>
                </div>
            </div>
        </div>
    <!-- </div> -->
</div>
<?php
get_footer();
?>