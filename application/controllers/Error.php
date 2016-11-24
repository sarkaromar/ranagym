<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Error extends CI_Controller {
    
    /**
     * Error of this application
     * 
     * 
     * @author Mostafijur Rahman
     * @author_contact - http://www.mostafijur-rahman.com/
     */
    
    // *** index ---------------------------------------------------------------
    public function index() {
        $this->template->loadData("title", array("title" => "404 Error"));
        $this->template->loadData("activeLink", array("dashboard" => array("dashboard" => 1)));
        $this->template->loadContent("admin/error/error_404.php", array()); 
    }
    
}