<?php
class Database{
  
    const host = "localhost";
    const db_name = "truestate";
    const username = "root";
    const password = "";
    public $conn;
  
    public static function getConnection(){
  
        $conn = null;

        $conn = mysqli_connect(self::host, self::username, self::password, self::db_name);

        if (!$conn) 
        {
            die("Connection failed: " . mysqli_connect_error());
        }

        return $conn;
    }
}
?>