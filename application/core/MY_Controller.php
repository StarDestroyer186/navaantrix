<?php
class MY_Controller extends CI_Controller {
    public $global_settings = [];

    public function __construct() {
        parent::__construct();
        $this->load->model('Settings_model');
        $this->global_settings = $this->Settings_model->get_all_settings();
    }
}
