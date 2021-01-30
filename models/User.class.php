<?php
require_once("./Account.interface.php");
require_once("../util/ConnectionManager.class.php");

class User implements Account{

    private $full_name;
    private $email;
    private $city;
    private $img_url;

    public function register($pdo){
        ConnectionManager::create();
        ConnectionManager::close();
    }

    public function login($pdo){
        ConnectionManager::create();
        ConnectionManager::close();
    }

    public function changePassword($pdo){
        ConnectionManager::create();
        ConnectionManager::close();
    }

    public function logout($pdo){
        ConnectionManager::create();
        ConnectionManager::close();
    }
}
?>