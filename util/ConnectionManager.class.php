<?php
require_once("./constants/Constant.class.php");

 abstract class CONNECTION_MANAGER{
    public static $connection;

    public static function create(){
        $DATA_SOURCE_NAME = "mysql:host=" . CONSTANT::$HOST . ";dbname=" . CONSTANT::$DB_NAME. ";charset=" . CONSTANT::$CHARSET;
        
        try {
            self::$connection = new PDO($DATA_SOURCE_NAME, CONSTANT::$USERNAME, CONSTANT::$PASSWORD, CONSTANT::$DB_OPTIONS);
        } catch (PDOException $e) {
            echo $e->getMessage();
       }
    }
    
    public static function close(){
        self::$connection = NULL;
    }
}
?>