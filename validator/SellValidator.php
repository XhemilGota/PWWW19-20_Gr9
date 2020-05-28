<?php

require("BaseValidator.php");

class SellValidator extends BaseValidator 
{
    public function __construct()
    { 
        $this -> validateText('FullName', 'REQUIRED');
        $this -> validateTel('Phone', 'REQUIRED');
        $this -> validateEmail('email', 'REQUIRED');
        $this -> validateAddress("address1", "REQUIRED");
        $this -> validateAddress("address2", "");
        $this -> isEmpty("city");
        $this -> isEmpty("bedrooms");
        $this -> isEmpty("bathrooms");
    }



    public function validateAddress($field, $requirement)
    {
        if($requirement == 'REQUIRED')
        {  
            if($this -> isEmpty($field))
            {
                return false;
            }               
        }

        if(preg_match('/[^A-Za-z 0-9.]/', $_POST[$field]))
        {
            $this -> addError($field, 'The field must not contain special characters!');
            return false;
        }

        return true;
    }

}

?>