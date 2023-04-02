<?php
/**
 * Food Restaurant functions and definitions
 *
 * @package Food Restaurant
 */

if ( ! function_exists( 'food_restaurant_setup' ) ) :

/* Theme Setup */

function food_restaurant_setup() {

	$GLOBALS['content_width'] = apply_filters( 'food_restaurant_content_width', 640 );

	load_theme_textdomain( 'food-restaurant', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );
	add_image_size('food-restaurant-homepage-thumb',240,145,true);
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'food-restaurant' ),
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'f1f1f1'
	) );

	/*
	* Enable support for Post Formats.
	*
	* See: https://codex.wordpress.org/Post_Formats
	*/
	add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	add_theme_support('responsive-embeds');

	add_editor_style( array( 'css/editor-style.css', food_restaurant_font_url() ) );

	// Theme Activation Notice
	global $pagenow;
	
	if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {
		add_action( 'admin_notices', 'food_restaurant_activation_notice' );
	}

}
endif; // food_restaurant_setup
add_action( 'after_setup_theme', 'food_restaurant_setup' );

// Notice after Theme Activation
function food_restaurant_activation_notice() {
	echo '<div class="foodwelcome notice notice-success is-dismissible">';
		echo '<h3>'. esc_html__( 'Warm Greetings to you!!', 'food-restaurant' ) .'</h3>';
		echo '<p>'. esc_html__( ' Our sincere thanks for choosing our food restaurant theme. We assure you a high performing theme for your food business. Please proceed towards welcome section to start an amazing journey with us. ', 'food-restaurant' ) .'</p>';
		echo '<p><a href="'. esc_url( admin_url( 'themes.php?page=food_restaurant_guide' ) ) .'" class="button button-primary">'. esc_html__( 'Welcome...', 'food-restaurant' ) .'</a></p>';
	echo '</div>';
}

/* Theme Widgets Setup */
function food_restaurant_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'food-restaurant' ),
		'description'   => __( 'Appears on blog page sidebar', 'food-restaurant' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Posts and Pages Sidebar', 'food-restaurant' ),
		'description'   => __( 'Appears on posts and pages', 'food-restaurant' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Third Column Sidebar', 'food-restaurant' ),
		'description'   => __( 'Appears on posts and pages', 'food-restaurant' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'food-restaurant' ),
		'description'   => __( 'Appears in footer', 'food-restaurant' ),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'food-restaurant' ),
		'description'   => __( 'Appears in footer', 'food-restaurant' ),
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'food-restaurant' ),
		'description'   => __( 'Appears in footer', 'food-restaurant' ),
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 4', 'food-restaurant' ),
		'description'   => __( 'Appears in footer', 'food-restaurant' ),
		'id'            => 'footer-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'food_restaurant_widgets_init' );

