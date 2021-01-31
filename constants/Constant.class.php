<?php
abstract class CONSTANT{
    public static $DB_NAME = "iap";
    public static $HOST = "127.0.0.1";
    public static $USERNAME = "root";
    public static $PASSWORD = "";
    public static $CHARSET = "utf8mb4";

    public static $DB_OPTIONS = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
} 
?>