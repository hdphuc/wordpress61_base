<?php
// @return Option
function getOptionsCustomizeTheme()
{
    global $options, $arrOpt;
    $options = $arrOpt = [];
    $folder_name = 'functions';
    $path = get_template_directory() . '/' . $folder_name;
    if (is_dir($path)) {
        $files = array_diff(scandir($path), array('.', '..'));
        foreach ($files as $file) {
            require_once(get_template_directory() . '/' . $folder_name . '/' . $file);
            $options = array_merge($options, $arrOpt);
        }
    }

    return $options;
}

require_once('theme-customize-editor.php');

/**
 * Display edit customize.
 */
add_action("customize_register", "dev_theme_customize_register");
function dev_theme_customize_register($wp_customize)
{
    // Get customize option theme
    $options = getOptionsCustomizeTheme();

    //=============================================================
    // Remove header image and widgets option from theme customizer
    // Remove themes option from theme customizer
    //=============================================================
    $wp_customize->remove_control("header_image");
    // $wp_customize->remove_panel("widgets");
    $wp_customize->remove_control('blogdescription');
    $wp_customize->remove_panel('themes');

    //=============================================================
    // Remove Colors, Background image, and Static front page 
    // option from theme customizer     
    $wp_customize->remove_section("colors");
    $wp_customize->remove_section("background_image");
    $wp_customize->remove_section("static_front_page");
    //=============================================================
    // Change priority
    $wp_customize->get_section('title_tagline')->priority  = 0;
    //=============================================================
    $section_id = $panel_id = '';
    foreach ($options as $key => $option) {
        $priority = $key + 10;
        if (array_key_exists('namePanel', $option)) {
            $panel_id = 'panel_id_' . $key;
            $title = $option['namePanel'];
            $wp_customize->add_panel($panel_id, array(
                'priority'       => $priority,
                'capability'     => 'edit_theme_options',
                'theme_supports' => '',
                'title'          => $title,
                'description'    => $title,
            ));
        } elseif (array_key_exists('nameSection', $option)) {
            $section_id = 'section_id_' . $key;
            $wp_customize->add_section($section_id, array(
                'title'    => esc_html__($option['nameSection'], 'restaurant'),
                'description' => esc_html__($option['nameSection']),
                'priority' => $priority,
                'panel'         => $panel_id
            ));
        } else {
            $key_control = isset($option['id']) ? $option['id'] : $option['name'];
            if (isset($option['repeat'])) {
                $loop = get_theme_mod($option['repeat']);
                if ($loop) {
                    for ($i = 1; $i <= $loop; $i++) {
                        $description = $option['description'];
                        if (is_array($option['description'])) {
                            $description = $option['description'][$i];
                        }
                        $option_new = array(
                            "name" => $key_control . '_' . $i,
                            "label" => str_replace(['%i','％i'], $i, $option['label']),
                            "description" => $description . ' ' . $i,
                            "default" => $option['default'],
                            "type" => $option['type'],
                        );
                        addControlType($wp_customize, $option_new, $section_id);
                    }
                }
            } else {
                addControlType($wp_customize, $option, $section_id);
            }
        }
    }

    //=============================================================

}

function addControlType($wp_customize, $option, $section_id)
{
    $key_control = isset($option['id']) ? $option['id'] : $option['name'];
    $wp_customize->add_setting($key_control, array(
        'capability'     => 'edit_theme_options',
        'default'        => isset($option['value']) ? esc_html__($option['value']) : $option['default'],
        'sanitize_callback' => 'wp_kses_post',
        'transport' => 'refresh',

    ));
    $label = isset($option['label']) ? esc_html__($option['label'], 'restaurant') : '';
    $placeholder = isset($option['description']) ? __($option['description']) : '';
    if (isset($option['input_attrs'])) {
        $input_attrs = $option['input_attrs'];
    } else {
        $input_attrs['placeholder'] = $placeholder;
    }
    switch ($option['type']) {
        case 'color':
            $wp_customize->add_control(
                new WP_Customize_Color_Control(
                    $wp_customize,
                    $key_control,
                    array( // Args, including any custom ones.
                        'label' => __($label),
                        'section' => $section_id,
                        'description' => __($option['description'], 'restaurant')
                    )
                )
            );
            break;

        case 'image':
            $wp_customize->add_control(
                new WP_Customize_Image_Control(
                    $wp_customize,
                    $key_control,
                    array(
                        'label'      =>  $label,
                        'section'    => $section_id,
                        'settings'   => $key_control,
                        'description' => __($option['description'], 'restaurant')
                    )
                )
            );
            break;
        case 'video':
            $wp_customize->add_control(
                new wp_customize_media_control(
                    $wp_customize,
                    $key_control,
                    array(
                        'mime_type'      =>  $option['type'],
                        'label'      =>  $label,
                        'section'    => $section_id,
                        'settings'   => $key_control,
                        'description' => __($option['description'], 'restaurant')
                    )
                )
            );
            break;
        case 'audio':
            $wp_customize->add_control(
                new wp_customize_media_control(
                    $wp_customize,
                    $key_control,
                    array(
                        'mime_type'      =>  $option['type'],
                        'label'      =>  $label,
                        'section'    => $section_id,
                        'settings'   => $key_control,
                        'description' => __($option['description'], 'restaurant')
                    )
                )
            );
            break;
        case 'select':
            $wp_customize->add_control($key_control, array(
                'label'      => $label,
                'section'    => $section_id,
                'settings'   => $key_control,
                'type'           => $option['type'],
                'choices' => isset($option['choices']) ? $option['choices'] : '',
                'description' => __($option['description'], 'restaurant')
            ));
            break;
        case 'editor':
            $wp_customize->add_control(new theme_restaurant_customize_editor($wp_customize, $key_control, array(
                'label'      => $label,
                'section'    => $section_id,
                'settings'   => $key_control,
                'description' => __($option['description'], 'restaurant')
            )));
            break;
        case 'post_type_titles':
            $wp_customize->add_control(new theme_restaurant_customize_editor($wp_customize, $key_control, array(
                'label'      => $label,
                'section'    => $section_id,
                'settings'   => $key_control,
                'choices' => isset($option['choices']) ? $option['choices'] : '',
                'description' => __($option['description'], 'restaurant')
            )));
            break;
        default:
            $wp_customize->add_control(
                $key_control,
                array(
                    'label'      => $label,
                    'section'    => $section_id,
                    'settings'   => $key_control,
                    'type'           => $option['type'],
                    'input_attrs' => $input_attrs,
                    'description' => __($option['description'], 'restaurant')
                )
            );
            break;
    }
}

/**
 * Enqueue script for customizer control
 */
function theme_restaurant_enqueue()
{
    wp_enqueue_script('jquery-ui-droppable');
    wp_enqueue_script('restaurant-customizer', get_theme_file_uri() . '/assets/js/customizer.js', array(), '20181231', true);
}
add_action('customize_controls_enqueue_scripts', 'theme_restaurant_enqueue');