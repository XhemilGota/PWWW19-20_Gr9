<?php

require("BaseValidator.php");

class SignUpValidator extends BaseValidator 
{
    public function __construct()
    {
        $this -> validateText('name', 'REQUIRED');
        $this -> validateText('lname', 'REQUIRED');
        $this -> validateText('username', 'REQUIRED');
        $this -> validateText('username', 'UNIQUE');
        $this -> validateTel('phoneNr', 'REQUIRED');
        $this -> validateEmail('email', 'REQUIRED');
        $this -> validateEmail('email', 'UNIQUE');
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

    public function isUnique($field) : bool
    {
        require_once("configDB.php");

        $conn = Database::getConnection();

        $sql = "SELECT * FROM users WHERE username = " . "'" .$_POST[$field] . "'";

        $result = mysqli_query($conn, $sql);

        $num_rows = mysqli_num_rows($result);

        if($num_rows != 0)
        {
            return false;
        }

        return true;
    }
}

?>