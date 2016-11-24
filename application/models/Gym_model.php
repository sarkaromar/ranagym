<?php defined('BASEPATH') OR exit('No direct script access allowed');

 class Gym_model extends CI_Model {

    /**
     * Gym_model of this application
     * 
     * 
     * @author Mostafijur Rahman
     * @author_contact - http://www.mostafijur-rahman.com/
     */

    /*
    $sql = $this->db->query("select `for_the_month`,sum(`current_month_bill`) as bill from `bill` where `entry_date`=(SELECT max(`entry_date`) FROM `bill`) and status=0 group by `for_the_month`");
        
        return $sql->result();

    */

    // collection and due of this month ----------------------------------------
    public function coll_of_the_month() {
        $this->db->select_sum('mon_paid');
        $this->db->where('created = (SELECT MAX(created))', NULL, FALSE);
        $sql = $this->db->get('monthly_fee');
        return $sql->row();
    }

    public function due_of_the_month() {
        $this->db->select_sum('mon_due');
        $this->db->where('created = (SELECT MAX(created))', NULL, FALSE);
        $sql = $this->db->get('monthly_fee');
        return $sql->row();
    }

    // total due ---------------------------------------------------------------
    public function grand_total_adm_due() {
        $sql = $this->db->select_sum('adm_due')->from('admission_fee')->get();
        return $sql->row();
    }

    public function grand_total_mon_due() {
        $sql = $this->db->select_sum('mon_due')->from('monthly_fee')->get();
        return $sql->row();
    }

    // *** add member ----------------------------------------------------------
    public function add_member($data) {
        $this->db->insert("members", $data);
    }

    // *** add admission fee ---------------------------------------------------
    public function add_adm($adm) {
        $this->db->insert("admission_fee", $adm);
    }

    // *** add monthly fee -----------------------------------------------------
    public function add_month($month) {
        $this->db->insert("monthly_fee", $month);
    }

    // *** add fee alert -------------------------------------------------------
    public function fee_alert($alert) {
        $this->db->insert("installment_alert", $alert);
    }

    // *** get total members active --------------------------------------------
    public function get_total_members() {
        $r = $this->db->select('*')->from('members')->where('status', 1)->get();
        return $results = count($r->result_array());
    }

    // *** get member list -----------------------------------------------------
    public function get_member_list($per_page, $uri_segment) {
        if ($uri_segment == NULL) {
            $uri_segment = 0;
        }
        $r = $this->db->select('id, mem_id, first_name, last_name, gen, bld_grp, birth, area, add, phn1, phn2, status')->from('members')->where('status', 1)->order_by('id, mem_id, first_name, last_name, gen, bld_grp, birth, area, add, phn1, phn2, status', 'desc')->limit($per_page, $uri_segment)->get();
        $results = $r->result();
        return $results;
    }

    // *** update member -------------------------------------------------------
    public function update_member($data, $id) {
        $this->db->where('id', $id)->update('members', $data);
    }

    // *** remove member -------------------------------------------------------
    public function remove_member($id) {
        $this->db->where('id', $id)->set('status', 0)->update('members');
    }

    // *** get total remove members --------------------------------------------
    public function get_total_remove_members() {
        $r = $this->db->select('*')->from('members')->where('status', 0)->get();
        return $results = count($r->result_array());
    }

    // *** get member list -----------------------------------------------------
    public function get_remove_member_list($per_page, $uri_segment) {
        if ($uri_segment == NULL) {
            $uri_segment = 0;
        }
        $r = $this->db->select('id, mem_id, first_name, last_name, gen, bld_grp, birth, area, add, phn1, phn2, status')->from('members')->where('status', 0)->order_by('id, mem_id, first_name, last_name, gen, bld_grp, birth, area, add, phn1, phn2, status', 'desc')->limit($per_page, $uri_segment)->get();
        $results = $r->result();
        return $results;
    }

    // *** active member -------------------------------------------------------
    public function active_member($id) {
        $this->db->where('id', $id)->set('status', 1)->update('members');
    }

    // *** delete member -------------------------------------------------------
    public function delete_member($id) {
        $this->db->where('id', $id)->delete('members');
    }

    // *** get member total ----------------------------------------------------
    public function get_member_total() {
        $r = $this->db->select('*')->from('members')->where('status', 1)->get();
        return $results = count($r->result_array());
    }

    // *** get remove total ----------------------------------------------------
    public function get_remove_total() {
        $r = $this->db->select('*')->from('members')->where('status', 0)->get();
        return $results = count($r->result_array());
    }

    // *** get name by id ------------------------------------------------------
    public function get_name_by_id($id) {
        $sql = $this->db->select('first_name, last_name')->where('id', 1)->get('members');
        return $sql->row();
    }

    // *** get monthly fee -----------------------------------------------------
    public function add_mothly_fee($data) {
        $this->db->insert("monthly_fee", $data);
    }

    // *** get admission fee ---------------------------------------------------
    public function add_adm_fee($data) {
        $this->db->insert("admission_fee", $data);
    }

    // *** get mem info by id --------------------------------------------------
    public function get_mem_info_by_id($mem_id) {
        $sql = $this->db->select('*')->where('mem_id', $mem_id)->get('members');
        return $sql->row();
    }

    // *** get id base monthly fee rep -----------------------------------------
    public function id_base_mon_report($mem_id) {
        $r = $this->db->select('*')->where('mem_id', $mem_id)->get('monthly_fee');
        return $r->result();
    }

    public function total_mon_fee($mem_id) {
        $this->db->select_sum('mon_fee');
        $this->db->from('monthly_fee');
        $this->db->where('mem_id', $mem_id);
        $sql = $query = $this->db->get();
        return $sql->row();
    }

    public function total_mon_paid($mem_id) {
        $this->db->select_sum('mon_paid');
        $this->db->from('monthly_fee');
        $this->db->where('mem_id', $mem_id);
        $sql = $query = $this->db->get();
        return $sql->row();
    }

    public function total_mon_due($mem_id) {
        $this->db->select_sum('mon_due');
        $this->db->from('monthly_fee');
        $this->db->where('mem_id', $mem_id);
        $sql = $query = $this->db->get();
        return $sql->row();
    }

    // *** get id base adission fee repor --------------------------------------
    public function id_base_adm_report($mem_id) {
        $r = $this->db->select('*')->where('mem_id', $mem_id)->get('admission_fee');
        return $r->result();
    }

    public function total_adm_fee($mem_id) {
        $this->db->select_sum('adm_fee');
        $this->db->from('admission_fee');
        $this->db->where('mem_id', $mem_id);
        $sql = $query = $this->db->get();
        return $sql->row();
    }

    public function total_adm_paid($mem_id) {
        $this->db->select_sum('adm_paid');
        $this->db->from('admission_fee');
        $this->db->where('mem_id', $mem_id);
        $sql = $query = $this->db->get();
        return $sql->row();
    }

    public function total_adm_due($mem_id) {
        $this->db->select_sum('adm_due');
        $this->db->from('admission_fee');
        $this->db->where('mem_id', $mem_id);
        $sql = $query = $this->db->get();
        return $sql->row();
    }

    /*
      // *** update adm fee by ID -------------------------------------------
      public function update_adm_fee($data, $adm_id){
      $this->db->where('adm_id',$adm_id)->update('admission_fee',$data);
      } */

    // *** yealy monthly fee ---------------------------------------------------
    public function yearly_monthly_bill($month, $year) {
        $query = $this->db->select('members.mem_id,members.first_name,members.last_name,monthly_fee.mon_fee,monthly_fee.mon_paid,monthly_fee.mon_due')
                ->from('monthly_fee')
                ->join('members', 'members.mem_id = monthly_fee.mem_id', 'left')
                ->where('month', $month)
                ->where('year', $year)
                ->get();
        return $query->result();
    }

    public function total_monthly_bill($month, $year) {
        $query = $this->db->select_sum('mon_fee')->from('monthly_fee')->where('month', $month)->where('year', $year)->get();
        return $query->row();
    }

    public function total_monthly_paid($month, $year) {
        $query = $this->db->select_sum('mon_paid')->from('monthly_fee')->where('month', $month)->where('year', $year)->get();
        return $query->row();
    }

    public function total_monthly_due($month, $year) {
        $query = $this->db->select_sum('mon_due')->from('monthly_fee')->where('month', $month)->where('year', $year)->get();
        return $query->row();
    }

    // *** yealy fee -----------------------------------------------------------
    public function yearly_bill_january($year) {
        $query = $this->db->select_sum('mon_fee')->select_sum('mon_paid')->select_sum('mon_due')->from('monthly_fee')->where('month', 'January')->where('year', $year)->get();
        return $query->row();
    }

    public function yearly_bill_february($year) {
        $query = $this->db->select_sum('mon_fee')->select_sum('mon_paid')->select_sum('mon_due')->from('monthly_fee')->where('month', 'February')->where('year', $year)->get();
        return $query->row();
    }

    public function yearly_bill_march($year) {
        $query = $this->db->select_sum('mon_fee')->select_sum('mon_paid')->select_sum('mon_due')->from('monthly_fee')->where('month', 'March')->where('year', $year)->get();
        return $query->row();
    }

    // **************************************
    public function yearly_bill_april($year) {
        $query = $this->db->select_sum('mon_fee')->select_sum('mon_paid')->select_sum('mon_due')->from('monthly_fee')->where('month', 'April')->where('year', $year)->get();
        return $query->row();
    }

    public function yearly_bill_may($year) {
        $query = $this->db->select_sum('mon_fee')->select_sum('mon_paid')->select_sum('mon_due')->from('monthly_fee')->where('month', 'May')->where('year', $year)->get();
        return $query->row();
    }

    public function yearly_bill_june($year) {
        $query = $this->db->select_sum('mon_fee')->select_sum('mon_paid')->select_sum('mon_due')->from('monthly_fee')->where('month', 'June')->where('year', $year)->get();
        return $query->row();
    }

    // **************************************
    public function yearly_bill_july($year) {
        $query = $this->db->select_sum('mon_fee')->select_sum('mon_paid')->select_sum('mon_due')->from('monthly_fee')->where('month', 'July')->where('year', $year)->get();
        return $query->row();
    }

    public function yearly_bill_august($year) {
        $query = $this->db->select_sum('mon_fee')->select_sum('mon_paid')->select_sum('mon_due')->from('monthly_fee')->where('month', 'August')->where('year', $year)->get();
        return $query->row();
    }

    public function yearly_bill_september($year) {
        $query = $this->db->select_sum('mon_fee')->select_sum('mon_paid')->select_sum('mon_due')->from('monthly_fee')->where('month', 'September')->where('year', $year)->get();
        return $query->row();
    }

    // **************************************
    public function yearly_bill_october($year) {
        $query = $this->db->select_sum('mon_fee')->select_sum('mon_paid')->select_sum('mon_due')->from('monthly_fee')->where('month', 'october')->where('year', $year)->get();
        return $query->row();
    }

    public function yearly_bill_november($year) {
        $query = $this->db->select_sum('mon_fee')->select_sum('mon_paid')->select_sum('mon_due')->from('monthly_fee')->where('month', 'November')->where('year', $year)->get();
        return $query->row();
    }

    public function yearly_bill_december($year) {
        $query = $this->db->select_sum('mon_fee')->select_sum('mon_paid')->select_sum('mon_due')->from('monthly_fee')->where('month', 'December')->where('year', $year)->get();
        return $query->row();
    }

    // grand total
    public function total_yearly_bill($year) {
        $query = $this->db->select_sum('mon_fee')->from('monthly_fee')->where('year', $year)->get();
        return $query->row();
    }

    public function total_yearly_paid($year) {
        $query = $this->db->select_sum('mon_paid')->from('monthly_fee')->where('year', $year)->get();
        return $query->row();
    }

    public function total_yearly_due($year) {
        $query = $this->db->select_sum('mon_due')->from('monthly_fee')->where('year', $year)->get();
        return $query->row();
    }

    // monthly fee update ------------------------------------------------------ 
    public function update_mon_fee($data, $mon_id) {
        $this->db->where('mon_id', $mon_id)->update('monthly_fee', $data);
    }

    public function delete_mon_fee($mon_id) {
        $this->db->where('mon_id', $mon_id)->delete('monthly_fee');
    }

    // admission fee update ---------------------------------------------------- 
    public function update_adm_fee($data, $adm_id) {
        $this->db->where('adm_id', $adm_id)->update('admission_fee', $data);
    }

    public function delete_adm_fee($adm_id) {
        $this->db->where('adm_id', $adm_id)->delete('admission_fee');
    }

}