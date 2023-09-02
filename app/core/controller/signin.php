<?php
require_once __DIR__ . '../../controller/notLogin.php';
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $userName = $_POST["userName"];
        $password = $_POST["pass"];
        if (empty($userName) || empty($password)) {
            $ErrorMessage = "Please fill out this fields";
            $ErrorStatus = "alert-danger";
        } else {
            $result = $notlogin->check_loggedin($userName);
            $UNum = mysqli_num_rows($result);
            if ($UNum == 0) {
                $MessageError = "Username Not Found";
                $ErrorStatus = "alert-danger";
            } else {
                $row = mysqli_fetch_assoc($result);
                if (count($row) < 1) {
                    $MessageError = "Invalid Cadational";
                    $ErrorStatus = "alert-danger";
                } else {
                    if (!password_verify($password, $row['password'])) {
                        $MessageError = "Password Incorrect";
                        $ErrorStatus = "alert-danger";
                    } else {
                        $_SESSION['email'] = $row['email'];
                        $user_id = $_SESSION['user_id'] = $row['user_id'];
                        $Pnum = mysqli_num_rows($notlogin->check_profile($user_id));
                        if ($Pnum == 0) {
                            if ($notlogin->login($user_id)) {
                                header("location: /app/view/home.php");
                                $_SESSION['loggedin'] = true;
                            }
                        } 
                        else {
                            if ($Pnum == 1) {
                                header("location: /app/view/home.php");
                                $_SESSION['loggedin'] = true;
                            }
                        }
                    }
                }
            }
        }
    }
}
