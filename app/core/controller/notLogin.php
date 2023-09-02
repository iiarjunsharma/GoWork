<?php
require_once __DIR__ . '../../../model/class.notLogin.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    $notlogin = new NotLogin();
}
