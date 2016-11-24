<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class View_payment extends CI_Controller {

    /**
     * View_payment of this application
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

    // *** add fee -------------------------------------------------------------
    public function add_fee() {
        $this->template->loadData("title", array("title" => "Add Fee"));
        $this->template->loadData("activeLink", array("pay" => array("pay" => 1)));
        $this->template->load_css(
                '<link rel="stylesheet" href="' . base_url() . 'theme/admin/plugins/datepicker/datepicker3.css">'
        );
        $this->template->load_js(
                '<script src="' . base_url() . 'theme/admin/extra/moment.min.js"></script>
        <script src="' . base_url() . 'theme/admin/plugins/datepicker/bootstrap-datepicker.js"></script>
        <script type="text/javascript">
            // datpicker for alert
            $(function(){
                $("#datepicker_alert").datepicker({
                    autoclose: true
                });
            });
            // datpicker for alert
            $(function(){
                $("#datepicker_alert2").datepicker({
                    autoclose: true
                });
            });
        </script>'
        );
        $this->template->loadContent("admin/view_payment/add_fee.php");
    }

    // *** add monthly fee -----------------------------------------------------
    public function add_mothly_fee() {
        if ($_POST) {
            $rules = $this->add_mothly_fee_valid();
            $this->load->library('form_validation');
            $this->form_validation->set_rules($rules);
            if ($this->form_validation->run() == FALSE) {
                echo "error on monthly fee";
            } else {
                $data = array();
                $data['mem_id'] = $this->common->nohtml($this->input->post("mem_id", true));
                $data['mon_fee'] = $this->common->nohtml($this->input->post("mon_fee", true));
                $data['mon_paid'] = $this->common->nohtml($this->input->post("mon_paid", true));
                $data['mon_due'] = $this->common->nohtml($this->input->post("mon_due", true));
                $data['month'] = $this->common->nohtml($this->input->post("month", true));
                $data['year'] = $this->common->nohtml($this->input->post("year", true));
                $this->gym_model->add_mothly_fee($data);
                $this->session->set_flashdata("globalmsg", lang("success_4"));
                redirect(site_url("view_payment/add_fee"));
            }
        } else {
            redirect(site_url("view_payment/add_fee"));
        }
    }

    // *** add monthly fee validation ------------------------------------------
    protected function add_mothly_fee_valid() {
        $rules = array(
            array(
                'field' => 'mon_fee',
                'label' => $this->lang->line("mon_fee"),
                'rules' => 'trim|required|xss_clean|max_length[7]'
            ),
            array(
                'field' => 'mem_id',
                'label' => $this->lang->line("mem_id"),
                'rules' => 'trim|required|xss_clean|max_length[5]'
            ),
            array(
                'field' => 'month',
                'label' => $this->lang->line("month"),
                'rules' => 'trim|required|xss_clean|max_length[10]'
            ),
            array(
                'field' => 'year',
                'label' => $this->lang->line("year"),
                'rules' => 'trim|required|xss_clean|max_length[4]'
            ),
            array(
                'field' => 'mon_paid',
                'label' => $this->lang->line("amount"),
                'rules' => 'trim|required|xss_clean|max_length[7]'
            ),
            array(
                'field' => 'mon_due',
                'label' => $this->lang->line("amount"),
                'rules' => 'trim|xss_clean|max_length[7]'
            )
        );
        return $rules;
    }

    // *** add admission fee ---------------------------------------------------
    public function add_adm_fee() {
        if ($_POST) {
            $rules = $this->add_adm_fee_valid();
            $this->load->library('form_validation');
            $this->form_validation->set_rules($rules);
            if ($this->form_validation->run() == FALSE) {
                echo "error on admission fee";
            } else {
                $data = array();
                $data['mem_id'] = $this->common->nohtml($this->input->post("mem_id", true));
                $data['adm_fee'] = $this->common->nohtml($this->input->post("adm_fee", true));
                $data['adm_paid'] = $this->common->nohtml($this->input->post("adm_paid", true));
                $data['adm_due'] = $this->common->nohtml($this->input->post("adm_due", true));
                $this->gym_model->add_adm_fee($data);
                $this->session->set_flashdata("globalmsg_tab", lang("success_3"));
                redirect(site_url("view_payment/add_fee"));
            }
        } else {
            redirect(site_url("view_payment/add_fee"));
        }
    }

    // *** add admission fee validation ----------------------------------------
    protected function add_adm_fee_valid() {
        $rules = array(
            array(
                'field' => 'adm_fee',
                'label' => $this->lang->line("adm_fee"),
                'rules' => 'trim|required|xss_clean|max_length[7]'
            ),
            array(
                'field' => 'mem_id',
                'label' => $this->lang->line("mem_id"),
                'rules' => 'trim|required|xss_clean|max_length[5]'
            ),
            array(
                'field' => 'adm_paid',
                'label' => $this->lang->line("amount"),
                'rules' => 'trim|required|xss_clean|max_length[7]'
            ),
            array(
                'field' => 'adm_due',
                'label' => $this->lang->line("amount"),
                'rules' => 'trim|xss_clean|max_length[7]'
            )
        );
        return $rules;
    }

    // *** fee report ----------------------------------------------------------
    public function fee_report() {
        $this->template->loadData("title", array("title" => "Fee Report"));
        $this->template->loadData("activeLink", array("pay" => array("pay" => 1)));
        $this->template->loadContent("admin/view_payment/fee_report.php");
    }

    // *** fee report ----------------------------------------------------------
    public function mem_id_base_report() {
        if ($_POST) {
            $rules = $this->mem_id_valid();
            $this->load->library('form_validation');
            $this->form_validation->set_rules($rules);
            if ($this->form_validation->run() == FALSE) {
                echo "error on mem_id_base_report";
            } else {
                $mem_id = $this->common->nohtml($this->input->post("mem_id", true));
                // member info
                $mem_info = $this->gym_model->get_mem_info_by_id($mem_id);
                // month report
                $mon_report = $this->gym_model->id_base_mon_report($mem_id);
                $total_mon_fee = $this->gym_model->total_mon_fee($mem_id);
                $total_mon_paid = $this->gym_model->total_mon_paid($mem_id);
                $total_mon_due = $this->gym_model->total_mon_due($mem_id);
                // admission report
                $adm_report = $this->gym_model->id_base_adm_report($mem_id);
                $total_adm_fee = $this->gym_model->total_adm_fee($mem_id);
                $total_adm_paid = $this->gym_model->total_adm_paid($mem_id);
                $total_adm_due = $this->gym_model->total_adm_due($mem_id);

                $this->session->set_flashdata("id_report", lang("success_3"));
                $this->template->loadData("title", array("title" => "Fee Report"));
                $this->template->loadData("activeLink", array("pay" => array("pay" => 1)));
                $this->template->loadContent("admin/view_payment/fee_report.php", array(
                    "mem_info" => $mem_info,
                    "mon_report" => $mon_report,
                    "total_mon_fee" => $total_mon_fee,
                    "total_mon_paid" => $total_mon_paid,
                    "total_mon_due" => $total_mon_due,
                    "adm_report" => $adm_report,
                    "total_adm_fee" => $total_adm_fee,
                    "total_adm_paid" => $total_adm_paid,
                    "total_adm_due" => $total_adm_due
                        )
                );
            }
        } else {
            redirect(site_url("view_payment/fee_report"));
        }
    }

    // *** mem id validatio ----------------------------------------------------
    protected function mem_id_valid() {
        $rules = array(
            array(
                'field' => 'mem_id',
                'label' => $this->lang->line("mem_id"),
                'rules' => 'trim|required|xss_clean|max_length[5]'
            )
        );
        return $rules;
    }

    // *** monthly collection report -------------------------------------------
    public function mon_coll_report() {
        if ($_POST) {
            $rules = $this->mon_coll_report_valid();
            $this->load->library('form_validation');
            $this->form_validation->set_rules($rules);
            if ($this->form_validation->run() == FALSE) {
                echo "error on month colle report";
            } else {
                $year = $this->common->nohtml($this->input->post("year", true));
                $month = $this->common->nohtml($this->input->post("month", true));
                $yearly_monthly_bill = $this->gym_model->yearly_monthly_bill($month, $year);
                $total_monthly_bill = $this->gym_model->total_monthly_bill($month, $year);
                $total_monthly_paid = $this->gym_model->total_monthly_paid($month, $year);
                $total_monthly_due = $this->gym_model->total_monthly_due($month, $year);

                $this->session->set_flashdata("mon_coll", lang("success_3"));
                $this->template->loadData("title", array("title" => "Fee Report"));
                $this->template->loadData("activeLink", array("pay" => array("pay" => 1)));
                $this->template->loadContent("admin/view_payment/fee_report.php", array(
                    "yearly_monthly_bill" => $yearly_monthly_bill,
                    "total_monthly_bill" => $total_monthly_bill,
                    "total_monthly_paid" => $total_monthly_paid,
                    "total_monthly_due" => $total_monthly_due,
                    "year" => $year,
                    "month" => $month
                        )
                );
            }
        } else {
            redirect(site_url("view_payment/fee_report"));
        }
    }

    // *** monthly collection report -------------------------------------------
    protected function mon_coll_report_valid() {
        $rules = array(
            array(
                'field' => 'year',
                'label' => $this->lang->line("year"),
                'rules' => 'trim|required|xss_clean|max_length[4]'
            ),
            array(
                'field' => 'month',
                'label' => $this->lang->line("month"),
                'rules' => 'trim|required|xss_clean|max_length[10]'
            )
        );
        return $rules;
    }

    // *** monthly collection report -------------------------------------------
    public function year_coll_report() {
        if ($_POST) {
            $rules = $this->year_coll_report_valid();
            $this->load->library('form_validation');
            $this->form_validation->set_rules($rules);
            if ($this->form_validation->run() == FALSE) {
                echo "error on yearly colle report";
            } else {
                $year = $this->common->nohtml($this->input->post("year", true));

                $yearly_bill_january = $this->gym_model->yearly_bill_january($year);
                $yearly_bill_february = $this->gym_model->yearly_bill_february($year);
                $yearly_bill_march = $this->gym_model->yearly_bill_march($year);

                $yearly_bill_april = $this->gym_model->yearly_bill_april($year);
                $yearly_bill_may = $this->gym_model->yearly_bill_may($year);
                $yearly_bill_june = $this->gym_model->yearly_bill_june($year);

                $yearly_bill_july = $this->gym_model->yearly_bill_july($year);
                $yearly_bill_august = $this->gym_model->yearly_bill_august($year);
                $yearly_bill_september = $this->gym_model->yearly_bill_september($year);

                $yearly_bill_october = $this->gym_model->yearly_bill_october($year);
                $yearly_bill_november = $this->gym_model->yearly_bill_november($year);
                $yearly_bill_december = $this->gym_model->yearly_bill_december($year);

                $total_yearly_bill = $this->gym_model->total_yearly_bill($year);
                $total_yearly_paid = $this->gym_model->total_yearly_paid($year);
                $total_yearly_due = $this->gym_model->total_yearly_due($year);

                $this->session->set_flashdata("year_coll", lang("success_3"));
                $this->template->loadData("title", array("title" => "Fee Report"));
                $this->template->loadData("activeLink", array("pay" => array("pay" => 1)));
                $this->template->loadContent("admin/view_payment/fee_report.php", array(
                    "yearly_bill_january" => $yearly_bill_january,
                    "yearly_bill_february" => $yearly_bill_february,
                    "yearly_bill_march" => $yearly_bill_march,
                    "yearly_bill_april" => $yearly_bill_april,
                    "yearly_bill_may" => $yearly_bill_may,
                    "yearly_bill_june" => $yearly_bill_june,
                    "yearly_bill_july" => $yearly_bill_july,
                    "yearly_bill_august" => $yearly_bill_august,
                    "yearly_bill_september" => $yearly_bill_september,
                    "yearly_bill_october" => $yearly_bill_october,
                    "yearly_bill_november" => $yearly_bill_november,
                    "yearly_bill_december" => $yearly_bill_december,
                    "total_yearly_bill" => $total_yearly_bill,
                    "total_yearly_paid" => $total_yearly_paid,
                    "total_yearly_due" => $total_yearly_due,
                    "year" => $year
                        )
                );
            }
        } else {
            redirect(site_url("view_payment/fee_report"));
        }
    }

    // *** monthly collection report -------------------------------------------
    protected function year_coll_report_valid() {
        $rules = array(
            array(
                'field' => 'year',
                'label' => $this->lang->line("year"),
                'rules' => 'trim|required|xss_clean|max_length[4]'
            )
        );
        return $rules;
    }

    // *** update fee ----------------------------------------------------------
    public function update_fee() {
        if ($_POST) {
            $rules = $this->mem_id_valid();
            $this->load->library('form_validation');
            $this->form_validation->set_rules($rules);
            if ($this->form_validation->run() == FALSE) {
                echo "error on update fee";
            } else {
                $mem_id = $this->common->nohtml($this->input->post("mem_id", true));

                redirect(site_url("view_payment/fee_details/" . $mem_id));
            }
        } else {
            $this->template->loadData("title", array("title" => "Update Fee"));
            $this->template->loadData("activeLink", array("pay" => array("pay" => 1)));
            $this->template->loadContent("admin/view_payment/update_fee.php");
        }
    }

    // *** fee details----------------------------------------------------------
    public function fee_details($mem_id) {
        if (!$this->user->info->user_level == 1 && 2) {
            $this->template->error(lang("error_7"));
        }
        $this->template->loadData("title", array("title" => "Update Fee"));
        $this->template->loadData("activeLink", array("pay" => array("pay" => 1)));

        if (empty($mem_id))
            $this->template->error(lang("error_51"));
        // member info
        $mem_info = $this->gym_model->get_mem_info_by_id($mem_id);
        // month report
        $mon_report = $this->gym_model->id_base_mon_report($mem_id);
        $total_mon_fee = $this->gym_model->total_mon_fee($mem_id);
        $total_mon_paid = $this->gym_model->total_mon_paid($mem_id);
        $total_mon_due = $this->gym_model->total_mon_due($mem_id);
        // admission report
        $adm_report = $this->gym_model->id_base_adm_report($mem_id);
        $total_adm_fee = $this->gym_model->total_adm_fee($mem_id);
        $total_adm_paid = $this->gym_model->total_adm_paid($mem_id);
        $total_adm_due = $this->gym_model->total_adm_due($mem_id);
        $this->template->loadContent("admin/view_payment/fee_details.php", array(
            "mem_info" => $mem_info,
            "mon_report" => $mon_report,
            "total_mon_fee" => $total_mon_fee,
            "total_mon_paid" => $total_mon_paid,
            "total_mon_due" => $total_mon_due,
            "adm_report" => $adm_report,
            "total_adm_fee" => $total_adm_fee,
            "total_adm_paid" => $total_adm_paid,
            "total_adm_due" => $total_adm_due
                )
        );
    }

    // *** update monthly  fee -------------------------------------------------
    public function update_mon_fee() {
        if (!$this->user->info->user_level == 1 && 2) {
            $this->template->error(lang("error_7"));
        }
        if ($_POST) {
            $rules = $this->update_mon_fee_valid();
            $this->load->library('form_validation');
            $this->form_validation->set_rules($rules);
            if ($this->form_validation->run() == FALSE) {
                echo "update_mon_fee error";
            } else {
                $data = array();
                $data['mon_paid'] = $this->common->nohtml($this->input->post("mon_paid", true));
                $data['mon_due'] = $this->common->nohtml($this->input->post("mon_due", true));
                $mem_id = $this->common->nohtml($this->input->post("mem_id", true));
                $mon_id = $this->common->nohtml($this->input->post("mon_id", true));
                $this->gym_model->update_mon_fee($data, $mon_id);
                redirect(site_url("view_payment/fee_details/" . $mem_id));
            }
        } else {
            redirect(site_url("view_payment/update_fee"));
        }
    }

    // *** update mon fee valid ------------------------------------------------
    protected function update_mon_fee_valid() {
        $rules = array(
            array(
                'field' => 'mon_paid',
                'label' => $this->lang->line("mon_paid"),
                'rules' => 'trim|xss_clean|max_length[7]'
            ),
            array(
                'field' => 'mon_due',
                'label' => $this->lang->line("mon_due"),
                'rules' => 'trim|xss_clean|max_length[7]'
            ),
            array(
                'field' => 'mem_id',
                'label' => $this->lang->line("mem_id"),
                'rules' => 'trim|required|xss_clean|max_length[7]'
            ),
            array(
                'field' => 'mon_id',
                'label' => $this->lang->line("mon_id"),
                'rules' => 'trim|required|xss_clean|max_length[5]'
            )
        );
        return $rules;
    }

    // *** update mon fee valid ------------------------------------------------
    public function delete_mon_fee() {
        if (!$this->user->info->user_level == 1 && 2) {
            $this->template->error(lang("error_7"));
        }
        if ($_POST) {
            $rules = $this->delete_mon_fee_valid();
            $this->load->library('form_validation');
            $this->form_validation->set_rules($rules);
            if ($this->form_validation->run() == FALSE) {
                echo "delete_mon_fee error";
            } else {
                $mem_id = $this->common->nohtml($this->input->post("mem_id", true));
                $mon_id = $this->common->nohtml($this->input->post("mon_id", true));
                $this->gym_model->delete_mon_fee($mon_id);
                redirect(site_url("view_payment/fee_details/" . $mem_id));
            }
        } else {
            redirect(site_url("view_payment/update_fee"));
        }
    }

    // *** update mon fee valid ------------------------------------------------
    protected function delete_mon_fee_valid() {
        $rules = array(
            array(
                'field' => 'mon_id',
                'label' => $this->lang->line("mon_id"),
                'rules' => 'trim|xss_clean|max_length[7]'
            ),
            array(
                'field' => 'mem_id',
                'label' => $this->lang->line("mem_id"),
                'rules' => 'trim|xss_clean|max_length[7]'
            )
        );
        return $rules;
    }

    // *** update adm fee fee --------------------------------------------------
    public function update_adm_fee() {
        if (!$this->user->info->user_level == 1 && 2) {
            $this->template->error(lang("error_7"));
        }
        if ($_POST) {
            $rules = $this->update_adm_fee_valid();
            $this->load->library('form_validation');
            $this->form_validation->set_rules($rules);
            if ($this->form_validation->run() == FALSE) {
                echo "update_adm_fee error";
            } else {
                $data = array();
                $data['adm_paid'] = $this->common->nohtml($this->input->post("adm_paid", true));
                $data['adm_due'] = $this->common->nohtml($this->input->post("adm_due", true));
                $mem_id = $this->common->nohtml($this->input->post("mem_id", true));
                $adm_id = $this->common->nohtml($this->input->post("adm_id", true));
                $this->gym_model->update_adm_fee($data, $adm_id);
                redirect(site_url("view_payment/fee_details/" . $mem_id));
            }
        } else {
            redirect(site_url("view_payment/update_fee"));
        }
    }

    // *** update adm fee valid ------------------------------------------------
    protected function update_adm_fee_valid() {
        $rules = array(
            array(
                'field' => 'adm_paid',
                'label' => $this->lang->line("adm_paid"),
                'rules' => 'trim|xss_clean|max_length[7]'
            ),
            array(
                'field' => 'adm_due',
                'label' => $this->lang->line("adm_due"),
                'rules' => 'trim|xss_clean|max_length[7]'
            ),
            array(
                'field' => 'mem_id',
                'label' => $this->lang->line("mem_id"),
                'rules' => 'trim|required|xss_clean|max_length[7]'
            ),
            array(
                'field' => 'adm_id',
                'label' => $this->lang->line("adm_id"),
                'rules' => 'trim|required|xss_clean|max_length[5]'
            )
        );
        return $rules;
    }

    // *** delete adm fee ------------------------------------------------------
    public function delete_adm_fee() {
        if (!$this->user->info->user_level == 1 && 2) {
            $this->template->error(lang("error_7"));
        }
        if ($_POST) {
            $rules = $this->delete_adm_fee_valid();
            $this->load->library('form_validation');
            $this->form_validation->set_rules($rules);
            if ($this->form_validation->run() == FALSE) {
                echo "delete_adm_fee error";
            } else {
                $mem_id = $this->common->nohtml($this->input->post("mem_id", true));
                $adm_id = $this->common->nohtml($this->input->post("adm_id", true));
                $this->gym_model->delete_adm_fee($adm_id);
                redirect(site_url("view_payment/fee_details/" . $mem_id));
            }
        } else {
            redirect(site_url("view_payment/update_fee"));
        }
    }

    // *** delete adm fee valid ------------------------------------------------
    protected function delete_adm_fee_valid() {
        $rules = array(
            array(
                'field' => 'adm_id',
                'label' => $this->lang->line("mon_id"),
                'rules' => 'trim|xss_clean|max_length[7]'
            ),
            array(
                'field' => 'mem_id',
                'label' => $this->lang->line("mem_id"),
                'rules' => 'trim|xss_clean|max_length[7]'
            )
        );
        return $rules;
    }

}