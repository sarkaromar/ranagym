<?php defined('BASEPATH') OR exit('No direct script access allowed');

 class User_Model extends CI_Model {

    /**
     * User_Model of this application
     * 
     * 
     * @author Mostafijur Rahman
     * @author_contact - http://www.mostafijur-rahman.com/
     */
     
    // *** check block ip ------------------------------------------------------
    public function check_block_ip() {
        $s = $this->db->where("IP", $_SERVER['REMOTE_ADDR'])->get("ip_black_list");
        if ($s->num_rows() == 0)
            return false;
        return true;
    }

    // *** get user list -------------------------------------------------------
    public function get_user_list($per_page, $uri_segment) {
        if ($uri_segment == NULL) {
            $uri_segment = 0;
        }
        $r = $this->db->select('id, username, first_name, last_name, email, phn1, user_level')->from('users')->limit($per_page, $uri_segment)->get();
        $results = $r->result();
        return $results;
    }

    // *** get total user  -----------------------------------------------------
    public function get_total_user() {
        return $this->db->count_all('users');
    }

    // *** user active ---------------------------------------------------------
    public function user_active($id, $as) {
        $result = $this->db->where('id', $id)->set('user_level', $as)->update('users');
        return $result;
    }

    // *** user banned ---------------------------------------------------------
    public function user_banned($id) {
        $result = $this->db->where('id', $id)->set('user_level', '-1')->update('users');
        return $result;
    }

    // *** user delete ---------------------------------------------------------
    public function user_delete($id) {
        $result = $this->db->where("id", $id)->delete("users");
        return $result;
    }

    // *** add_new_user --------------------------------------------------------
    public function add_new_user($data) {
        $this->db->insert('users', $data);
    }

    // *** getuser by id -------------------------------------------------------
    public function get_user_by_id($id) {
        return $this->db->select('id, email, user_level, username, first_name, last_name, phn1, phn2, area, add, avatar, joined_date')->where("id", $id)->get("users");
    }

    // *** update info ---------------------------------------------------------
    public function update_info($id, $data) {
        $this->db->where('id', $id)->update('users', $data);
    }

    // *** update img info -----------------------------------------------------
    public function update_img_info($id, $avatar) {
        $result = $this->db->where('id', $id)->set('avatar', $avatar)->update('users', $data);
        return $result;
    }

    // *** update pass ---------------------------------------------------------
    public function update_pass($id, $password) {
        $result = $this->db->where('id', $id)->set('password', $password)->update('users');
        return $result;
    }

}