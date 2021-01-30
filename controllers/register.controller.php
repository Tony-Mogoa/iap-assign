<?php
$name_error = "";
$email_error = "";
$password_error = "";
$confirm_password_error = "";
$city_error = "";
$error_count = 0;
if(isset($_POST['register'])){
    if(empty($_POST["full-name"])){
        $name_error = "Please enter your name.";
        $error_count++;
    } else{
        $name = Validator::filterName($_POST["full-name"]);
        if($name == FALSE){
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

    if($error_count > 0){
        // add user to database
    }    
}
return require_once("./views/register.view.php");
?>