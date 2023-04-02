<?php
/**
 * Template Name: Home Custom Page
 */
?>
  
<?php get_header(); ?>

<main id="main" role="main">
  <?php do_action( 'food_restaurant_before_slider' ); ?>
  
  <?php /** slider section **/ ?>
  <?php if( get_theme_mod('food_restaurant_slider_hide',false) != '' ){ ?>
    <section id="slider" class="mw-100 p-0">
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel"> 
        <?php $food_restaurant_content_pages = array();
          for ( $count = 1; $count <= 4; $count++ ) {
            $mod = intval( get_theme_mod( 'food_restaurant_slider' . $count ));
            if ( 'page-none-selected' != $mod ) {
              $food_restaurant_content_pages[] = $mod;
            }
          }
          if( !empty($food_restaurant_content_pages) ) :
          $args = array(
              'post_type' => 'page',
              'post__in' => $food_restaurant_content_pages,
              'orderby' => 'post__in'
          );
          $query = new WP_Query( $args );
          if ( $query->have_posts() ) :
            $i = 1;
        ?>     
        <div class="carousel-inner" role="listbox">
          <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
          <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
            <a href="<?php echo esc_url( get_permalink() );?>"><?php the_post_thumbnail(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a>
            <div class="carousel-caption">
              <div class="inner_carousel">
                <h1 class="mb-3 p-0"><?php the_title();?></h1>
                <p class="mb-4"><?php $food_restaurant_excerpt = get_the_excerpt(); echo esc_html( food_restaurant_string_limit_words( $food_restaurant_excerpt,30 ) ); ?></p>
                <div class="buy-now-btn">
                  <a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small p-3"><?php esc_html_e('READ MORE','food-restaurant'); ?><span class="screen-reader-text"><?php esc_html_e( 'READ MORE','food-restaurant' );?></span>
                  </a>
                </div>  
              </div>
            </div>
          </div>
          <?php $i++; endwhile; 
          wp_reset_postdata();?>
        </div>
        <?php else : ?>
        <div class="no-postfound"></div>
          <?php endif;
        endif;?>
        <a class="carousel-control-prev" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev" role="button">
          <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span><span class="screen-reader-text"><?php esc_html_e( 'Previous','food-restaurant' );?></span>
        </a>
        <a class="carousel-control-next" data-bs-target="#carouselExampleCaptions" data-bs-slide="next" role="button">
          <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span><span class="screen-reader-text"><?php esc_html_e( 'Next','food-restaurant' );?></span>
        </a>
      </div>  
      <div class="clearfix"></div>
    </section>
  <?php }?>

  <?php do_action( 'food_restaurant_after_slider' ); ?>

  <?php /** second section **/ ?>
  <?php if( get_theme_mod('food_restaurant_product_sec_title') != ''|| get_theme_mod('food_restaurant_product_sec_subtitle') != '' || get_theme_mod('food_restaurant_product_sec_short_line') != '' ||get_theme_mod('food_restaurant_product_sec_box_image') != ''|| get_theme_mod('food_restaurant_product_settings') != '' ){ ?>
    <section id="products" class="my-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-4">
            <div class="blog-head text-end">
              <?php if( get_theme_mod('food_restaurant_product_sec_title',true) != ''){ ?>
                <strong class="text-end pb-0 mt-5"><?php echo esc_html(get_theme_mod('food_restaurant_product_sec_title','')); ?></strong>
              <?php }?>
              <?php if( get_theme_mod('food_restaurant_product_sec_subtitle',true) != ''){ ?>
                <p class="sub-heading pb-0"><?php echo esc_html(get_theme_mod('food_restaurant_product_sec_subtitle','')); ?></p>
              <?php }?>
              <?php if( get_theme_mod('food_restaurant_product_sec_short_line',true) != ''){ ?>
                <img src="<?php echo esc_url(get_theme_mod('food_restaurant_product_sec_border',esc_url(get_template_directory_uri()).'/images/headborder.png')); ?>" alt="<?php esc_attr_e( 'Border Image','food-restaurant' );?>">
                <p><?php echo esc_html(get_theme_mod('food_restaurant_product_sec_short_line','')); ?></p>
               <?php }?>
            </div>
            <?php if( get_theme_mod('food_restaurant_product_sec_box_image',true) != ''){ ?>
              <div class="service-box-img p-0">
                <img src="<?php echo esc_url(get_theme_mod('food_restaurant_product_sec_box_image',esc_url(get_template_directory_uri()).'/images/product.jpg')); ?>" alt="<?php esc_attr_e( 'Featured Product Image','food-restaurant' );?>">
              </div>
            <?php }?>
          </div>
          <div class="col-lg-8 col-md-8">
            <?php if(class_exists( 'WooCommerce' )){?> 
              <?php $food_restaurant_content_pages = array();
                $mod = intval( get_theme_mod( 'food_restaurant_product_settings'));
                if ( 'page-none-selected' != $mod ) {
                  $food_restaurant_content_pages[] = $mod;
                }
              if( !empty($food_restaurant_content_pages) ) :
                $args = array(
                  'post_type' => 'page',
                  'post__in' => $food_restaurant_content_pages,
                  'orderby' => 'post__in'
                );
                $query = new WP_Query( $args );
                if ( $query->have_posts() ) :
                  while ( $query->have_posts() ) : $query->the_post(); ?>
                    <div class="box-image">
                      <?php the_content(); ?>
                    </div>
                  <?php endwhile; ?>
                <?php else : 
                wp_reset_postdata();?>
                  <div class="no-postfound"></div>
                <?php endif;
              endif;?>
              <div class="clearfix"></div>
            <?php } ?>
          </div>
        </div>
      </div>
    </section>
  <?php }?>

  <?php do_action( 'food_restaurant_after_secondsec' ); ?>

  <div class="container">
    <?php while ( have_posts() ) : the_post(); ?>
      <?php the_content(); ?>
    <?php endwhile; // end of the loop. ?>
  </div>
</main>

<?php get_footer(); ?>