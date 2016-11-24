<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User {

    var $info = array();
    var $loggedin = false;
    var $u = null;
    var $p = null;
    var $oauth_provider = null;
    var $oauth_id = null;
    var $oauth_token = null;
    var $oauth_secret = null;

    public function __construct() {

        $CI = & get_instance();

        $config = $CI->config->item("cookieprefix");

        $this->u = $CI->input->cookie($config . "un", TRUE);
        $this->p = $CI->input->cookie($config . "tkn", TRUE);

        $this->oauth_provider = $CI->input->cookie($config . "provider", TRUE);
        $this->oauth_id = $CI->input->cookie($config . "oauthid", TRUE);
        $this->oauth_token = $CI->input->cookie($config . "oauthtoken", TRUE);
        $this->oauth_secret = $CI->input->cookie($config . "oauthsecret", TRUE);

        $user = null;

        if ($this->u && $this->p && empty($this->oauth_provider)) {

            $user = $CI->db->select("id, email, user_level, username, first_name, last_name, avatar, online_timestamp")
                    ->where("email", $this->u)->where("token", $this->p)
                    ->get("users");
        }

        if ($user !== null) {

            if ($user->num_rows() == 0) {
                $this->loggedin = false;
            } else {
                $this->loggedin = true;
                
                $this->info = $user->row();

                if ($this->info->online_timestamp < time() - 60 * 5) {
                    $this->update_online_timestamp($this->info->id);
                }

                if ($this->info->user_level == -1) {
                    $CI->load->helper("cookie");
                    $this->loggedin = false;
                    $CI->session->set_flashdata("banned_msg", lang("error_3"));
                    //$this->session->set_flashdata("globalmsg", lang("error_3"));
                    delete_cookie($config . "un");
                    delete_cookie($config . "tkn");
                    redirect(site_url("login/banned"));
                }
            }
        }
    }

    public function getPassword() {
        $CI = & get_instance();
        $user = $CI->db->select("users.`password`")
                        ->where("id", $this->info->ID)->get("users");
        $user = $user->row();
        return $user->password;
    }

    public function update_online_timestamp($userid) {
        $CI = & get_instance();
        $CI->db->where("id", $userid)->update("users", array(
            "online_timestamp" => time()
                )
        );
    }

}

?>