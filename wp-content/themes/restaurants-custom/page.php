<?php
    get_header(); 
?>
<div class="main-content">
<?php
if ( have_posts() ) {

	// Load posts loop.
	while ( have_posts() ) {
		the_post();

		get_template_part( 'template-parts/content/content' );
	}

} else {

    // If no content, include the "No posts found" template.
    the_content();

}
?>
</div>
<?php
get_footer();
