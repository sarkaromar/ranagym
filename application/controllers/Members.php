<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Members extends CI_Controller {

    /**
     * Members of this application
     * 
     * 
     * @author Mostafijur Rahman
     * @author_contact - http://www.mostafijur-rahman.com/
     */
    
    public function __construct() {
        parent::__construct();
        $this->load->model("gym_model");
        if (!$this->user->loggedin) {
            redirect(site_url("login"));
        }
    }

    // *** add Member ----------------------------------------------------------
    public function add_member() {
        if (!$this->user->info->user_level == 1 && 2) {
            $this->template->error(lang("error_7"));
        }
        $this->template->loadData("title", array("title" => "Add New Member"));
        $this->template->loadData("activeLink", array("members" => array("members" => 1)));
        $this->template->load_css(
                '<link rel="stylesheet" href="' . base_url() . 'theme/admin/plugins/datepicker/datepicker3.css">'
        );
        $this->template->load_js(
                '<script src="' . base_url() . 'theme/admin/extra/moment.min.js"></script>
        <script src="' . base_url() . 'theme/admin/plugins/datepicker/bootstrap-datepicker.js"></script>
        <script type="text/javascript">
            // datpicker for birth
            $(function(){
                $("#datepicker_birth").datepicker({
                    autoclose: true
                });
            });
        </script>'
        );
        if ($_POST) {
            $rules = $this->add_member_valid();
            $this->load->library('form_validation');
            $this->form_validation->set_rules($rules);
            if ($this->form_validation->run() == FALSE) {
                $this->template->loadData("title", array("title" => "Add New Member"));
                $this->template->loadData("activeLink", array("members" => array("members" => 1)));
                $this->template->load_css(
                        '<link rel="stylesheet" href="' . base_url() . 'theme/admin/plugins/datepicker/datepicker3.css">'
                );
                $this->template->load_js(
                        '<script src="' . base_url() . 'theme/admin/extra/moment.min.js"></script>
                 <script src="' . base_url() . 'theme/admin/plugins/datepicker/bootstrap-datepicker.js"></script>
                 <script type="text/javascript">
                     // datpicker for birth
                     $(function(){
                         $("#datepicker_birth").datepicker({
                             autoclose: true
                         });
                     });
                 </script>'
                );
                $member_total = $this->gym_model->get_member_total();
                $remove_total = $this->gym_model->get_remove_total();
                $this->template->loadContent("admin/members/add_member.php", array("member_total" => $member_total, "remove_total" => $remove_total));
            } else {
                $data = array();
                $data['mem_id'] = $this->common->nohtml($this->input->post("mem_id", true));
                $data['first_name'] = $this->common->nohtml($this->input->post("first_name", true));
                $data['last_name'] = $this->common->nohtml($this->input->post("last_name", true));
                $data['gen'] = $this->common->nohtml($this->input->post("gen", true));
                $data['bld_grp'] = $this->common->nohtml($this->input->post("bld_grp", true));
                $data['birth'] = $this->common->nohtml($this->input->post("birth", true));
                $data['area'] = $this->common->nohtml($this->input->post("area", true));
                $data['add'] = $this->common->nohtml($this->input->post("add", true));
                $data['phn1'] = $this->common->nohtml($this->input->post("phn1", true));
                $data['phn2'] = $this->common->nohtml($this->input->post("phn2", true));
                $this->gym_model->add_member($data);
                $this->session->set_flashdata("globalmsg", lang("success_1"));
                redirect(site_url("members/add_member"));
            }
        } else {
            $member_total = $this->gym_model->get_member_total();
            $remove_total = $this->gym_model->get_remove_total();
            $this->template->loadContent("admin/members/add_member.php", array("member_total" => $member_total, "remove_total" => $remove_total));
        }
    }

    // *** add member validation -----------------------------------------------
    protected function add_member_valid() {
        $rules = array(
            array(
                'field' => 'mem_id',
                'label' => $this->lang->line("mem_id"),
                'rules' => 'trim|required|xss_clean|max_length[5]'
            ),
            array(
                'field' => 'first_name',
                'label' => $this->lang->line("first_name"),
                'rules' => 'trim|required|xss_clean|max_length[30]'
            ),
            array(
                'field' => 'last_name',
                'label' => $this->lang->line("last_name"),
                'rules' => 'trim|required|xss_clean|max_length[20]'
            ),
            array(
                'field' => 'gen',
                'label' => $this->lang->line("gen"),
                'rules' => 'trim|required|xss_clean|max_length[8]'
            ),
            array(
                'field' => 'bld_grp',
                'label' => $this->lang->line("bld_grp"),
                'rules' => 'trim|required|xss_clean|max_length[5]'
            ),
            array(
                'field' => 'birth',
                'label' => $this->lang->line("last_name"),
                'rules' => 'trim|required|xss_clean|max_length[10]'
            ),
            array(
                'field' => 'area',
                'label' => $this->lang->line("area"),
                'rules' => 'trim|required|xss_clean|max_length[40]'
            ),
            array(
                'field' => 'add',
                'label' => $this->lang->line("add"),
                'rules' => 'trim|required|xss_clean|max_length[200]'
            ),
            array(
                'field' => 'phn1',
                'label' => $this->lang->line("phn1"),
                'rules' => 'trim|required|xss_clean|max_length[15]'
            ),
            array(
                'field' => 'phn2',
                'label' => $this->lang->line("phn2"),
                'rules' => 'trim|xss_clean|max_length[15]'
            )
        );
        return $rules;
    }

    // *** member list ---------------------------------------------------------
    public function member_list() {
        if (!$this->user->info->user_level == 1 && 2) {
            $this->template->error(lang("error_7"));
        }
        $this->template->loadData("title", array("title" => "Member List"));
        $this->template->loadData("activeLink", array("members" => array("members" => 1)));
        $total = $this->gym_model->get_total_members();
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'members/member_list';
        $config['total_rows'] = $total;
        $config['per_page'] = 10;
        include (APPPATH . "/config/page_config.php");
        $this->pagination->initialize($config);
        $member_lists = $this->gym_model->get_member_list($config['per_page'], $this->uri->segment(3));
        $member_total = $this->gym_model->get_member_total();
        $remove_total = $this->gym_model->get_remove_total();
        $this->template->loadContent("admin/members/member_list.php", array(
            "member_lists" => $member_lists,
            "member_total" => $member_total,
            "remove_total" => $remove_total,
                )
        );
    }

    // *** update membe --------------------------------------------------------
    public function update_member() {
        if (!$this->user->info->user_level == 1 && 2) {
            $this->template->error(lang("error_7"));
        }
        if ($_POST) {
            $rules = $this->add_member_valid();
            $this->load->library('form_validation');
            $this->form_validation->set_rules($rules);
            if ($this->form_validation->run() == FALSE) {
                echo "update error";
            } else {
                $data = array();
                $data['mem_id'] = $this->common->nohtml($this->input->post("mem_id", true));
                $data['first_name'] = $this->common->nohtml($this->input->post("first_name", true));
                $data['last_name'] = $this->common->nohtml($this->input->post("last_name", true));
                $data['area'] = $this->common->nohtml($this->input->post("area", true));
                $data['add'] = $this->common->nohtml($this->input->post("add", true));
                $data['phn1'] = $this->common->nohtml($this->input->post("phn1", true));
                $data['phn2'] = $this->common->nohtml($this->input->post("phn2", true));
                $id = $this->common->nohtml($this->input->post("id", true));
                $this->gym_model->update_member($data, $id);
                redirect(site_url("members/member_list"));
            }
        } else {
            redirect(site_url("members/member_list"));
        }
    }

    // *** remove member -------------------------------------------------------
    public function remove_member() {
        if (!$this->user->info->user_level == 1 && 2) {
            $this->template->error(lang("error_7"));
        }
        if ($_POST) {
            $rules = $this->id_valid();
            $this->load->library('form_validation');
            $this->form_validation->set_rules($rules);
            if ($this->form_validation->run() == FALSE) {
                echo "remove error";
            } else {
                $id = $this->common->nohtml($this->input->post("id", true));
                $this->gym_model->remove_member($id);
                redirect(site_url("members/member_list"));
            }
        } else {
            redirect(site_url("members/member_list"));
        }
    }

    // *** id valid ------------------------------------------------------------
    protected function id_valid() {
        $rules = array(
            array(
                'field' => 'id',
                'label' => $this->lang->line("id"),
                'rules' => 'trim|required|xss_clean|max_length[4]'
            )
        );
        return $rules;
    }

    // *** remove list ---------------------------------------------------------
    public function remove_list() {
        if (!$this->user->info->user_level == 1 && 2) {
            $this->template->error(lang("error_7"));
        }
        $this->template->loadData("title", array("title" => "Member List"));
        $this->template->loadData("activeLink", array("members" => array("members" => 1)));
        $total = $this->gym_model->get_total_remove_members();
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'members/remove_list';
        $config['total_rows'] = $total;
        $config['per_page'] = 10;
        include (APPPATH . "/config/page_config.php");
        $this->pagination->initialize($config);
        $remove_lists = $this->gym_model->get_remove_member_list($config['per_page'], $this->uri->segment(3));
        $member_total = $this->gym_model->get_member_total();
        $remove_total = $this->gym_model->get_remove_total();
        $this->template->loadContent("admin/members/member_remove.php", array(
            "remove_lists" => $remove_lists,
            "member_total" => $member_total,
            "remove_total" => $remove_total,
                )
        );
    }

    // *** active member -------------------------------------------------------
    public function active_member() {
        if (!$this->user->info->user_level == 1 && 2) {
            $this->template->error(lang("error_7"));
        }
        if ($_POST) {
            $rules = $this->id_valid();
            $this->load->library('form_validation');
            $this->form_validation->set_rules($rules);
            if ($this->form_validation->run() == FALSE) {
                echo "remove error";
            } else {
                $id = $this->common->nohtml($this->input->post("id", true));
                $this->gym_model->active_member($id);
                redirect(site_url("members/remove_list"));
            }
        } else {
            redirect(site_url("members/remove_list"));
        }
    }

    // *** delete member -------------------------------------------------------
    public function delete_member() {
        if (!$this->user->info->user_level == 1 && 2) {
            $this->template->error(lang("error_7"));
        }
        if ($_POST) {
            $rules = $this->id_valid();
            $this->load->library('form_validation');
            $this->form_validation->set_rules($rules);
            if ($this->form_validation->run() == FALSE) {
                echo "remove error";
            } else {
                $id = $this->common->nohtml($this->input->post("id", true));
                $this->gym_model->delete_member($id);
                redirect(site_url("members/remove_list"));
            }
        } else {
            redirect(site_url("members/remove_list"));
        }
    }

}