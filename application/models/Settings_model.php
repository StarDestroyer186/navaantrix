<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings_model extends CI_Model {

    // Get a setting by key
    public function get_setting($key) {
        $query = $this->db->get_where('settings', array('key' => $key));
        return $query->row() ? $query->row()->value : null;
    }

    // Get all settings as an associative array
    public function get_all_settings() {
        $query = $this->db->get('settings');
        $result = $query->result();
        $settings = [];
        foreach ($result as $row) {
            $settings[$row->key] = $row->value;
        }
        return $settings;
    }

    // Update or insert setting
    public function save_setting($key, $value) {
        $existing = $this->db->get_where('settings', ['key' => $key])->row();
        if ($existing) {
            $this->db->where('key', $key)->update('settings', ['value' => $value]);
        } else {
            $this->db->insert('settings', ['key' => $key, 'value' => $value]);
        }
    }
}
?>
