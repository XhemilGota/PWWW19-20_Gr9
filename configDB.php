<?php
class Database{
  
    const host = "localhost";
    const db_name = "truestate";
    const username = "root";
    const password = "";
    public $conn;
  
    public static function getConnection(){
  
        $conn = null;

        $conn = new mysqli(self::host, self::username, self::password, self::db_name);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
  
        echo "u lidh";

        return $conn;
    }
}
?>