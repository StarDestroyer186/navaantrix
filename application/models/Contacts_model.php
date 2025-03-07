<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contacts_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    // Fetch all blogs
    public function get_all_contacts() {
        $this->db->order_by('created_at', 'DESC'); // Latest blogs first
        $query = $this->db->get('contact_form'); // Fetch from 'blogs' table
        return $query->result_array(); // Return as array
    }

	public function update_contact($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('contact_form', $data);
    }

    // Delete a blog post
    public function delete_contact($id) {
        $this->db->where('id', $id);
        return $this->db->delete('contact_form');
    }
}
?>
