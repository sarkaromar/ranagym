<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Settings {

    var $info = array();
    var $version = "1.0";

    public function __construct() {
        $CI = & get_instance();
        
        $site = $CI->db->select("site_name, site_desc, site_email, adm_amount, month_amount")->where("id", 1)->get("settings");
        if ($site->num_rows() == 0) {
            $CI->template->error("Missing the application settings database row.");
        } else {
            $this->info = $site->row();
        }
    }
}

?>