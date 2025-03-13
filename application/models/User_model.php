<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function create_user($data) {
        // Hash the password
        $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
        return $this->db->insert('users', $data);
    }
    
    public function validate_login($username, $password) {
        $this->db->where('username', $username);
        $query = $this->db->get('users');
        
        if ($query->num_rows() == 1) {
            $user = $query->row();
            return password_verify($password, $user->password);
        }
        return false;
    }
}
