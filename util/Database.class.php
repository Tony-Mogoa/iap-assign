<?php
require_once("./constants/Constant.class.php");

class Database{
    public static $PDO;
    public static function createConnection(){
        $DATA_SOURCE_NAME = "mysql:host=" . CONSTANT::$HOST . ";dbname=" . CONSTANT::$DB_NAME. ";charset=" . CONSTANT::$CHARSET;
        
        try {
            $PDO = new PDO($DATA_SOURCE_NAME, CONSTANT::$USERNAME, CONSTANT::$PASSWORD, CONSTANT::$DB_OPTIONS);
            return $PDO;
        } catch (PDOException $e) {
            echo $e->getMessage();
       }
    }
    
}
?>