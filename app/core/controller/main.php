<?php
require_once __DIR__ . '../../../model/class.users.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $user = new Users();
    $Email = $_SESSION['email'];
    $user_id = $_SESSION['user_id'];
}
