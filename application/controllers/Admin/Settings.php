<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Settings_model');
    }

    // Load settings page
    public function index() {
        $this->load->view('admin/components/header');
		$data['settings'] = $this->Settings_model->get_all_settings();
		$this->load->view('admin/components/footer');
        $this->load->view('admin/settings/settings_view', $data);
    }

    // Save settings from modal
    public function save() {
        $this->Settings_model->save_setting('company_email', $this->input->post('company_email'));
        $this->Settings_model->save_setting('company_phone', $this->input->post('company_phone'));
        $this->Settings_model->save_setting('company_address', $this->input->post('company_address'));

        $this->session->set_flashdata('success', 'Settings updated successfully.');
        redirect('admin/settings');
    }
}
?>
