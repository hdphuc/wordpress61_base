<?php

global $current_user;
$day_of_the_week = array(
    'monday' => __('Monday', 'restaurant'),
    'tuesday' => __('Tuesday', 'restaurant'),
    'wednesday' => __('Wednesday', 'restaurant'),
    'thursday' => __('Thursday', 'restaurant'),
    'friday' => __('Friday', 'restaurant'),
    'saturday' => __('Saturday', 'restaurant'),
    'sunday' => __('Sunday', 'restaurant'),
);
$current_user = wp_get_current_user();
$email = $current_user->user_email ? $current_user->user_email : 'test@test.com';
$amountDefault = 100;
$setting_time_order = get_option('setting_time_order') ?? null;
$setting_time_order_holiday = get_option('setting_time_order_holiday') ?? null;
foreach ($day_of_the_week as $key => $value) {
    $$key = array(
        'from' => isset($setting_time_order[$key]['from']) ? $setting_time_order[$key]['from'] : '00:00',
        'to' => isset($setting_time_order[$key]['to']) ? $setting_time_order[$key]['to'] : '00:00',
    );
}

?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/assets/css/admin/setting_time_order.css' ?>">
<div class="wrap">
    <h1><?php _e('Settings time order', 'restaurant') ?></h1>
    <hr>
    <form action="" method="post">
        <table class="form-table" role="presentation">
            <?php foreach ($day_of_the_week as $key => $value): ?>
                <tr class="time-wrap">
                    <th><label for="<?php echo $key; ?>"><?php echo $value; ?></label></th>
                    <td>
                        From <input type="time" name="setting_time_order[<?php echo $key; ?>][from]" id="<?php echo $key; ?>" value="<?php echo esc_attr($$key['from']); ?>" class="regular-text" />
                        To <input type="time" name="setting_time_order[<?php echo $key; ?>][to]" id="<?php echo $key; ?>" value="<?php echo esc_attr($$key['to']); ?>" class="regular-text" />
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <!-- Add custom plus setting for holiday -->
        <div class="wrap-holiday">
            <h2><?php _e('Holiday', 'restaurant') ?></h2>
            <hr>
            <table class="form-table" role="presentation">
                <?php if (!is_null($setting_time_order_holiday) && is_array($setting_time_order_holiday)): ?>
                    <?php foreach ($setting_time_order_holiday as $k => $holiday): ?>
                        <tr class="time-wrap">
                            <th><label for="holiday"><?php _e('Holiday', 'restaurant') ?></label></th>
                            <td>
                                From <input type="datetime-local" name="setting_time_order_holiday[<?php echo $k; ?>][from]" id="holiday" value="<?php echo esc_attr($holiday['from']); ?>" class="regular-text from" />
                                To <input type="datetime-local" name="setting_time_order_holiday[<?php echo $k; ?>][to]" id="holiday" value="<?php echo esc_attr($holiday['to']); ?>" class="regular-text to" />
                                <?php if ($k > 0): ?>
                                    <button class="btn btn-sm btn-danger">-</button>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr class="time-wrap">
                        <th><label for="holiday"><?php _e('Holiday') ?></label></th>
                        <td>
                            From <input type="datetime-local" name="setting_time_order_holiday[0][from]" id="holiday" value="" class="regular-text from" />
                            To <input type="datetime-local" name="setting_time_order_holiday[0][to]" id="holiday" value="" class="regular-text to" />
                        </td>
                    </tr>
                <?php endif; ?>
                <tr class="time-wrap action">
                    <td></td>
                    <td><button class="btn btn-sm">+</button></td>
                </tr>
            </table>
        <p class="submit">
            <input type="submit" name="save_setting_time_order" id="save_setting_time_order" class="button button-primary" value="Save">
        </p>
    </form>
</div>
<script>
    jQuery(document).ready(function () {
        jQuery('.wrap-holiday .btn').click(function (e) {
            e.preventDefault();
            let index = jQuery('.wrap-holiday tr.time-wrap').length - 1;
            let $html = `<tr class="time-wrap">
                <th><label for="holiday"><?php _e('Holiday', 'restaurant') ?></label></th>
                <td>
                    From <input type="datetime-local" name="setting_time_order[${index}][from]" id="holiday" value="" class="regular-text from" />
                    To <input type="datetime-local" name="setting_time_order[${index}][to]" id="holiday" value="" class="regular-text to" />
                    </td>
            </tr>`;
            jQuery('.wrap-holiday .form-table .time-wrap.action').before($html);
            reloadRender();
            return false;
        });

        function reloadRender() {
            jQuery('.wrap-holiday .form-table .time-wrap:not(:last-child)').each(function (index, el) {
                jQuery(this).find('.from').attr('name', `setting_time_order_holiday[${index}][from]`);
                jQuery(this).find('.to').attr('name', `setting_time_order_holiday[${index}][to]`);
                if (index > 0) {
                    jQuery(this).find('td .btn-danger').remove();
                    jQuery(this).find('td:last-child').append('<button class="btn btn-sm btn-danger">-</button>');
                }
            });
        }

        jQuery(document).on('click', '.wrap-holiday .form-table .time-wrap .btn-danger', function (e) {
            e.preventDefault();
            jQuery(this).closest('.time-wrap').remove();
            reloadRender();
            return false;
        });
    });
</script>