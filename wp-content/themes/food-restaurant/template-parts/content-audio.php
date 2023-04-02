<?php
/**
 * The template part for displaying audio post.
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
<?php
  $content = apply_filters( 'the_content', get_the_content() );
  $audio = false;

  // Only get audio from the content if a playlist isn't present.
  if ( false === strpos( $content, 'wp-playlist-script' ) ) {
    $audio = get_media_embedded_in_content( $content, array( 'audio' ) );
  }
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
  <div class="main-inner-ser-box mb-3 p-2">
    <h2 class="section-title m-0 p-2 text-start"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
    <div class="date-box my-3"><i class="fas fa-calendar-alt pe-2"></i><a href="<?php echo esc_url( get_day_link( $food_restaurant_archive_year, $food_restaurant_archive_month, $food_restaurant_archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></div>
    <div class="box-image">
     <?php
        if ( ! is_single() ) {
          // If not a single post, highlight the audio file.
          if ( ! empty( $audio ) ) {
            foreach ( $audio as $audio_html ) {
              echo '<div class="entry-audio">';
                echo $audio_html;
              echo '</div><!-- .entry-audio -->';
            }
          };
        };
      ?>  
    </div>
    <div class="entry-content my-3">
      <?php the_excerpt();?>
    </div>
    <div class="cat-box mt-3">
      <i class="fas fa-folder-open pe-2"></i><?php the_category(); ?>
    </div>
    <div class="clearfix"></div>
  </div>
</article>