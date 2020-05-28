<?php
class Database{
  
    const host = "localhost";
    const db_name = "truestate";
    const username = "root";
    const password = "";
    public $conn;
  
    public static function getConnection(){
  
        $conn = null;


        try
        {
            if ($conn = mysqli_connect(self::host, self::username, self::password, self::db_name))
            {}
            else
            {
                throw new Exception('Unable to connect');
            }
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }


        return $conn;
    }
}
?>