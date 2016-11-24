<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Settings_model extends CI_Model {

    /**
     * Settings_model of this application
     * 
     * 
     * @author Mostafijur Rahman
     * @author_contact - http://www.mostafijur-rahman.com/
     */
    
    // *** update site logo ----------------------------------------------------
    public function update_site_logo($avatar) {
        $this->db->where('id', 1)->set('site_logo', $avatar)->update('site_settings');
    }

    // *** update settings info ------------------------------------------------
    public function update_app_setting($data) {
        $this->db->where('id', 1)->update('settings', $data);
    }

    // *** check block ip ------------------------------------------------------
    public function get_ip_black_list($per_page, $uri_segment) {
        if ($uri_segment == NULL) {
            $uri_segment = 0;
        }
        $r = $this->db->select('id, IP, date, reason')->from('ip_black_list')->order_by('id, IP, date, reason', 'asc')->limit($per_page, $uri_segment)->get();
        $results = $r->result();
        return $results;
    }

    // *** get total ip --------------------------------------------------------
    public function get_total_ip() {
        return $this->db->count_all('ip_black_list');
    }

    // *** insert black ip -----------------------------------------------------
    public function insert_black_ip($data) {
        $this->db->insert('ip_black_list', $data);
    }

    // *** delete black ip -----------------------------------------------------
    public function delete_black_ip($id) {
        return $this->db->where('id', $id)->delete('ip_black_list');
    }

}
