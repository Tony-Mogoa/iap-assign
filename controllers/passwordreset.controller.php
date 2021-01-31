<?php
require_once("./util/Validator.class.php");
require_once("./util/ConnectionManager.class.php");
require_once("./models/User.class.php");

$error_old = "";
$error_new = "";
$error_confirm_new = "";
$error_count = 0;
$error_while_changing = "";

$old_password = "";
$new_password = "";
$confirm_password = "";

if(isset($_POST['change-password'])){
    if(empty($_POST['old-password'])){
        $error_old = "Please fill this field.";
        $error_count++;
    }
    else{
        $old_password = Validator::filterPassword($_POST['old-password']);
        if($old_password != FALSE){

        }else{
            $error_old = "Please enter a valid password";
            $error_count++;
        }
    }

    if(empty($_POST['new-password'])){
        $error_new = "Please fill this field.";
        $error_count++;
    }
    else{
        $new_password = Validator::filterPassword($_POST['new-password']);
        if($new_password != FALSE){
            if(empty($_POST['confirm-password'])){
                $error_confirm_new = "Please fill this field.";
                $error_count++;
            }
            else{
                $confirm_password = Validator::filterPassword($_POST['confirm-password']);
                if($confirm_password == FALSE){
                    $error_confirm_new = "Please enter a valid password.";
                    $error_count++;
                }elseif($confirm_password !== $new_password){
                    $error_confirm_new = "The passwords you entered don't match!";
                    $error_new = "The passwords you entered don't match!";
                    $error_count++;
                }
            }
        }else{
            $error_new = "Please enter a valid password";
            $error_count++;
        }
    }

    if($error_count < 1){
        $user = new User;
        $user->set_raw_old_password($old_password);
        $user->set_hashed_new_password($new_password);
        CONNECTION_MANAGER::create();
        if($user->changePassword(CONNECTION_MANAGER::$connection)){
            return require_once("./views/passwordresetsuccess.view.php");
        }
        else{
            $error_while_changing = "Incorrect password. Are you really the true owner of this account? We are not convinced of that, please try again.";
        }
    }
}
return require_once("./views/passwordreset.view.php");
?>