<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_model extends CI_Model {

    public function insert_data($data) {
        return $this->db->insert('contact_form', $data);
    }
}
