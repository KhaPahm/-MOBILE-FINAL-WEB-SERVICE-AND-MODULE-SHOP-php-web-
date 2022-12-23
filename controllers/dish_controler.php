<?php
include_once '../models/dish.php';
class dish_controler
{
    public function __construct()
    {
    }

    public static function addDish($name, $notes, $price, $img, $email, $type)
    {
        return dish::addDish($name, $notes, $price, $img, $email, $type);
    }

    public static function getDishes($email)
    {
        return dish::getDishes($email);
    }

    public static function deleteDish($id)
    {
        return dish::deleteDish($id);
    }

    public static function getDishes_rice()
    {
        return dish::getDishes_rice();
    }

    public static function getDishes_bread()
    {
        return dish::getDishes_bread();
    }

    public static function getDishes_drink()
    {
        return dish::getDishes_drink();
    }

    public static function getDishes_nodel()
    {
        return dish::getDishes_nodel();
    }
}