<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

    /**
     * Login of this application
     * 
     * 
     * @author Mostafijur Rahman
     * @author_contact - http://www.mostafijur-rahman.com/
     */
    
    public function __construct() {
        parent::__construct();
        $this->load->model("login_model");
        $this->load->model("user_model");
    }

    // *** index ---------------------------------------------------------------
    public function index() {
        $this->template->loadData("title", array("title" => "Login"));
        $this->template->set_layout("admin/layout/login_layout.php");
        $this->template->loadContent("admin/login/login.php");
    }

    // *** login check ---------------------------------------------------------
    public function loginCheck() {
        $this->template->set_error_view("admin/error/login_error.php");
        $this->template->set_layout("admin/layout/login_layout.php");
        // ip, logged pele error file a error msg send korbe
        if ($this->user_model->check_block_ip()) {
            $this->template->error(lang("error_26"));
        }
        // retrive logged info from cookie 
        $config = $this->config->item("cookieprefix");
        if ($this->user->loggedin) {
            $this->template->error(lang("error_27"));
        }
        // email, pass, remember input from post
        $email = $this->input->post("email", true);
        $pass = $this->common->nohtml($this->input->post("pass", true));
        $remember = $this->input->post("remember", true);
        // check email and pass blank
        if (empty($email) || empty($pass)) {
            $this->template->error(lang("error_28"));
        }
        // email match from DB
        $login = $this->login_model->getUserByEmail($email);
        if ($login->num_rows() == 0) {
            $this->template->error(lang("error_29"));
        }
        // user id load form fechted email info 
        $r = $login->row();
        $userid = $r->id;
        //pass hashing kora
        $phpass = new PasswordHash(12, false);
        if (!$phpass->CheckPassword($pass, $r->password)) {
            $this->template->error(lang("error_29"));
        }
        // Generate a token
        $token = rand(1, 100000) . $email;
        $token = md5(sha1($token));
        // token update by user id
        $this->login_model->updateUserToken($userid, $token);
        // if remenber create cookies
        if ($remember == 1) {
            $ttl = 3600 * 6;
        } else {
            $ttl = 3600 * 6;
        }
        setcookie($config . "un", $email, time() + $ttl, "/");
        setcookie($config . "tkn", $token, time() + $ttl, "/");
        redirect(site_url());
    }

    // *** logout --------------------------------------------------------------
    public function logout($hash) {
        $this->template->set_error_view("error/login_error.php");
        $config = $this->config->item("cookieprefix");
        $this->load->helper("cookie");
        if ($hash != $this->security->get_csrf_hash()) {
            $this->template->error(lang("error_6"));
        }
        delete_cookie($config . "un");
        delete_cookie($config . "tkn");
        delete_cookie($config . "provider");
        delete_cookie($config . "oauthid");
        delete_cookie($config . "oauthtoken");
        delete_cookie($config . "oauthsecret");
        $this->session->sess_destroy();
        redirect('login');
    }

    // *** banned --------------------------------------------------------------
    public function banned() {
        $this->template->set_error_view("admin/error/login_error.php");
        $this->template->set_layout("admin/layout/login_layout.php");
        $this->template->loadContent("admin/login/banned.php", array());
    }

}