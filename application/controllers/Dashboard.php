<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    /**
     * Dashboard of this application
     * 
     * 
     * @author Mostafijur Rahman
     * @author_contact - http://www.mostafijur-rahman.com/
     */
    
    public function __construct() {
        parent::__construct();
        $this->load->model("gym_model");
        $this->load->model("user_model");
        $this->load->model("settings_model");
        if (!$this->user->loggedin) {
            redirect(site_url("login"));
        }
    }

    // *** Dashboard -----------------------------------------------------------
    public function index() {
        $this->template->loadData("title", array("title" => "Welcome to Dashboard"));
        $this->template->loadData("activeLink", array("dashboard" => array("dashboard" => 1)));

        $member_total = $this->gym_model->get_member_total();
        $remove_total = $this->gym_model->get_remove_total();
        $total_user = $this->user_model->get_total_user();
        $total_ip = $this->settings_model->get_total_ip();
        $coll_of_the_month = $this->gym_model->coll_of_the_month();
        $due_of_the_month = $this->gym_model->due_of_the_month();
        $grand_total_adm_due = $this->gym_model->grand_total_adm_due();
        $grand_total_mon_due = $this->gym_model->grand_total_mon_due();

        $this->template->loadContent("admin/dashboard/dashboard.php", array(
            "member_total" => $member_total,
            "remove_total" => $remove_total,
            "total_user" => $total_user,
            "coll_of_the_month" => $coll_of_the_month,
            "due_of_the_month" => $due_of_the_month,
            "grand_total_adm_due" => $grand_total_adm_due,
            "grand_total_mon_due" => $grand_total_mon_due,
            "total_ip" => $total_ip
                )
        );
    }

}