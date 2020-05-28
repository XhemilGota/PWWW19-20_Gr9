<?php

require("BaseValidator.php");

class LoginValidator extends BaseValidator 
{
    public function __construct()
    {
        $this -> validateText('username', 'REQUIRED');
        $this -> checkPassword('password');
    }

    public function checkPassword($field) {
    
        if($this -> isEmpty($field))
        {
            return false;
        }    

        if (strlen($_POST[$field]) < 8) {
            $this -> addError($field, 'Password too short!');
            return false;
        }
    
        if (!preg_match("#[0-9]+#", $_POST[$field])) {
            $this -> addError($field, 'Password must include at least one number!');
            return false;
        }
    
        if (!preg_match("#[a-zA-Z]+#", $_POST[$field])) {
            $this -> addError($field, 'Password must include at least one letter!');
            return false;
        }     
    
        return true;
    }

}

?>