<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class My_profile extends CI_Controller {

    /**
     * My_profile of this application
     * 
     * 
     * @author Mostafijur Rahman
     * @author_contact - http://www.mostafijur-rahman.com/
     */
    
    public function __construct() {
        parent::__construct();
        $this->load->model("user_model");
        $this->load->model("login_model");
        if (!$this->user->loggedin) {
            redirect(site_url("login"));
        }
    }
        
    // *** index ---------------------------------------------------------------
    public function index(){
        $this->template->loadData("title", array("title" => "My Profile"));
        $this->template->loadData("activeLink", array("my_profile" => array("my_profile" => 1)));
        $id = $this->user->info->id;
        $user = $this->user_model->get_user_by_id($id);
        if($user->num_rows() == 0) $this->template->error(lang("error_52"));
        $user = $user->row();
        $this->template->loadContent("admin/my_profile/my_profile.php", array( "user" => $user));
        
    }
    
    // *** updatr profile ------------------------------------------------------
    public function update_info(){
        if(!$this->user->info->user_level == 1 && 2) {
            $this->template->error(lang("error_7"));
        }
        if($_POST){
            $rules = $this->update_info_rules();
            $this->load->library('form_validation');
            $this->form_validation->set_rules($rules);
            if ($this->form_validation->run() == FALSE){
                echo "error";
            }else{
                $data = array();
                $data['first_name'] = $this->common->nohtml($this->input->post("first_name", true));
                $data['last_name'] = $this->common->nohtml($this->input->post("last_name"));
                $data['username'] = $this->common->nohtml($this->input->post("username"));
                $data['user_level'] = $this->common->nohtml($this->input->post("user_level"));
                $data['email'] = $this->common->nohtml($this->input->post("email"));
                $data['phn1'] = $this->common->nohtml($this->input->post("phn1"));
                $data['phn2'] = $this->common->nohtml($this->input->post("phn2"));
                $data['area'] = $this->common->nohtml($this->input->post("area"));
                $data['add'] = $this->common->nohtml($this->input->post("add"));
                $id = $this->common->nohtml($this->input->post("id"));
                
                $this->user_model->update_info($id, $data);
                $this->session->set_flashdata("globalmsg", lang("success_3"));
                redirect(site_url("my_profile"));
            }
        }else{
            redirect(site_url("my_profile"));
        }
    }
    
    // *** add new user valid --------------------------------------------------
    protected function update_info_rules(){
        $rules = array(
            array(
                    'field' => 'id', 
                    'label' => $this->lang->line("id"),
                    'rules' => 'trim|required|xss_clean|max_length[9]'
            ),
            array(
                    'field' => 'first_name', 
                    'label' => $this->lang->line("first_name"),
                    'rules' => 'trim|required|xss_clean|max_length[30]'
            ),
            array(
                    'field' => 'last_name', 
                    'label' => $this->lang->line("last_name"),
                    'rules' => 'trim|xss_clean|max_length[20]'
            ),
            array(
                    'field' => 'username', 
                    'label' => $this->lang->line("username"),
                    'rules' => 'trim|required|xss_clean|max_length[20]'
            ),
            array(
                    'field' => 'user_level', 
                    'label' => $this->lang->line("user_level"),
                    'rules' => 'trim|required|xss_clean'
            ),
            array(
                    'field' => 'email', 
                    'label' => $this->lang->line("email"),
                    'rules' => 'trim|required|valid_email|xss_clean|max_length[256]'
            ),
            array(
                    'field' => 'phn1', 
                    'label' => $this->lang->line("phn1"),
                    'rules' => 'trim|required|xss_clean|max_length[15]'
            ),
            array(
                    'field' => 'phn2', 
                    'label' => $this->lang->line("phn2"),
                    'rules' => 'trim|required|xss_clean|max_length[15]'
            ),
            array(
                    'field' => 'area', 
                    'label' => $this->lang->line("area"),
                    'rules' => 'trim|required|xss_clean|max_length[40]'
            ),
            array(
                    'field' => 'add', 
                    'label' => $this->lang->line("add"),
                    'rules' => 'trim|required|xss_clean|max_length[256]'
            )
        );
        return $rules;
    }
    
    // *** update image --------------------------------------------------------
    public function update_image(){
        if(!$this->user->info->user_level == 1 && 2) {
            $this->template->error(lang("error_7"));
        }
        if($_POST){
            $rules = $this->user_id_valid();
            $this->load->library('form_validation');
            $this->form_validation->set_rules($rules);
            if ($this->form_validation->run() == FALSE){
                echo "error";
            }else{
                if(empty($_FILES['pro_image']['name'])){
                    $this->template->error(lang("error_62"));
                }else{
                    // image name process
                    $id = $this->common->nohtml($this->input->post("id", true));
                    $avatar = $id;
                    $path = strtolower($_FILES['pro_image']['name']);
                    $avatar = "$avatar".".".pathinfo($path, PATHINFO_EXTENSION);
                    // load libr and init 
                    $config['upload_path']     = './uploads/admin/img/profile/';
                    $config['file_ext_tolower'] = TRUE;
                    $config['overwrite']       = TRUE;
                    $config['max_filename']    = 200;
                    $config['file_name']       = $avatar;
                    $config['remove_spaces']   = TRUE;
                    $config['allowed_types']   = 'jpg|gif|png';
                    $config['max_size']        = '1024';
                    $config['xss_clean']       = TRUE;
                    $config['max_width']       = 960;
                    $config['max_height']      = 640;
                    $this->load->library('upload', $config);
                    // uploading
                    if(!$this->upload->do_upload('pro_image')){
                        $this->template->error($this->upload->display_errors());
                    }else{
                        $data = array('upload_data' => $this->upload->data()); 
                        $path = $data['upload_data']['full_path'];
                        // Image resize
                        $config_resize['image_library']   = 'gd2';
                        $config_resize['source_image']    = $path;
                        $config_resize['create_thumb']    = FALSE;
                        $config_resize['maintain_ratio']  = FALSE;
                        $config_resize['quality']         = '100%';
                        $config_resize['width']           = 160;
                        $config_resize['height']          = 160;
                        // load and init
                        $this->load->library('image_lib');
                        $this->image_lib->initialize($config_resize);
                        // Image resizing
                        if(!$this->image_lib->resize()){
                            $this->template->error($this->image_lib->display_errors());
                        }else{
                            $result = $this->user_model->update_img_info($id, $avatar);
                            if($result){
                                $this->session->set_flashdata("globalmsg", lang("success_3"));
                                redirect(site_url("my_profile"));
                            }
                        }
                    }
                }
            }
        }else{
            redirect(site_url("my_profile"));
        }
    }
    
    // *** profile update pass -------------------------------------------------
    public function pro_update_pass(){
        if(!$this->user->info->user_level == 1 && 2) {
            $this->template->error(lang("error_7"));
        }
        if($_POST){
            $old_pass = $this->common->nohtml($this->input->post("old_pass", true));
            $new_pass = $this->common->nohtml($this->input->post("new_pass", true));
            $con_pass = $this->common->nohtml($this->input->post("con_pass", true));
            // check blank
            if (empty($old_pass) || empty($new_pass) || empty($con_pass) && $new_pass == $con_pass ) {
                $this->template->error(lang("error_60"));
            }
            // get pass
            $info = $this->login_model->getUserByEmail($this->user->info->email);
            $r = $info->row();
            // check get pass and user input pass
            $phpass = new PasswordHash(12, false);
            if (!$phpass->CheckPassword($old_pass, $r->password)) {
                $this->template->error(lang("error_6"));
            }else{
                $id = $this->user->info->id;
                $password = $this->common->encrypt($con_pass);
                $result = $this->user_model->update_pass($id, $password);
                if($result){
                    $this->session->set_flashdata("globalmsg", lang("success_3"));
                    redirect(site_url("my_profile"));
                }
            }
        }else{
            redirect(site_url("my_profile"));
        }
    }
    
    // *** user id valid -------------------------------------------------------
    protected function user_id_valid() {
        $rules = array(
            array(
                'field' => 'id', 
                'label' => $this->lang->line("id"),
                'rules' => 'trim|required|min_length[1]|max_length[9]|xss_clean'
            ),
        );
        return $rules;
    }
}