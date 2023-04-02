<?php
	
	$food_restaurant_custom_css = '';
	
	/*-------------- Footer Text -------------------*/
	$food_restaurant_copyright_text_position = get_theme_mod('food_restaurant_copyright_text_position','center');
	if($food_restaurant_copyright_text_position != false){
		$food_restaurant_custom_css .='.copyright{';
			$food_restaurant_custom_css .='text-align: '.esc_attr($food_restaurant_copyright_text_position).';';
		$food_restaurant_custom_css .='}';
	}

	/*----------------Width Layout -------------------*/
    $food_restaurant_theme_lay = get_theme_mod( 'food_restaurant_width_options','Full Width');
    if($food_restaurant_theme_lay == 'Full Width'){
		$food_restaurant_custom_css .='body{';
			$food_restaurant_custom_css .='max-width: 100%;';
		$food_restaurant_custom_css .='}';
	}else if($food_restaurant_theme_lay == 'Contained Width'){
		$food_restaurant_custom_css .='body{';
			$food_restaurant_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$food_restaurant_custom_css .='}';
	}else if($food_restaurant_theme_lay == 'Boxed Width'){
		$food_restaurant_custom_css .='body{';
			$food_restaurant_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$food_restaurant_custom_css .='}';
	}

	/*-------- footer background css -------*/
	$food_restaurant_footer_background_color = get_theme_mod('food_restaurant_footer_background_color');
	$food_restaurant_custom_css .='.footersec{';
		$food_restaurant_custom_css .='background-color: '.esc_attr($food_restaurant_footer_background_color).';';
	$food_restaurant_custom_css .='}';

    /*-------- Copyright background css -------*/
	$food_restaurant_copyright_background_color = get_theme_mod('food_restaurant_copyright_background_color');
	$food_restaurant_custom_css .='.copyright-wrapper{';
		$food_restaurant_custom_css .='background-color: '.esc_attr($food_restaurant_copyright_background_color).';';
	$food_restaurant_custom_css .='}';

	// site title and tagline font size option
	$food_restaurant_site_title_font_size = get_theme_mod('food_restaurant_site_title_font_size', 33);{
	$food_restaurant_custom_css .='.header .logo a{';
	$food_restaurant_custom_css .='font-size: '.esc_attr($food_restaurant_site_title_font_size).'px;';
		$food_restaurant_custom_css .='}';
	}

	$food_restaurant_site_tagline_font_size = get_theme_mod('food_restaurant_site_tagline_font_size', 14);{
	$food_restaurant_custom_css .='.header .logo p{';
	$food_restaurant_custom_css .='font-size: '.esc_attr($food_restaurant_site_tagline_font_size).'px;';
		$food_restaurant_custom_css .='}';
	}
     