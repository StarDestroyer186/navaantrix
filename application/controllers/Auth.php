<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('user_model');
        $this->load->helper('url');
    }
    
    public function login() {
        $this->load->view('auth/login');
    }
    
    public function register() {
        // Only use this method to create your first admin user, then comment it out or remove it
        $this->load->view('auth/register');
    }
    
    public function create_user() {
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/register');
        } else {
            $data = array(
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password')
            );
            
            if ($this->user_model->create_user($data)) {
                redirect('login');
            } else {
                $this->session->set_flashdata('error', 'Failed to create user');
                redirect('register');
            }
        }
    }
    
    public function process_login() {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/login');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            if ($this->user_model->validate_login($username, $password)) {
                $this->session->set_userdata('logged_in', TRUE);
                $this->session->set_userdata('username', $username);
                redirect('admin/blog');
            } else {
                $this->session->set_flashdata('error', 'Invalid username or password');
                redirect('login');
            }
        }
    }
    
    public function logout() {
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('username');
        redirect('login');
    }
}
