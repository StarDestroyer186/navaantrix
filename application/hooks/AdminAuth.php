<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminAuth {
    private $CI;
    
    public function __construct() {
        $this->CI =& get_instance();
    }
    
    public function check_access() {
        $this->CI->load->library('session');
        
        // Get current URI segments
        $segment1 = $this->CI->uri->segment(1);
        $segment2 = $this->CI->uri->segment(2);
        
        // Check if it's an admin route
        if ($segment1 == 'admin') {
            // Check if user is logged in
            if (!$this->CI->session->userdata('logged_in')) {
                redirect('login');
            }
        }
    }
}
