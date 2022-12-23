<?php
include_once("../controllers/bill_controler.php");
session_start();

if (isset($_GET['new_bill'])) {
    bill_controler::getNewBill($_SESSION['shop']);
}


if (isset($_GET['done_bill'])) {
    bill_controler::getDOneBill($_SESSION['shop']);
}

if (isset($_POST['update_bill_id'])) {
    bill_controler::updateBill($_POST['update_bill_id']);
}

if (isset($_POST['get_bill_id'])) {
    bill_controler::getBillDetails($_POST['get_bill_id']);
}

if (isset($_POST['addbill_dish_id'])) {
    bill_controler::addBill(
        $_POST['addbill_email'],
        $_POST['addbill_price'],
        $_POST['addbill_shopID'],
        $_POST['addbill_amount'],
        $_POST['addbill_dish_id']
    );
}

if (isset($_GET['bill_wait'])) {
    bill_controler::getBillWait($_GET['bill_wait']);
}

if (isset($_POST['bill_id_de'])) {
    bill_controler::deleteDishInBillID($_POST['bill_id_de'], $_POST['dish_id_de']);
}

if (isset($_POST['order_bill_id'])) {
    bill_controler::orderBill($_POST['order_bill_id'], $_POST['address_order']);
}

if (isset($_GET['email_history'])) {
    bill_controler::getHistory($_GET['email_history']);
}