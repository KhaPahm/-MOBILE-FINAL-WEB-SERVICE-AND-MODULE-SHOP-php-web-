<?php
include_once("../models/user.php");
class user_controler
{
    public function __construct()
    {
    }

    public static function logIn($email, $password)
    {
        user::logIn($email, $password);
    }

    public static function shopSignup($name, $address, $logo, $ower, $idcard, $phone, $email, $password)
    {
        user::shopSignup($name, $address, $logo, $ower, $idcard, $phone, $email, $password);
    }

    public static function checkOTP($email, $otp)
    {
        user::checkOTP($email, $otp);
    }

    public static function getUserProfile($email)
    {
        user::getUserProfile($email);
    }
}