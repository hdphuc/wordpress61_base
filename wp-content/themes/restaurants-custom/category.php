<?php

/**
 * Archive template.
 */

get_header();
?>

<?php
if (have_posts()) {
?>
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <header class="page-header">
                        <?php
                        the_archive_title('<h1 class="page-title">', '</h1>');
                        the_archive_description('<div class="archive-description">', '</div>');
                        ?>
                    </header>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row g-3">
                <?php
                while (have_posts()) {
                    the_post();
                    get_template_part('template-parts/content/list-post');
                }
                ?>
            </div>
        <?php
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
    </div>
    <?php
    get_footer();
    ?>