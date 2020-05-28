<?php

require("LoginValidator.php");
require("uniqueInterface.php");

class SignUpValidator extends LoginValidator implements ContainsUnique
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