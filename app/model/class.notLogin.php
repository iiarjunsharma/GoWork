<?php
require_once __DIR__ . '../../model/class.database.php';
class NotLogin extends Database
{
    // Methods
    // Signup
    function exist_username($userName)
    {
        $USqlExist = "SELECT * FROM `users` WHERE (`username`) = '$userName'";
        $UResult = $this->query($USqlExist);
        return $UResult;
    }
    function exist_email($email)
    {
        $ESqlExist = "SELECT * FROM `users` WHERE (`email`) = '$email'";
        $EResult = $this->query($ESqlExist);
        return $EResult;
    }
    function add_user($userName, $email, $password)
    {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO `users` (`username`, `email`,  `password`, `timestamp`) VALUES ('$userName', '$email', '$hash', current_timestamp())";
        $result = $this->query($sql);
        return $result;
    }
    // Signin
    function check_loggedin($userName)
    {
        $sql = "SELECT * FROM `users` WHERE (`username`)='$userName'";
        $result = $this->query($sql);
        return $result;
    }
    function check_profile($user_id)
    {
        $sql = "SELECT * FROM `user_profile` WHERE (`user_id`)=$user_id";
        $result = $this->query($sql);
        return $result;
    }
    function login($user_id)
    {
        $sql = "INSERT INTO `user_profile` (`user_id`, `time_stamp`) VALUES ('$user_id',current_timestamp())";
        $result = $this->query($sql);
        return $result;
    }
}
