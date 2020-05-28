<?php

abstract class BaseValidator {

    private $errors = [];

    public function validateText($field, $requirement)
    {
        if($requirement == 'REQUIRED')
        {
            
            if($this -> isEmpty($field))
            {
                return false;
            }            
            
        }

        if(preg_match('/[^A-Za-z ]/', $_POST[$field]))
        {
            $this -> addError($field, 'The field must not contain special characters!');
            return false;
        }

        if($requirement == 'UNIQUE')
        {   
            if(!($this -> isUnique($field)))
            {
                $this -> addError($field, 'The field must be unique!');
                return false;    
            }
        }

        return true;
    }

    public function validateTel($field, $requirement)
    {
        if($requirement == 'REQUIRED')
        {
            
            if($this -> isEmpty($field))
            {
                return false;
            }            
            
        }
        
        if(!(preg_match('/^[0-9\-\(\)\/\+\s]*$/', $_POST[$field])))
        {
            $this -> addError($field, 'The field must not contain special characters!');
            return false;
        }

        if($requirement == 'UNIQUE')
        {   
            if(!($this -> isUnique($field)))
            {
                $this -> addError($field, 'The field must be unique!');
                return false;    
            }
        }

        return true;
    }

    public function validateEmail($field, $requirement)
    {
        if($requirement == 'REQUIRED')
        {
            
            if($this -> isEmpty($field))
            {
                return false;
            }            
            
        }

        if(!filter_var($_POST[$field], FILTER_VALIDATE_EMAIL))
        {
            $this -> addError($field, 'Email is not valid!');
            return false;
        }

        if($requirement == 'UNIQUE')
        {   
            if(!($this -> isUnique($field)))
            {
                $this -> addError($field, 'The field must be unique!');
                return false;    
            }
        }

        return true;
    }

    public function isEmpty($field)
    {
        if(empty($_POST[$field]))
        {
            $this -> addError($field, 'The field must not be empty!');
            return true;
        }

        return false;
    }


        function addError($key, $val){
            $this->errors[$key] = $val;
        }

        function getErrors()
        {
            return $this -> errors;
        }
        
    }
  
   

   

?>