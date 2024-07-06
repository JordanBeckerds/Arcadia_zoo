<?php
session_start();

function check_login() {
    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit();
    }
}

function check_admin() {
    if (!isset($_SESSION['user_id']) || $_SESSION['user_id'] != 1) {
        header("Location: ../public/login.php");
        exit();
    }
}

function check_vet() {
    if (!isset($_SESSION['user_id']) || $_SESSION['user_id'] != 2) {
        header("Location: ../public/login.php");
        exit();
    }
}

function check_employee() {
    if (!isset($_SESSION['user_id']) || $_SESSION['user_id'] != 3) {
        header("Location: ../public/login.php");
        exit();
    }
}

?>

