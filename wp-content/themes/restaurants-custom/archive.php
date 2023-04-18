<?php

/**
 * Archive template.
 */

get_header();
?>
<div class="main-content">
<?php

    if (have_posts()) {
        while (have_posts()) {
            the_post();
            get_template_part('template-parts/content/content');
        }

        the_posts_pagination(
            array(
                'before_page_number' => esc_html__('Page', 'restaurant') . ' ',
                'mid_size'           => 0,
                'prev_text'          => sprintf(
                    '%s <span class="nav-prev-text">%s</span>',
                    '<span class="nav-short">' . esc_html__('Previous', 'restaurant') . '</span>',
                    wp_kses(
                        __('Newer <span class="nav-short">posts</span>', 'restaurant'),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    )
                ),
                'next_text'          => sprintf(
                    '<span class="nav-next-text">%s</span> %s',
                    wp_kses(
                        __('Older <span class="nav-short">posts</span>', 'restaurant'),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    '<span class="nav-short">' . esc_html__('Next', 'restaurant') . '</span>'
                ),
            )
        );
    } else {
        the_content();
    }
?>
</div>
<?php
get_footer();
?>

