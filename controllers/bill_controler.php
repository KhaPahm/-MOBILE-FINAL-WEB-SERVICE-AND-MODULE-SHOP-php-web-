<?php
include_once("../models/bill.php");

class bill_controler
{
    public function __construct()
    {
    }

    public static function getNewBill($email)
    {
        bill::getNewBill($email);
    }

    public static function getDoneBill($email)
    {
        bill::getDoneBill($email);
    }

    public static function updateBill($id)
    {
        bill::updateBill($id);
    }

    public static function getBillDetails($id)
    {
        bill::getBillDetails($id);
    }

    public static function addBill($email, $price, $shopID, $amount, $dish_id)
    {
        bill::addBill($email, $price, $shopID, $amount, $dish_id);
    }

    public static function getBillWait($email)
    {
        bill::getBillWait($email);
    }

    public static function deleteDishInBillID($bill_id, $dish_id)
    {
        bill::deleteDishInBillID($bill_id, $dish_id);
    }

    public static function orderBill($bill_id, $address)
    {
        bill::orderBill($bill_id, $address);
    }

    public static function getHistory($email)
    {
        bill::getHistory($email);
    }
}