<?php
error_reporting(E_ALL ^ E_NOTICE);
include_once("../controllers/user_controlers.php");
session_start();

if (isset($_POST['shop_email'])) {

    $name = $_POST['shop_name'];
    $address = $_POST['shop_address'];
    $logo = $_POST['shop_logo'];
    $ower = $_POST['shop_ower'];
    $idcard = $_POST['shop_idcard'];
    $phone = $_POST['shop_phone'];
    $email = $_POST['shop_email'];
    $password = $_POST['shop_password'];

    user_controler::shopSignup($name, $address, $logo, $ower, $idcard, $phone, $email, $password);
}

if (isset($_POST['shop_otp'])) {
    user_controler::checkOTP($_SESSION['email_signup'], $_POST['shop_otp']);
}

if (isset($_POST['login_email']) && isset($_POST['login_pass'])) {
    user_controler::logIn($_POST['login_email'], $_POST['login_pass']);
}

if (isset($_GET['loged_in'])) {
    if (isset($_SESSION['shop'])) {
        user_controler::getUserProfile($_SESSION['shop']);
    } else {
        echo json_encode(array('status' => false, 'msg' => 'chua dang nhap'));
    }
}

if (isset($_GET['log_out'])) {
    unset($_SESSION['shop']);
}