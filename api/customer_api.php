<?php
error_reporting(E_ALL ^ E_NOTICE);
include_once("../controllers/customer_controler.php");

if (isset($_POST['name_signup']) && isset($_POST['email_signup']) && isset($_POST['phone_signup']) && isset($_POST['pass_signup'])) {
    customer_controler::signUp($_POST['email_signup'], $_POST['pass_signup'], $_POST['phone_signup'], $_POST['name_signup']);
}

if (isset($_POST['eamil_login']) && isset($_POST['password_login'])) {
    customer_controler::login($_POST['eamil_login'], $_POST['password_login']);
}

if (isset($_POST['old_pass'])) {
    customer_controler::changePass($_POST['change_email'], $_POST['old_pass'], $_POST['new_pass']);
}