<?php
include_once("../controllers/dish_controler.php");
session_start();

if (isset($_POST['dish_name'])) {
    $name = $_POST['dish_name'];
    $notes = $_POST['dish_notes'];
    $price = $_POST['dish_price'];
    $img = $_POST['dish_img'];
    // session_start();
    $email = $_SESSION['shop'];
    $type = $_POST['dish_type'];
    dish_controler::addDish($name, $notes, $price, $img, $email, $type);
}

if (isset($_GET['dishes'])) {
    $email = $_SESSION['shop'];
    dish_controler::getDishes($email);
}

if (isset($_POST['delete_id'])) {
    dish_controler::deleteDish($_POST['delete_id']);
}

if (isset($_GET['dishes_rice'])) {
    dish_controler::getDishes_rice();
}

if (isset($_GET['dishes_bread'])) {
    dish_controler::getDishes_bread();
}

if (isset($_GET['dishes_nodel'])) {
    dish_controler::getDishes_nodel();
}

if (isset($_GET['dishes_drink'])) {
    dish_controler::getDishes_drink();
}