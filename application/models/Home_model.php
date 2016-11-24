<?php defined('BASEPATH') OR exit('No direct script access allowed');

 class Home_model extends CI_Model {

    /**
     * Home_model of this application
     * 
     * 
     * @author Mostafijur Rahman
     * @author_contact - http://www.mostafijur-rahman.com/
     */
     
    // *** add notified email --------------------------------------------------
    public function add_notified_mail($data) {
        return $this->db->insert("notified_mail", $data);
    }

    // *** check email ---------------------------------------------------------
    public function check_email($email) {
        return $this->db->select("email")->where("email", $email)->get("notified_mail");
    }

    // *** get total email -----------------------------------------------------
    public function get_total_email() {
        return $this->db->count_all('notified_mail');
    }

    // *** check block ip ------------------------------------------------------
    public function get_email_list($per_page, $uri_segment) {
        if ($uri_segment == NULL) {
            $uri_segment = 0;
        }
        $r = $this->db->select('*')->from('notified_mail')->limit($per_page, $uri_segment)->get();
        $results = $r->result();
        return $results;
    }

    // *** delete email --------------------------------------------------------
    public function delete_email($ID) {
        return $this->db->where('ID', $ID)->delete('notified_mail');
    }

}
