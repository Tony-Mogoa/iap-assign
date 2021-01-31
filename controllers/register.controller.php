<?php
require_once("./util/Validator.class.php");
require_once("./models/User.class.php");
require_once("./util/FileUploader.class.php");
require_once("./util/ConnectionManager.class.php");

//data vars
$full_name;
$email;
$city;
$password;

// Error vars
$name_error= "";
$email_error = "";
$password_error = "";
$confirm_password_error = "";
$city_error = "";
$file_upload_error = "";
$error_count = 0;

if(isset($_POST['register'])){
    if(empty($_POST["full-name"])){
        $name_error = "Please enter your name.";
        $error_count++;
    } else{
        $full_name = Validator::filterName($_POST["full-name"]);
        if($full_name == FALSE){
            $name_error = "Please enter a valid name.";
            $error_count++;
        }
    }

    if(empty($_POST["email"])){
        $email_error = "Please enter your email address.";
        $error_count++;     
    } else{
        $email = Validator::filterEmail($_POST["email"]);
        if($email == FALSE){
            $email_error = "Please enter a valid email address.";
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
                $email_error = "Please use another email, this one's already been taken. Ouch!";
                $error_count++;
            }
            CONNECTION_MANAGER::close();
        }
    }

    if(empty($_POST["city"])){
        $city_error = "Please enter your city of residence"; 
        $error_count++;    
    } else{
        $city = Validator::filterName($_POST["city"]);
        if($city == FALSE){
            $city_error = "Please enter a valid city name.";
            $error_count++;
        }
    }

    if($_FILES['profile-pic']['size'] < 1){
        $file_upload_error = "Please attach you profile photo";
    }

    if(empty($_POST["password"])){
        $password_error = "Please enter your password"; 
        $error_count++;    
    }else{
        $password = Validator::filterPassword($_POST['password']);
        if($password != FALSE){
            if(empty($_POST["confirm-password"])){
                $confirm_password_error = "Please confirm your password"; 
                $error_count++;    
            }else{
                $confirmation_password = Validator::filterPassword($_POST['confirm-password']);
                if($confirmation_password != FALSE){
                    if($confirmation_password !== $password){
                        $confirm_password_error = "The passwords you entered don't match!";
                        $password_error = "The passwords you entered don't match!";
                        $error_count++;
                    }
                }else{
                    $confirm_password_error = "Please pick another password.";
                    $error_count++;
                }
            }
        }else{
            $password_error = "Please pick another password.";
            $error_count++;
        }
    }

    if($error_count < 1){
        // add user to database
        $file_uploader = new FileUploader("profile-pic", "./uploads");
        $upload_successful = $file_uploader->upload();
        if($upload_successful){
            CONNECTION_MANAGER::create();
            $user = new User;
            $user->init_user_without_id($full_name, $email, $city, $file_uploader->get_file_name());
            $user->set_password($password);
            $register_successful = $user->register(CONNECTION_MANAGER::$connection);
            if($register_successful){
                header("location: index.php?page=login");
            }
            CONNECTION_MANAGER::close();
        }
    }    
}
return require_once("./views/register.view.php");
?>