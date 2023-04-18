<?php

/**
 * Template Name: Full Width
 * Template Post Type: post, page
 * 
 */

get_header();
?>

<div class="full-width">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post()?>
                <?php get_template_part('template-parts/content/content'); ?>
            <?php endwhile; ?>
    <?php endif; ?>
</div>

<?php
get_footer();
?>