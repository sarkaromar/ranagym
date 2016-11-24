<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class App_settings extends CI_Controller {

    /**
     * App_settings of this application
     * 
     * 
     * @author Mostafijur Rahman
     * @author_contact - http://www.mostafijur-rahman.com/
     */
    
    public function __construct() {
        parent::__construct();
        $this->load->model("settings_model");
        if (!$this->user->loggedin) {
            redirect(site_url("login"));
        }
    }

    // *** index ---------------------------------------------------------------
    public function index() {
        if (!$this->user->info->user_level == 2) {
            $this->template->error(lang("error_7"));
        }
        $this->template->loadData("title", array("title" => "Application Settings"));
        $this->template->loadData("activeLink", array("app_settings" => array("app_settings" => 1)));
        if ($_POST) {
            $rules = $this->app_settings_valid();
            $this->load->library('form_validation');
            $this->form_validation->set_rules($rules);
            if ($this->form_validation->run() == FALSE) {
                $this->template->error(lang("error_60"));
            } else {
                $data = array();
                $data['site_name'] = $this->common->nohtml($this->input->post("site_name", true));
                $data['site_desc'] = $this->common->nohtml($this->input->post("site_desc", true));
                $data['site_email'] = $this->common->nohtml($this->input->post("site_email", true));
                $this->settings_model->update_app_setting($data);
                $this->session->set_flashdata("globalmsg", lang("success_3"));
                redirect(site_url("app_settings"));
            }
        }
        $total = $this->settings_model->get_total_ip();
        $this->template->loadContent("admin/app_settings/settings.php", array("total" => $total));
    }

    // *** valid global setting info -------------------------------------------
    protected function app_settings_valid() {
        $rules = array(
            array(
                'field' => 'site_name',
                'label' => $this->lang->line("site_name"),
                'rules' => 'trim|required|xss_clean|max_length[50]'
            ),
            array(
                'field' => 'site_desc',
                'label' => $this->lang->line("site_desc"),
                'rules' => 'trim|required|xss_clean|max_length[100]'
            ),
            array(
                'field' => 'site_email',
                'label' => $this->lang->line("site_email"),
                'rules' => 'trim|required|xss_clean|max_length[256]|valid_email'
            )
        );

        return $rules;
    }

    // *** ip black list -------------------------------------------------------
    public function pay_settings() {
        if (!$this->user->info->user_level == 2) {
            $this->template->error(lang("error_7"));
        }
        $this->template->loadData("title", array("title" => "Payment Settings"));
        $this->template->loadData("activeLink", array("app_settings" => array("app_settings" => 1)));
        if ($_POST) {
            $rules = $this->pay_settings_valid();
            $this->load->library('form_validation');
            $this->form_validation->set_rules($rules);
            if ($this->form_validation->run() == FALSE) {
                $this->template->error(lang("error_60"));
            } else {
                $data = array();
                $data['adm_amount'] = $this->common->nohtml($this->input->post("adm_amount", true));
                $data['month_amount'] = $this->common->nohtml($this->input->post("month_amount", true));
                $this->settings_model->update_app_setting($data);
                $this->session->set_flashdata("globalmsg", lang("success_3"));
                redirect(site_url("app_settings/pay_settings"));
            }
        }
        $total = $this->settings_model->get_total_ip();
        $this->template->loadContent("admin/app_settings/payment.php", array("total" => $total));
    }

    // *** valid global setting info -------------------------------------------
    protected function pay_settings_valid() {
        $rules = array(
            array(
                'field' => 'adm_amount',
                'label' => $this->lang->line("adm_amount"),
                'rules' => 'trim|required|xss_clean|max_length[7]'
            ),
            array(
                'field' => 'month_amount',
                'label' => $this->lang->line("month_amount"),
                'rules' => 'trim|required|xss_clean|max_length[7]'
            )
        );
        return $rules;
    }

    // *** ip black list -------------------------------------------------------
    public function ip_black_list() {
        if (!$this->user->info->user_level == 2) {
            $this->template->error(lang("error_7"));
        }
        $this->template->loadData("title", array("title" => "IP black lise"));
        $this->template->loadData("activeLink", array("app_settings" => array("app_settings" => 1)));
        $total = $this->settings_model->get_total_ip();
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'admin_panel/ip_black_list';
        $config['total_rows'] = $total;
        $config['per_page'] = 100;
        include (APPPATH . "/config/page_config.php");
        $this->pagination->initialize($config);
        $ip_lists = $this->settings_model->get_ip_black_list($config['per_page'], $this->uri->segment(3));
        $this->template->loadContent("admin/app_settings/ip_black_list.php", array("ip_lists" => $ip_lists, "total" => $total));
    }

    // *** add black ip --------------------------------------------------------
    public function add_black_ip() {
        if (!$this->user->info->user_level == 2) {
            $this->template->error(lang("error_7"));
        }
        if ($_POST) {
            $rules = $this->black_ip_valid();
            $this->load->library('form_validation');
            $this->form_validation->set_rules($rules);
            if ($this->form_validation->run() == FALSE) {
                $this->template->error(lang("error_60"));
            } else {
                $data = array();
                $data['IP'] = $this->common->nohtml($this->input->post("IP"));
                $data['reason'] = $this->common->nohtml($this->input->post("reason"));
                $this->settings_model->insert_black_ip($data);
                redirect(site_url("app_settings/ip_black_list"));
            }
        } else {
            redirect(site_url("app_settings/ip_black_list"));
        }
    }

    // *** black ip valid ------------------------------------------------------
    protected function black_ip_valid() {
        $rules = array(
            array(
                'field' => 'IP',
                'label' => $this->lang->line("IP"),
                'rules' => 'trim|required|xss_clean|max_length[50]'
            ),
            array(
                'field' => 'reason',
                'label' => $this->lang->line("reason"),
                'rules' => 'trim|required|xss_clean|max_length[100]'
            )
        );
        return $rules;
    }

    // *** delete black ip -----------------------------------------------------
    public function delete_black_ip() {
        if (!$this->user->info->user_level == 2) {
            $this->template->error(lang("error_7"));
        }
        if ($_POST) {
            $rules = $this->ip_id_valid();
            $this->load->library('form_validation');
            $this->form_validation->set_rules($rules);
            if ($this->form_validation->run() == FALSE) {
                $this->template->error(lang("error_60"));
            } else {
                $id = $this->common->nohtml($this->input->post("id"));
                $this->settings_model->delete_black_ip($id);
                redirect(site_url("app_settings/ip_black_list"));
            }
        } else {
            redirect(site_url("app_settings/ip_black_list"));
        }
    }

    // *** black ip id valid ---------------------------------------------------
    protected function ip_id_valid() {
        $rules = array(
            array(
                'field' => 'id',
                'label' => $this->lang->line("id"),
                'rules' => 'trim|required|xss_clean|max_length[3]'
            )
        );
        return $rules;
    }

}