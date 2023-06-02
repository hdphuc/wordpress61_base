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
            <?php foreach ($product_terms as $key => $product_term) :
                $calss_active = '';
                if ($key === 0) $calss_active = 'active';
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
            <?php foreach ($product_terms as $key => $product_term) :
                $calss_active = '';
                if ($key === 0) $calss_active = 'active';
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
            slidesToShow: 4,
            slidesToScroll: 4,
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
        });
    });
</script>
<?php get_footer(); ?>