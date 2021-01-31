<?php
require_once("./models/Account.interface.php");
require_once("./util/ConnectionManager.class.php");

class User implements Account{
    private $full_name;
    private $email;
    private $city;
    private $profile_pic_url;
    private $password;
    private $user_id;
    private $raw_old_password;
    private $hashed_new_password;

    public function init_user($user_id, $full_name, $email, $city, $profile_pic_url){
        $this->user_id = $user_id;
        $this->full_name = $full_name;
        $this->email = $email;
        $this->city = $city;
        $this->profile_pic_url = $profile_pic_url;
    }

    public function init_user_without_id($full_name, $email, $city, $profile_pic_url){
        $this->full_name = $full_name;
        $this->email = $email;
        $this->city = $city;
        $this->profile_pic_url = $profile_pic_url;
    }

    public function init_login($email, $password){
        $this->email = $email;
        $this->password = $password;
    }

    public function set_password($password){
        //Hashing the password
        $this->password = password_hash($password, PASSWORD_DEFAULT);

    }

    public function set_raw_old_password($password){
        $this->raw_old_password = $password;
    }

    public function set_hashed_new_password($password){
        $this->hashed_new_password = password_hash($password, PASSWORD_DEFAULT);
    }

    public function register($pdo){
        $registerSQL = "INSERT INTO user(user_full_name, user_email, user_password, user_city, user_img_url) VALUES(?, ?, ?, ?, ?)";
        $registerArgs = array($this->full_name, $this->email, $this->password, $this->city, $this->profile_pic_url);
        $registerStmt = $pdo->prepare($registerSQL);
        try{
            $registerStmt->execute($registerArgs);
            return $registerStmt->rowCount() > 0;
        }catch(Exception $e){
           echo $e; 
           return false;
        }
    }

    public function login($pdo){
        try{
            $loginSQL = "SELECT * FROM user WHERE user_email = ?";
            $loginArgs = array($this->email);
            $loginStmt = $pdo->prepare($loginSQL);
            $loginStmt->execute($loginArgs);
            $row = $loginStmt->fetch();
            if($row == NULL){
                return false;
            }else if(password_verify($this->password, $row['user_password'])){
                $this->init_user($row['user_id'], $row['user_full_name'], $row['user_email'], $row['user_city'], $row['user_img_url']);
                return true;
            }
            else{
                return false;
            }
        }catch(Exception $e){
            echo $e;
            return false;
        }
    }

    public function changePassword($pdo){
        try{
            $query_password_SQL = "SELECT * FROM user WHERE user_id = ?";
            $query_password_args = array($_SESSION['user-id']);
            $query_password_stmt = $pdo->prepare($query_password_SQL);
            $query_password_stmt->execute($query_password_args);
            $row = $query_password_stmt->fetch();
            if($row == NULL){
                return false;
            }else if(password_verify($this->raw_old_password, $row['user_password'])){
                $update_password_SQL = "UPDATE user SET user_password = ? WHERE user_id = ?";
                $update_password_args = array($this->hashed_new_password, $_SESSION['user-id']);
                $update_password_stmt = $pdo->prepare($update_password_SQL);
                $update_password_stmt->execute($update_password_args);
                return $update_password_stmt->rowCount() > 0;
            }
            else{
                return false;
            }
        }catch(Exception $e){
            echo $e;     
        }
    }

    public function logout($pdo){
        try{

        }catch(Exception $e){
            echo $e;
        }
    }

    public function set_user_id($user_id){
        $this->user_id = $user_id;
    }

    public function set_full_name($full_name){
        $this->full_name = $full_name;
    }
    
    public function set_email($email){
        $this->email = $email;
    }

    public function set_city($city){
        $this->city = $city;
    }

    public function set_profile_pic_url($profile_pic_url){
        $this->profile_pic_url = $profile_pic_url;
    }

    public function get_user_id()
    {
        return $this->user_id;
    }

    public function get_full_name(){
        return $this->full_name;
    }

    public function get_email(){
        return $this->email;
    }

    public function get_city(){
        return $this->city;
    }

    public function get_profile_pic_url(){
        return $this->profile_pic_url;
    }

}
?>