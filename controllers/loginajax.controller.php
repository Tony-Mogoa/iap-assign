<?php
session_start();
require_once("../models_ajax/User.class.php");
require_once("../util_ajax/ConnectionManager.class.php");
require_once("../util_ajax/Validator.class.php");

if(isset($_POST['email'])){
    $user = new User;
    $user->init_login(Validator::filterEmail($_POST["email"]), Validator::filterPassword($_POST["password"]));
    CONNECTION_MANAGER::create();
    if($user->login(CONNECTION_MANAGER::$connection)){
        $_SESSION['logged-in'] = 1;
        $_SESSION['user-id'] = $user->get_user_id();
        $_SESSION['full-name'] = $user->get_full_name();
        $_SESSION['email'] = $user->get_email();
        $_SESSION['city'] = $user->get_city();
        $_SESSION['profile-pic-url'] = $user->get_profile_pic_url();
        //header("location: index.php");
        // print_r($_SESSION);
        echo "success";
    }
    else{
        echo "failed";
    }
}else{
    echo "no data";
}
?>