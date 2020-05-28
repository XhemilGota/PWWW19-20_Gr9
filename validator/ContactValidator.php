<?php

require("BaseValidator.php");

class ContactValidator extends BaseValidator
{
    public function __construct()
    {
        $this -> validateText('first_name', 'REQUIRED');
        $this -> validateText('last_name', 'REQUIRED');
        $this -> validateTel('phone_number', 'REQUIRED');
        $this -> validateEmail('email_address', 'REQUIRED');
        $this -> validateText('comments_questions', 'REQUIRED');
    }
}

?>