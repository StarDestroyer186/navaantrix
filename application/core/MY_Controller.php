<?php
class MY_Controller extends CI_Controller {
    public $global_settings = [];

    public function __construct() {
        parent::__construct();
        $this->load->model('Settings_model');
        $this->global_settings = $this->Settings_model->get_all_settings();
    }
}

class Admin_Controller extends MY_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        
        // Check if user is logged in
        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }
    }
}