/* Theme Font URL */
function food_restaurant_font_url(){
	$font_url      = '';
	$font_family   = array(
		'ABeeZee:ital@0;1',
	    'Abril+Fatfac',
	    'Acme',
	    'Anton',
	    'Architects+Daughter',
	    'Arimo:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
	    'Arsenal:ital,wght@0,400;0,700;1,400;1,700',
	    'Arvo:ital,wght@0,400;0,700;1,400;1,700',
	    'Alegreya:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900',
	    'Alfa+Slab+One',
	    'Averia+Serif+Libre:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700',
	    'Bangers',
	    'Boogaloo',
	    'Bad+Script',
	    'Bitter:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	    'Bree+Serif',
	    'BenchNine:wght@300;400;700',
	    'Cabin:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
	    'Cardo:ital,wght@0,400;0,700;1,400',
	    'Courgette',
	    'Cherry+Swash:wght@400;700',
	    'Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700',
	    'Crimson+Text:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700',
	    'Cuprum:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
	    'Cookie',
	    'Coming+Soon',
	    'Chewy',
	    'Days+One',
	    'Dosis:wght@200;300;400;500;600;700;800',
	    'Economica:ital,wght@0,400;0,700;1,400;1,700',
	    'Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	    'Fredoka+One',
	    'Fjalla+One',
	    'Francois+One',
	    'Frank+Ruhl+Libre:wght@300;400;500;700;900',
	    'Gloria+Hallelujah',
	    'Great+Vibes',
	    'Handlee',
	    'Hammersmith+One',
	    'Heebo:wght@100;200;300;400;500;600;700;800;900',
	    'Inconsolata:wght@200;300;400;500;600;700;800;900',
	    'Indie+Flower',
	    'IM+Fell+English+SC',
	    'Julius+Sans+One',
	    'Josefin+Slab:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700',
	    'Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700',
	    'Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	    'Kaisei+HarunoUmi:wght@400;500;700',
	    'Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	    'Lobster',
	    'Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900',
	    'Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
	    'Libre+Baskerville:ital,wght@0,400;0,700;1,400',
	    'Lobster+Two:ital,wght@0,400;0,700;1,400;1,700',
	    'Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900',
	    'Monda:wght@400;700',
	    'Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	    'Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	    'Marck+Script',
	    'Noto+Serif:ital,wght@0,400;0,700;1,400;1,700',
	    'Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800',
	    'Overpass:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	    'Overpass+Mono:wght@300;400;500;600;700',
	    'Oxygen:wght@300;400;700',
	    'Orbitron:wght@400;500;600;700;800;900',
	    'Patua+One',
	    'Pacifico',
	    'Padauk:wght@400;700',
	    'Playball',
	    'Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900',
	    'PT+Sans:ital,wght@0,400;0,700;1,400;1,700',
	    'Philosopher:ital,wght@0,400;0,700;1,400;1,700',
	    'Permanent+Marker',
	    'Poiret+One',
	    'Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	    'Quicksand:wght@300;400;500;600;700',
	    'Quattrocento+Sans:ital,wght@0,400;0,700;1,400;1,700',
	    'Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	    'Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	    'Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700',
	    'Rokkitt:wght@100;200;300;400;500;600;700;800;900',
	    'Russo+One',
	    'Righteous',
	    'Saira:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	    'Satisfy',
	    'Slabo+13px',
	    'Slabo+27px',
	    'Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900',
	    'Shadows+Into+Light+Two',
	    'Shadows+Into+Light',
	    'Sacramento',
	    'Shrikhand',
	    'Staatliches',
	    'Tangerine:wght@400;700',
	    'Trirong:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	    'Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700',
	    'Unica+One',
	    'VT323',
	    'Varela+Round',
	    'Vampiro+One',
	    'Vollkorn:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900',
	    'Volkhov:ital,wght@0,400;0,700;1,400;1,700',
	    'Work+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	    'Yanone+Kaffeesatz:wght@200;300;400;500;600;700',
	    'ZCOOL+XiaoWei'
	);

	$fonts_url = add_query_arg( array(
		'family' => implode( '&family=', $font_family ),
		'display' => 'swap',
	), 'https://fonts.googleapis.com/css2' );

	$contents = wptt_get_webfont_url( esc_url_raw( $fonts_url ) );
	return $contents;
}

