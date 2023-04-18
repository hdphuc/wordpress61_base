<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();
?>
	<!-- Error Page -->
	<div class="container">
		<div class="error error-content p-5 mt-5 mb-5">
			<div class="d-flex flex-wrap align-items-center justify-content-center">
				<div class="container-floud">
					<div class="col-xs-12 ground-color text-center">
						<div class="container-error-404">
							<div class="404-container">
								<p class="h1 text-danger"> 404 </p>
							</div>
							<div class="msg">OH!<span class="triangle"></span></div>
						</div>
						<h1 class="h1">Sorry! Page not found</h1>
						<p class="p">The page you are looking for might have been removed had its name changed or is temporarily unavailable.</p>
						<a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary">Back to Home</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Error Page -->
<?php
get_footer();
