<?php

class SettingTimeOrder
{
    const DAY_OF_WEEK = array(
        '1' => 'monday',
        '2' => 'tuesday',
        '3' => 'wednesday',
        '4' => 'thursday',
        '5' => 'friday',
        '6' => 'saturday',
        '0' => 'sunday'
    );

    /**
     * __construct function
     */
    public function __construct()
    {
        add_action('admin_menu', array($this, 'setup_menu_setting_time_order'));

        add_action('init', array($this, 'remove_button_order_woocommerce'));
    }

    /**
     * setup_menu_setting_time_order function
     *
     * @return void
     */
    public function setup_menu_setting_time_order()
    {
        add_menu_page('Setting Time Order', 'Setting Time Order', 'manage_options', 'setting-time-order', array($this, 'setting_time_order'), 'dashicons-clock', 6);
        add_action('admin_init', array($this, 'register_option_fields_setting_time_order') );
    }
    
    /**
     * register_option_fields_setting_time_order function
     *
     * @return void
     */
    function register_option_fields_setting_time_order(){
        if (!empty($_POST['setting_time_order']))
        {
            update_option('setting_time_order', $_POST['setting_time_order']);
        }
        if (!empty($_POST['setting_time_order_holiday']))
        {
            update_option('setting_time_order_holiday', $_POST['setting_time_order_holiday']);
        }
    }

    /**
     * setting_time_order function
     *
     * @return string
     */
    public function setting_time_order()
    {
        ob_start();
        get_template_part('template-parts/admin/setting-time-order');
        $html = ob_get_clean();

        echo $html;
    }

    public function remove_button_order_woocommerce()
    {
        if (is_admin() || is_checkout() || is_cart() || is_wc_endpoint_url() || is_account_page()) {
            return;
        }

        $setting_time_order = get_option('setting_time_order');
        $setting_time_order_holiday = get_option('setting_time_order_holiday');
        $current_time = wp_date('H:i');
        $current_date = wp_date('Y-m-d');
        $current_day_of_week = date('w', strtotime($current_date));

        $date_from = strtotime($current_date . ' ' . $setting_time_order[self::DAY_OF_WEEK[$current_day_of_week]]['from'] . ':00');
        $date_to = strtotime($current_date . ' ' . $setting_time_order[self::DAY_OF_WEEK[$current_day_of_week]]['to'] . ':00');
        $date_now = strtotime($current_date . ' ' . $current_time . ':00');

        if ($date_from <= $date_now && $date_now <= $date_to) {
            add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart');
            add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
        } else {
            remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart');
            remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
        }
    }
}

new SettingTimeOrder();