/* Theme enqueue scripts */
function food_restaurant_scripts() {
	wp_enqueue_style( 'food-restaurant-font', food_restaurant_font_url(), array() );
	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/css/bootstrap.css');
	wp_enqueue_style( 'food-restaurant-basic-style', get_stylesheet_uri() );
	wp_style_add_data( 'food-restaurant-style', 'rtl', 'replace' );
	wp_enqueue_style( 'font-awesome-css', get_template_directory_uri().'/css/fontawesome-all.css' );
	
	// Paragraph
	    $food_restaurant_paragraph_color = get_theme_mod('food_restaurant_paragraph_color', '');
	    $food_restaurant_paragraph_font_family = get_theme_mod('food_restaurant_paragraph_font_family', '');
	    $food_restaurant_paragraph_font_size = get_theme_mod('food_restaurant_paragraph_font_size', '');
	// "a" tag
		$food_restaurant_atag_color = get_theme_mod('food_restaurant_atag_color', '');
	    $food_restaurant_atag_font_family = get_theme_mod('food_restaurant_atag_font_family', '');
	// "li" tag
		$food_restaurant_li_color = get_theme_mod('food_restaurant_li_color', '');
	    $food_restaurant_li_font_family = get_theme_mod('food_restaurant_li_font_family', '');
	// H1
		$food_restaurant_h1_color = get_theme_mod('food_restaurant_h1_color', '');
	    $food_restaurant_h1_font_family = get_theme_mod('food_restaurant_h1_font_family', '');
	    $food_restaurant_h1_font_size = get_theme_mod('food_restaurant_h1_font_size', '');
	// H2
		$food_restaurant_h2_color = get_theme_mod('food_restaurant_h2_color', '');
	    $food_restaurant_h2_font_family = get_theme_mod('food_restaurant_h2_font_family', '');
	    $food_restaurant_h2_font_size = get_theme_mod('food_restaurant_h2_font_size', '');
	// H3
		$food_restaurant_h3_color = get_theme_mod('food_restaurant_h3_color', '');
	    $food_restaurant_h3_font_family = get_theme_mod('food_restaurant_h3_font_family', '');
	    $food_restaurant_h3_font_size = get_theme_mod('food_restaurant_h3_font_size', '');
	// H4
		$food_restaurant_h4_color = get_theme_mod('food_restaurant_h4_color', '');
	    $food_restaurant_h4_font_family = get_theme_mod('food_restaurant_h4_font_family', '');
	    $food_restaurant_h4_font_size = get_theme_mod('food_restaurant_h4_font_size', '');
	// H5
		$food_restaurant_h5_color = get_theme_mod('food_restaurant_h5_color', '');
	    $food_restaurant_h5_font_family = get_theme_mod('food_restaurant_h5_font_family', '');
	    $food_restaurant_h5_font_size = get_theme_mod('food_restaurant_h5_font_size', '');
	// H6
		$food_restaurant_h6_color = get_theme_mod('food_restaurant_h6_color', '');
	    $food_restaurant_h6_font_family = get_theme_mod('food_restaurant_h6_font_family', '');
	    $food_restaurant_h6_font_size = get_theme_mod('food_restaurant_h6_font_size', '');

		$food_restaurant_custom_css ='
			p,span{
			    color:'.esc_html($food_restaurant_paragraph_color).'!important;
			    font-family: '.esc_html($food_restaurant_paragraph_font_family).';
			    font-size: '.esc_html($food_restaurant_paragraph_font_size).';
			}
			a{
			    color:'.esc_html($food_restaurant_atag_color).'!important;
			    font-family: '.esc_html($food_restaurant_atag_font_family).';
			}
			li{
			    color:'.esc_html($food_restaurant_li_color).'!important;
			    font-family: '.esc_html($food_restaurant_li_font_family).';
			}
			h1{
			    color:'.esc_html($food_restaurant_h1_color).'!important;
			    font-family: '.esc_html($food_restaurant_h1_font_family).'!important;
			    font-size: '.esc_html($food_restaurant_h1_font_size).'!important;
			}
			h2{
			    color:'.esc_html($food_restaurant_h2_color).'!important;
			    font-family: '.esc_html($food_restaurant_h2_font_family).'!important;
			    font-size: '.esc_html($food_restaurant_h2_font_size).'!important;
			}
			h3{
			    color:'.esc_html($food_restaurant_h3_color).'!important;
			    font-family: '.esc_html($food_restaurant_h3_font_family).'!important;
			    font-size: '.esc_html($food_restaurant_h3_font_size).'!important;
			}
			h4{
			    color:'.esc_html($food_restaurant_h4_color).'!important;
			    font-family: '.esc_html($food_restaurant_h4_font_family).'!important;
			    font-size: '.esc_html($food_restaurant_h4_font_size).'!important;
			}
			h5{
			    color:'.esc_html($food_restaurant_h5_color).'!important;
			    font-family: '.esc_html($food_restaurant_h5_font_family).'!important;
			    font-size: '.esc_html($food_restaurant_h5_font_size).'!important;
			}
			h6{
			    color:'.esc_html($food_restaurant_h6_color).'!important;
			    font-family: '.esc_html($food_restaurant_h6_font_family).'!important;
			    font-size: '.esc_html($food_restaurant_h6_font_size).'!important;
			}
		';
		wp_add_inline_style( 'food-restaurant-basic-style',$food_restaurant_custom_css );

	/*------ Slider Show/Hide ------*/
	$food_restaurant_slider = get_theme_mod('food_restaurant_slider_hide');
	if($food_restaurant_slider == false ){
		$food_restaurant_custom_css .='.page-template-home-custom .header{';
			$food_restaurant_custom_css .='position: static; background-color: #fb6e21;';
		$food_restaurant_custom_css .='}';
		$food_restaurant_custom_css .='.page-template-home-custom .header .logo, .page-template-home-custom #menu-sidebar .primary-navigation{';
			$food_restaurant_custom_css .=' background-color: transparent;';
		$food_restaurant_custom_css .='}';
		$food_restaurant_custom_css .='.page-template-home-custom .header .logo a, .page-template-home-custom .header .logo p, .page-template-home-custom .primary-navigation ul li a{';
			$food_restaurant_custom_css .=' color: #fff;';
		$food_restaurant_custom_css .='}';
	}

	$food_restaurant_slider_hide = get_theme_mod('food_restaurant_slider_hide');
	if($food_restaurant_slider_hide != true){
		$food_restaurant_custom_css .='#menu-sidebar .primary-navigation{';
			$food_restaurant_custom_css .='position: static;top: 0px; transform: none;';
		$food_restaurant_custom_css .='}';
	}
    
   require get_parent_theme_file_path( '/inc/inline-css.php' );
	wp_add_inline_style( 'food-restaurant-basic-style',$food_restaurant_custom_css );
	
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.js', array('jquery') ,'',true);
	wp_enqueue_script( 'food-restaurant-customscripts', get_template_directory_uri() . '/js/custom.js', array('jquery') );
	wp_enqueue_script( 'jquery-superfish', get_template_directory_uri() . '/js/jquery.superfish.js', array('jquery') ,'',true);
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'food_restaurant_scripts' );

