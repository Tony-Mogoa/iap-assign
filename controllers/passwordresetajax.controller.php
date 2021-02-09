<?php
session_start();
require_once("../util_ajax/Validator.class.php");
require_once("../util_ajax/ConnectionManager.class.php");
require_once("../models_ajax/User.class.php");

$error_old = "";
$error_new = "";
$errors['confirm_password'] = "";
$error_count = 0;
$error_while_changing = "";

$old_password = "";
$new_password = "";
$confirm_password = "";

$errors = array();

if(isset($_POST['old-password'])){
    if(empty($_POST['old-password'])){
        $errors['old_password'] = "Please fill this field.";
        $error_count++;
    }
    else{
        $old_password = Validator::filterPassword($_POST['old-password']);
        if($old_password != FALSE){

        }else{
            $errors['old_password'] = "Please enter a valid password";
            $error_count++;
        }
    }

    if(empty($_POST['new-password'])){
        $errors['new_password'] = "Please fill this field.";
        $error_count++;
    }
    else{
        $new_password = Validator::filterPassword($_POST['new-password']);
        if($new_password != FALSE){
            if(empty($_POST['confirm-password'])){
                $errors['confirm_password'] = "Please fill this field.";
                $error_count++;
            }
            else{
                $confirm_password = Validator::filterPassword($_POST['confirm-password']);
                if($confirm_password == FALSE){
                    $errors['confirm_password'] = "Please enter a valid password.";
                    $error_count++;
                }elseif($confirm_password !== $new_password){
                    $errors['confirm_password'] = "The passwords you entered don't match!";
                    $errors['new_password'] = "The passwords you entered don't match!";
                    $error_count++;
                }
            }
        }else{
            $errors['new_password'] = "Please enter a valid password";
            $error_count++;
        }
    }

    if($error_count < 1){
        $user = new User;
        $user->set_raw_old_password($old_password);
        $user->set_hashed_new_password($new_password);
        CONNECTION_MANAGER::create();
        if($user->changePassword(CONNECTION_MANAGER::$connection)){
            //return require_once("./views/passwordresetsuccess.view.php");
            echo "success";
        }
        else{
            echo "invalid";
            //$error_while_changing = "Incorrect password. Are you really the true owner of this account? We are not convinced of that, please try again.";
        }
        CONNECTION_MANAGER::close();
    }else{
        echo json_encode($errors);
    }
}
?>