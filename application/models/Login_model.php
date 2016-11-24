<?php defined('BASEPATH') OR exit('No direct script access allowed');

 class Login_Model extends CI_Model {

    /**
     * Login_Model of this application
     * 
     * 
     * @author Mostafijur Rahman
     * @author_contact - http://www.mostafijur-rahman.com/
     */
     
    // *** get user by email ---------------------------------------------------
    public function getUserByEmail($email) {
        return $this->db->select("id,password,token")->where("email", $email)->get("users");
    }

    // *** update user token ---------------------------------------------------
    public function updateUserToken($userid, $token) {
        $this->db->where("id", $userid)->update("users", array("token" => $token));
    }

}
