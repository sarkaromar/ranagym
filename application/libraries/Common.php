<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once("PasswordHash.php");

class Common {

    public function nohtml($message) {
        $message = trim($message);
        $message = strip_tags($message);
        $message = htmlspecialchars($message, ENT_QUOTES);
        return $message;
    }

    public function encrypt($password) {
        $phpass = new PasswordHash(12, false);
        $hash = $phpass->HashPassword($password);
        return $hash;
    }

    public function randomPassword() {
        $letters = array(
            "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q",
            "r", "s", "t", "u", "v", "w", "x", "y", "z"
        );
        $pass = "";
        for ($i = 0; $i < 10; $i++) {
            shuffle($letters);
            $letter = $letters[0];
            if (rand(1, 2) == 1) {
                $pass .= $letter;
            } else {
                $pass .= strtoupper($letter);
            }
            if (rand(1, 3) == 1) {
                $pass .= rand(1, 9);
            }
        }
        return $pass;
    }

}

?>