<?php
require_once __DIR__ . '../../controller/notLogin.php';
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $userName = $_POST["userName"];
        $email = $_POST["email"];
        $password = $_POST["pass"];
        $cpassword = $_POST["cpass"];
        if (empty($userName && $email && $password && $cpassword)) {
            $ErrorMessage = "Please fill out All fields";
            $ErrorStatus = "alert-danger";
        } else {
            $UNumExistRows = mysqli_num_rows($notlogin->exist_username($userName));
            if ($UNumExistRows > 0) {
                $ErrorMessage = "Username already Exsist";
                $ErrorStatus = "alert-danger";
            } else {
                $ENumExistRows = mysqli_num_rows($notlogin->exist_email($email));
                if ($ENumExistRows > 0) {
                    $ErrorMessage = "Email already Exsist";
                    $ErrorStatus = "alert-danger";
                } else {
                    if (($password !== $cpassword)) {
                        $ErrorMessage = "Password Do Not Match";
                        $ErrorStatus = "alert-danger";
                    } else {
                        if ($notlogin->add_user($userName, $email, $password)) {
                            $SuccessMessage = "Successfully Join";
                            $SuccessStatus = "alert-success";
                        }
                    }
                }
            }
        }
    }
}
