<?php
function get_setting($key) {
    $CI = &get_instance();
    $CI->load->model('Settings_model');
    return $CI->Settings_model->get_setting($key);
}
?>
