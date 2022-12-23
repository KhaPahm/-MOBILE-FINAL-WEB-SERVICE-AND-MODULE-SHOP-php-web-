<?php
class dish
{
    public function __construct()
    {
    }

    public static function addDish($name, $notes, $price, $img, $email, $type)
    {
        require_once '../database/database.php';
        $query = "insert into dish (name, ingredients, price, img, shop_id, type) value ('" . $name . "', '" . $notes . "', " . $price . ", '" . $img . "', (select shop_id from shop where email = '" . $email . "'), '" . $type . "')";
        // echo $query;
        $conn->query($query);
        echo json_encode(array("status" => true, 'msg' => 'Add doneS'));
    }

    public static function getDishes($email)
    {
        require_once '../database/database.php';
        $query = "select d.dish_id, d.name, d.ingredients, d.price, d.img from dish d join (select shop_id, email from shop) s on d.shop_id = s.shop_id where s.email = '" . $email . "' and d.deleted = 0";
        $result = $conn->query($query);
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        echo json_encode(array('status' => true, 'data' => $data));
    }

    public static function deleteDish($id)
    {
        require_once '../database/database.php';
        $query = 'update Dish set deleted = true where dish_id = ' . $id;
        // echo ($query);
        $conn->query($query);
        echo json_encode(array('status' => true, 'msg' => 'Dish was deleted!'));
    }

    public static function getDishes_rice()
    {
        require_once '../database/database.php';
        $query = "select d.dish_id, d.name, d.ingredients, d.price, d.img, s.name as shop_name, d.shop_id from dish d join (select shop_id, name from shop) s on d.shop_id = s.shop_id where d.deleted = 0 and d.type='RICE'";
        $result = $conn->query($query);
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        echo json_encode(array('status' => true, 'data' => $data));
    }

    public static function getDishes_nodel()
    {
        require_once '../database/database.php';
        $query = "select d.dish_id, d.name, d.ingredients, d.price, d.img, s.name as shop_name, d.shop_id from dish d join (select shop_id, name from shop) s on d.shop_id = s.shop_id where d.deleted = 0 and d.type='NODEL'";
        $result = $conn->query($query);
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        echo json_encode(array('status' => true, 'data' => $data));
    }

    public static function getDishes_bread()
    {
        require_once '../database/database.php';
        $query = "select d.dish_id, d.name, d.ingredients, d.price, d.img, s.name as shop_name, d.shop_id from dish d join (select shop_id, name from shop) s on d.shop_id = s.shop_id where d.deleted = 0 and d.type='BREAD'";
        $result = $conn->query($query);
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        echo json_encode(array('status' => true, 'data' => $data));
    }

    public static function getDishes_drink()
    {
        require_once '../database/database.php';
        $query = "select d.dish_id, d.name, d.ingredients, d.price, d.img, s.name as shop_name, d.shop_id from dish d join (select shop_id, name from shop) s on d.shop_id = s.shop_id where d.deleted = 0 and d.type='DRINK'";
        $result = $conn->query($query);
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        echo json_encode(array('status' => true, 'data' => $data));
    }
}