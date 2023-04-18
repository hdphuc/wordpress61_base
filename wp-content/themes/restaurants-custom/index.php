<?php
    get_header(); 
?>

<?php
if ( have_posts() ) {

	// Load posts loop.
	while ( have_posts() ) {
		the_post();

		get_template_part( 'template-parts/content/content' );
	}

	// Previous/next page navigation.
	the_posts_pagination(
        array(
            'before_page_number' => esc_html__( 'Page', 'restaurant' ) . ' ',
            'mid_size'           => 0,
            'prev_text'          => sprintf(
                '%s <span class="nav-prev-text">%s</span>',
                '<span class="nav-short">' . esc_html__( 'Previous', 'restaurant' ) . '</span>',
                wp_kses(
                    __( 'Newer <span class="nav-short">posts</span>', 'restaurant' ),
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
                    __( 'Older <span class="nav-short">posts</span>', 'restaurant' ),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                '<span class="nav-short">' . esc_html__( 'Next', 'restaurant' ) . '</span>'
            ),
        )
    );

} else {

    // If no content, include the "No posts found" template.
    the_content();

}

get_footer();
