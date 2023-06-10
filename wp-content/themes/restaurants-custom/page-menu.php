<?php

/**
 * Template Name: Menu page
 */

get_header();
?>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() . "/assets/css/slick.css"; ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() . "/assets/css/slick-theme.css"; ?>" />
<div class="container">
    <div class="content-menu-page">

        <?php
        $product_term_args = array(
            'taxonomy' => 'product_cat',
            // 'include' => $product_term_ids,
            // 'orderby'  => 'include'
        );
        $product_terms = get_terms($product_term_args);
        ?>
        <div class="categories">
            <?php $calss_active = 'active'; ?>
            <div class="categorie-item <?php echo $calss_active; ?>" cat-id="all">
                <div class="thumbnail">
                    <?php
                    $src = get_template_directory_uri() . '/assets/images/no-img-cat.png';
                    // Output in img tag
                    echo '<img src="' . $src . '" alt="" />';
                    ?>
                </div>
                <div class="title">
                    <?php echo __('All', 'restaurant'); ?>
                </div>
            </div>
            <?php foreach ($product_terms as $key => $product_term) :
                $calss_active = '';
                // if ($key === 0) $calss_active = 'active';
            ?>
                <div class="categorie-item <?php echo $calss_active; ?>" cat-id="<?php echo $product_term->term_id; ?>">
                    <div class="thumbnail">
                        <?php
                        $thumbnail_id = get_term_meta($product_term->term_id, 'thumbnail_id', true);
                        $src = get_template_directory_uri() . '/assets/images/no-img-cat.png';
                        // get the medium-sized image url
                        $image = wp_get_attachment_image_src($thumbnail_id, 'medium');
                        if ($image[0]) {
                            $src = $image[0];
                        }
                        // Output in img tag
                        echo '<img src="' . $src . '" alt="" />';
                        ?>
                    </div>
                    <div class="title">
                        <?php echo $product_term->name; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="tabs-cat">
            <div id="tab-id-all" class="tabs-cat-item <?php echo $calss_active = 'active'; ?>">
                <?php foreach ($product_terms as $key => $product_term) :
                    $calss_active = '';
                    $per_page = 4;
                    // if ($key === 0) $calss_active = 'active';
                ?>
                    <div class="cat-title"><?php echo $product_term->name; ?></div>
                    <div class="products-by-cats">
                        <?php echo get_product_by_cats($product_term->term_id, $per_page); ?>
                    </div>
                    <div class="load-more-cat">
                        <a href="javascripts:void(0);" cat-id="<?php echo $product_term->term_id ?>"><?php _e('See more'); ?></a>
                    </div>
                    <?php if ($key !== array_key_last($product_terms)) : ?>
                        <div class="hr-space"></div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
            <?php foreach ($product_terms as $key => $product_term) :
                $calss_active = '';
                // if ($key === 0) $calss_active = 'active';
            ?>
                <div id="tab-id-<?php echo $product_term->term_id; ?>" class="tabs-cat-item <?php echo $calss_active; ?>">
                    <?php echo get_product_by_cats($product_term->term_id); ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- Add scripts slider -->
<script type="text/javascript" src="<?php echo get_template_directory_uri() . "/assets/js/slick.min.js"; ?>"></script>
<script>
    jQuery(document).ready(function() {
        jQuery('.categories').slick({
            slidesToShow: 6,
            slidesToScroll: 6,
            autoplay: true,
            autoplaySpeed: 2000,
            dots: true,
            responsive: [{
                    breakpoint: 800,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 380,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });

        jQuery('.categorie-item').on('click', function() {
            jQuery('.categorie-item').removeClass('active');
            jQuery(this).addClass('active');
            jQuery('.tabs-cat-item').removeClass('active');
            let tabid = $(this).attr('cat-id');
            jQuery('#tab-id-' + tabid).addClass('active');

            var url = window.location.href;
            var key = "category";
            var new_val = tabid;
            var lst_temp = url.split('?');
            var lst_parts = lst_temp[1].split('&');

            var arr_data = new Array();
            for (var index in lst_parts) {
                lst = lst_parts[index].split('=');
                arr_data[lst[0]] = lst[1];
            }

            var val = arr_data[key];
            if (val != new_val) {
                arr_data[key] = new_val;
                var new_url = lst_temp[0] + '?' + EncodeQueryData(arr_data);
                window.location.href = new_url;
            }
        });

        jQuery(document).on('click', '.load-more-cat a', function() {
            let cat_id = jQuery(this).attr('cat-id');
            jQuery('.categorie-item[cat-id="' + cat_id + '"]').trigger('click');
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        function EncodeQueryData(arr_data) {
            var ret = [];
            for (var d in arr_data)
                ret.push(encodeURIComponent(d) + "=" + encodeURIComponent(arr_data[d]));
            return ret.join("&");
        }

    });
</script>
<?php get_footer(); ?>