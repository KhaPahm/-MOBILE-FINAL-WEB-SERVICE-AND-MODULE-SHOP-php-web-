<?php
include_once("../models/customer.php");

class customer_controler
{
    public function __construct()
    {
    }

    public static function signUp($email, $pass, $phone, $name)
    {
        customer::signUp($email, $pass, $phone, $name);
    }

    public static function login($eamil, $pass)
    {
        customer::login($eamil, $pass);
    }

    public static function changePass($email, $old_pas, $newPass)
    {
        customer::changePass($email, $old_pas, $newPass);
    }
}