define('FOOD_RESTAURANT_FREE_THEME_DOC',__('https://logicalthemes.com/docs/free-food-restaurant/','food-restaurant'));
define('FOOD_RESTAURANT_SUPPORT',__('https://wordpress.org/support/theme/food-restaurant','food-restaurant'));
define('FOOD_RESTAURANT_REVIEW',__('https://wordpress.org/support/theme/food-restaurant/reviews/#new-post','food-restaurant'));
define('FOOD_RESTAURANT_BUY_NOW',__('https://www.logicalthemes.com/premium/food-restaurant-wordpress-theme/','food-restaurant'));
define('FOOD_RESTAURANT_LIVE_DEMO',__('https://www.logicalthemes.com/food-restaurant-theme/','food-restaurant'));
define('FOOD_RESTAURANT_PRO_DOC',__('https://www.logicalthemes.com/docs/food-restaurant-pro/','food-restaurant'));
define('FOOD_RESTAURANT_CREDIT',__('https://www.logicalthemes.com/free/wp-food-restaurant-wordpress-theme/','food-restaurant'));

if ( ! function_exists( 'food_restaurant_credit' ) ) {
	function food_restaurant_credit(){
		echo "<a href=".esc_url(FOOD_RESTAURANT_CREDIT)." target='_blank'>".esc_html__('Restaurant WordPress Theme','food-restaurant')."</a>";
	}
}

/*radio button sanitization*/
 function food_restaurant_sanitize_choices( $input, $setting ) {
    global $wp_customize; 
    $control = $wp_customize->get_control( $setting->id ); 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

function food_restaurant_sanitize_checkbox( $input ) {
	return ( ( isset( $input ) && true == $input ) ? true : false );
}

function food_restaurant_sanitize_float( $input ) {
	return filter_var($input, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
}

function food_restaurant_sanitize_dropdown_pages( $page_id, $setting ) {
  // Ensure $input is an absolute integer.
  $page_id = absint( $page_id );
  // If $page_id is an ID of a published page, return it; otherwise, return the default.
  return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'food_restaurant_loop_columns');
if (!function_exists('food_restaurant_loop_columns')) {
	function food_restaurant_loop_columns() {
		$columns = get_theme_mod( 'food_restaurant_products_per_column', 3 );
		return $columns; // 3 products per row
	}
}

//Change number of products that are displayed per page (shop page)
add_filter( 'loop_shop_per_page', 'food_restaurant_shop_per_page', 20 );
function food_restaurant_shop_per_page( $cols ) {
  	$cols = get_theme_mod( 'food_restaurant_products_per_page', 9 );
	return $cols;
}

/* Excerpt Limit Begin */
function food_restaurant_string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}

require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/getting-started/getting-started.php';
require get_template_directory() . '/wptt-webfont-loader.php';