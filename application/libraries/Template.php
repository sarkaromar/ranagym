<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Template {

    var $cssincludes;
    var $jsincludes;
    
    var $layout = "admin/layout/admin_layout.php";
    var $data = array();
    var $error_layout = 0;
    
    var $error_view = "admin/error/admin_error.php";

    public function loadContent($view, $data = array(), $die = 0) {
        $CI = & get_instance();
        
        // for css load --------------------------------------------------------
        $site = array();
        $site['cssincludes'] = $this->cssincludes;
        foreach ($this->data as $k => $v) {
            $site[$k] = $v;
        }
        foreach ($this->data as $k => $v) {
            $data[$k] = $v;
        }
        
        // for js load ---------------------------------------------------------
        $site['jsincludes'] = $this->jsincludes;
        foreach ($this->data as $js_k => $js_v) {
            $site[$js_k] = $js_v;
        }
        foreach ($this->data as $js_k => $js_v) {
            $data[$js_k] = $js_v;
        }
        
        // for main content load -----------------------------------------------
        $site['content'] = $CI->load->view($view, $data, true);
        $CI->load->view($this->layout, $site);

        if ($die)
            die($CI->output->get_output());
    }

    // **** error load  --------------------------------------------------------
    public function set_error_layout($error) {
        $this->error_layout = $error;
    }
    public function set_error_view($view) {
        $this->error_view = $view;
    }

    // **** layout load --------------------------------------------------------
    public function set_layout($view) {
        $this->layout = $view;
    }

    // **** title load ---------------------------------------------------------
    public function loadData($key, $data) {
        $this->data[$key] = $data;
    }
    
    // ****  extra css load ----------------------------------------------------
    public function load_css($code) {
        $this->cssincludes = $code;
    }
    
    // ****  extra js load -----------------------------------------------------
    public function load_js($js_code){
        $this->jsincludes = $js_code;
    }
    
    // **** load error message -------------------------------------------------
    public function error($message) {
        if (!$this->error_layout) {
            $this->loadContent($this->error_view, array(
                "message" => $message), 1);
        } else {
            $this->loadContent($this->error_view, array(
                "message" => $message), 1);
        }
    }
    public function errori($msg) {
        echo "ERROR: " . $msg;
        exit();
    }
    
    
}
?>