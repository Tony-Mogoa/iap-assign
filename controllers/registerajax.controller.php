<?php
require_once("../util_ajax/Validator.class.php");
require_once("../models_ajax/User.class.php");
require_once("../util_ajax/FileUploader.class.php");
require_once("../util_ajax/ConnectionManager.class.php");

//data vars
$full_name;
$email;
$city;
$password;

$error_count = 0;
$errors = array();

if(isset($_POST['full-name'])){
    if(empty($_POST["full-name"])){
        $errors['full-name'] = "Please enter your name.";
        $error_count++;
    } else{
        $full_name = Validator::filterName($_POST["full-name"]);
        if($full_name == FALSE){
            $errors['full-name'] = "Please enter a valid name.";
            $error_count++;
        }
    }

    if(empty($_POST["email"])){
        $errors['email'] = "Please enter your email address.";
        $error_count++;     
    } else{
        $email = Validator::filterEmail($_POST["email"]);
        if($email == FALSE){
            $errors['email'] = "Please enter a valid email address.";
            $error_count++;
        }
        else{
            //check if email already exists
            $checkEmailSQL = "SELECT user_id FROM user WHERE user_email = ?";
            $checkEmailArgs = array($email);
            CONNECTION_MANAGER::create();
            $checkEmailStmt = CONNECTION_MANAGER::$connection->prepare($checkEmailSQL);
            $checkEmailStmt->execute($checkEmailArgs);
            $row = $checkEmailStmt->fetch();
            if($row != NULL){
                $errors['email'] = "Please use another email, this one's already been taken. Ouch!";
                $error_count++;
            }
            CONNECTION_MANAGER::close();
        }
    }

    if(empty($_POST["city"])){
        $errors['city'] = "Please enter your city of residence"; 
        $error_count++;    
    } else{
        $city = Validator::filterName($_POST["city"]);
        if($city == FALSE){
            $errors['city'] = "Please enter a valid city name.";
            $error_count++;
        }
    }

    if($_FILES['profile-pic']['size'] < 1){
        $errors['profile-pic'] = "Please attach you profile photo";
        $error_count++;
    }

    if(empty($_POST["password"])){
        $errors['password'] = "Please enter your password"; 
        $error_count++;    
    }else{
        $password = Validator::filterPassword($_POST['password']);
        if($password != FALSE){
            if(empty($_POST["confirm-password"])){
                $errors['confirm-password'] = "Please confirm your password"; 
                $error_count++;    
            }else{
                $confirmation_password = Validator::filterPassword($_POST['confirm-password']);
                if($confirmation_password != FALSE){
                    if($confirmation_password !== $password){
                        $errors['confirm-password'] = "The passwords you entered don't match!";
                        $errors['password'] = "The passwords you entered don't match!";
                        $error_count++;
                    }
                }else{
                    $errors['confirm-password'] = "Please pick another password.";
                    $error_count++;
                }
            }
        }else{
            $errors['password'] = "Please pick another password.";
            $error_count++;
        }
    }

    if($error_count < 1){
        // add user to database
        $file_uploader = new FileUploader("profile-pic", "../uploads");
        $upload_successful = $file_uploader->upload();
        if($upload_successful){
            CONNECTION_MANAGER::create();
            $user = new User;
            $user->init_user_without_id($full_name, $email, $city, $file_uploader->get_file_name());
            $user->set_password($password);
            $register_successful = $user->register(CONNECTION_MANAGER::$connection);
            if($register_successful){
                //header("location: index.php?page=login");
                echo "success";
            }
            else{
                echo "failed";
            }
            CONNECTION_MANAGER::close();
        }else{
            echo "image";
        }
    }else{
        echo json_encode($errors);
    }    
}
//return require_once("./views/register.view.php");
?>