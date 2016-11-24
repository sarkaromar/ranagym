<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

    /**
     * Users of this application
     * 
     * 
     * @author Mostafijur Rahman
     * @author_contact - http://www.mostafijur-rahman.com/
     */
    
    public function __construct() {
        parent::__construct();
        $this->load->model("user_model");

        if (!$this->user->loggedin) {
            redirect(site_url("login"));
        }
    }

    // *** user list -----------------------------------------------------------
    public function user_list() {
        if (!$this->user->info->user_level == 1 && 2) {
            $this->template->error(lang("error_7"));
        }
        $this->template->loadData("title", array("title" => "Users"));
        $this->template->loadData("activeLink", array("users" => array("users" => 1)));
        $total = $this->user_model->get_total_user();
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'admin_panel/user_list';
        $config['total_rows'] = $total;
        $config['per_page'] = 15;
        include (APPPATH . "/config/page_config.php");
        $this->pagination->initialize($config);
        $user_lists = $this->user_model->get_user_list($config['per_page'], $this->uri->segment(3));
        $this->template->loadContent("admin/users/user_list.php", array("user_lists" => $user_lists, "total" => $total));
    }

    // *** active user ---------------------------------------------------------
    public function user_active() {
        if ($_POST) {
            $rules = $this->user_id_valid_with_as();
            $this->load->library('form_validation');
            $this->form_validation->set_rules($rules);
            if ($this->form_validation->run() == FALSE) {
                $this->template->error(lang("error_4"));
            } else {
                $id = $this->common->nohtml($this->input->post("id"));
                $as = $this->common->nohtml($this->input->post("as"));
                $result = $this->user_model->user_active($id, $as);
                if ($result) {
                    redirect(site_url("users/user_list"));
                }
            }
        }
    }

    // *** banned user ---------------------------------------------------------
    public function user_banned() {
        redirect(site_url("users/user_list"));

       /* if ($_POST) {
            $rules = $this->user_id_valid();
            $this->load->library('form_validation');
            $this->form_validation->set_rules($rules);
            if ($this->form_validation->run() == FALSE) {
                $this->template->error(lang("error_63"));
            } else {
                $id = $this->common->nohtml($this->input->post("id"));
                $result = $this->user_model->user_banned($id);
                if ($result) {
                    redirect(site_url("users/user_list"));
                }
            }
        }
        */
    }

    // *** User delete ---------------------------------------------------------
    public function user_delete() {
        redirect(site_url("users/user_list"));

        /*
        if ($_POST) {
            $rules = $this->user_id_valid();
            $this->load->library('form_validation');
            $this->form_validation->set_rules($rules);
            if ($this->form_validation->run() == FALSE) {
                $this->template->error(lang("error_63"));
            } else {
                $id = $this->common->nohtml($this->input->post("id"));
                $result = $this->user_model->user_delete($id);
                if ($result) {
                    redirect(site_url("users/user_list"));
                }
            }
        }*/
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

    // *** user id valid as ----------------------------------------------------
    protected function user_id_valid_with_as() {
        $rules = array(
            array(
                'field' => 'id',
                'label' => $this->lang->line("id"),
                'rules' => 'trim|required|min_length[1]|max_length[9]|xss_clean'
            ),
            array(
                'field' => 'as',
                'label' => $this->lang->line("as"),
                'rules' => 'trim|required|min_length[1]|max_length[2]|xss_clean'
            )
        );
        return $rules;
    }

    // *** user details -------------------------------------------------------
    public function user_details($id) {
        if (!$this->user->info->user_level == 1 && 2) {
            $this->template->error(lang("error_7"));
        }
        $this->template->loadData("title", array("title" => "User Details"));
        $this->template->loadData("activeLink", array("users" => array("users" => 1)));
        if (empty($id))
            $this->template->error(lang("error_51"));
        $user = $this->user_model->get_user_by_id($id);
        if ($user->num_rows() == 0)
            $this->template->error(lang("error_52"));
        $user = $user->row();
        $total = $this->user_model->get_total_user();
        $this->template->loadContent("admin/users/user_details.php", array("user" => $user, "total" => $total));
    }

    // *** add new user --------------------------------------------------------
    public function add_new_user() {
        if (!$this->user->info->user_level == 1 && 2) {
            $this->template->error(lang("error_7"));
        }
        $this->template->loadData("title", array("title" => "Add New User"));
        $this->template->loadData("activeLink", array("users" => array("users" => 1)));
        if ($_POST) {
            $rules = $this->add_new_user_rules();
            $this->load->library('form_validation');
            $this->form_validation->set_rules($rules);
            if ($this->form_validation->run() == FALSE) {
                if (!$this->user->info->user_level == 1 && 2) {
                    $this->template->error(lang("error_7"));
                }
                $this->template->loadData("title", array("title" => "Add New User"));
                $this->template->loadData("activeLink", array("users" => array("users" => 1)));
                $total = $this->user_model->get_total_user();
                $this->template->loadContent("admin/users/add_new_user.php", array("total" => $total));
            } else {
                $data = array();
                $data['first_name'] = $this->common->nohtml($this->input->post("first_name", true));
                $data['last_name'] = $this->common->nohtml($this->input->post("last_name", true));
                $data['area'] = $this->common->nohtml($this->input->post("area", true));
                $data['email'] = $this->common->nohtml($this->input->post("email", true));
                $data['add'] = $this->common->nohtml($this->input->post("add", true));
                $data['phn1'] = $this->common->nohtml($this->input->post("phn1", true));
                $data['phn2'] = $this->common->nohtml($this->input->post("phn2", true));
                $data['username'] = $this->common->nohtml($this->input->post("username", true));
                $password = $this->common->nohtml($this->input->post("password", true));
                $data['password'] = $this->common->encrypt($password);
                $data['user_level'] = $this->common->nohtml($this->input->post("user_level", true));
                $this->user_model->add_new_user($data);
                $this->session->set_flashdata("globalmsg", lang("success_2"));
                redirect(site_url("users/add_new_user"));
            }
        } else {
            $total = $this->user_model->get_total_user();
            $this->template->loadContent("admin/users/add_new_user.php", array("total" => $total));
        }
    }

    // *** add new user valid --------------------------------------------------
    protected function add_new_user_rules() {
        $rules = array(
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
                'field' => 'email',
                'label' => $this->lang->line("email"),
                'rules' => 'trim|required|valid_email|xss_clean|max_length[256]'
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
                'field' => 'username',
                'label' => $this->lang->line("username"),
                'rules' => 'trim|required|xss_clean|max_length[20]'
            ),
            array(
                'field' => 'password',
                'label' => $this->lang->line("password"),
                'rules' => 'trim|required|min_length[5]|xss_clean'
            ),
            array(
                'field' => 'con_password',
                'label' => $this->lang->line("con_password"),
                'rules' => 'trim|required|min_length[5]|matches[password]|xss_clean'
            ),
            array(
                'field' => 'user_level',
                'label' => $this->lang->line("user_level"),
                'rules' => 'trim|required|xss_clean'
            )
        );
        return $rules;
    }

    // *** updatr user in ------------------------------------------------------
    public function update_info() {
        if (!$this->user->info->user_level == 1 && 2) {
            $this->template->error(lang("error_7"));
        }
        if ($_POST) {
            $rules = $this->update_info_rules();
            $this->load->library('form_validation');
            $this->form_validation->set_rules($rules);
            if ($this->form_validation->run() == FALSE) {
                echo "error";
            } else {
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
                redirect(site_url("users/user_details/" . $id));
            }
        } else {
            redirect(site_url("users/user_list"));
        }
    }

    // *** add new user valid --------------------------------------------------
    protected function update_info_rules() {
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
    public function update_image() {
        if (!$this->user->info->user_level == 1 && 2) {
            $this->template->error(lang("error_7"));
        }
        if ($_POST) {
            $rules = $this->user_id_valid();
            $this->load->library('form_validation');
            $this->form_validation->set_rules($rules);
            if ($this->form_validation->run() == FALSE) {
                echo "error";
            } else {
                if (empty($_FILES['pro_image']['name'])) {
                    $this->template->error(lang("error_62"));
                } else {
                    // image name process
                    $id = $this->common->nohtml($this->input->post("id", true));
                    $avatar = $id;
                    $path = strtolower($_FILES['pro_image']['name']);
                    $avatar = "$avatar" . "." . pathinfo($path, PATHINFO_EXTENSION);
                    // load libr and init 
                    $config['upload_path'] = './uploads/admin/img/profile/';
                    $config['file_ext_tolower'] = TRUE;
                    $config['overwrite'] = TRUE;
                    $config['max_filename'] = 200;
                    $config['file_name'] = $avatar;
                    $config['remove_spaces'] = TRUE;
                    $config['allowed_types'] = 'jpg|gif|png';
                    $config['max_size'] = '1024';
                    $config['xss_clean'] = TRUE;
                    $config['max_width'] = 960;
                    $config['max_height'] = 640;
                    $this->load->library('upload', $config);
                    // uploading
                    if (!$this->upload->do_upload('pro_image')) {
                        $this->template->error($this->upload->display_errors());
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $path = $data['upload_data']['full_path'];
                        // Image resize
                        $config_resize['image_library'] = 'gd2';
                        $config_resize['source_image'] = $path;
                        $config_resize['create_thumb'] = FALSE;
                        $config_resize['maintain_ratio'] = FALSE;
                        $config_resize['quality'] = '100%';
                        $config_resize['width'] = 160;
                        $config_resize['height'] = 160;
                        // load and init
                        $this->load->library('image_lib');
                        $this->image_lib->initialize($config_resize);
                        // Image resizing
                        if (!$this->image_lib->resize()) {
                            $this->template->error($this->image_lib->display_errors());
                        } else {
                            // redirect
                            $result = $this->user_model->update_img_info($id, $avatar);
                            if ($result) {
                                $this->session->set_flashdata("globalmsg", lang("success_25"));
                                redirect(site_url("users/user_details/" . $id));
                            }
                        }
                    }
                }
            }
        } else {
            redirect(site_url("users/user_list"));
        }
    }

}