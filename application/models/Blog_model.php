<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    // Fetch all blogs
    public function get_all_blogs() {
        $this->db->order_by('created_at', 'DESC'); // Latest blogs first
        $query = $this->db->get('blogs'); // Fetch from 'blogs' table
        return $query->result_array(); // Return as array
    }

    // Fetch a single blog by ID
    public function get_blog($id) {
        $query = $this->db->get_where('blogs', ['id' => $id]);
        return $query->row_array();
    }

    public function get_blog_by_slug($slug) {
        $query = $this->db->get_where('blogs', ['slug' => $slug]);
        return $query->row_array();
    }

    // Insert a new blog post
    public function insert_blog($data) {
        return $this->db->insert('blogs', $data);
    }

    // Update an existing blog post
    public function update_blog($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('blogs', $data);
    }

    // Delete a blog post
    public function delete_blog($id) {
        $this->db->where('id', $id);
        return $this->db->delete('blogs');
    }
}

