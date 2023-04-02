<?php
/**
 * The template part for displaying grid layout.
 *
 * @package Food Restaurant 
 * @subpackage food_restaurant
 * @since 1.0
 */
?>
<?php 
  $food_restaurant_archive_year  = get_the_time('Y'); 
  $food_restaurant_archive_month = get_the_time('m'); 
  $food_restaurant_archive_day   = get_the_time('d'); 
?>
<div class="col-lg-4 col-md-4">
  <article class="main-inner-ser-box mb-3 p-2">
    <h2 class="section-title m-0 p-2 text-start"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
    <div class="date-box my-3"><i class="fas fa-calendar-alt pe-2"></i><a href="<?php echo esc_url( get_day_link( $food_restaurant_archive_year, $food_restaurant_archive_month, $food_restaurant_archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></div>
    <div class="box-image">
      <?php 
        if(has_post_thumbnail()) { 
          the_post_thumbnail(); 
        }
      ?>	
    </div>
    <div class="entry-content my-3">
      <?php the_excerpt();?>
    </div>	
  	<div class="cat-box mt-3">
  	 <i class="fas fa-folder-open pe-2"></i><?php the_category(); ?>
  	</div>	
    <div class="clearfix"></div>
  </article>
</div>