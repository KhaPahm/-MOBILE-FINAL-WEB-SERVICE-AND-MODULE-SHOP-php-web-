<?php
class bill
{
    public function __construct()
    {
    }

    public static function getNewBill($email)
    {
        require_once '../database/database.php';
        $query = 'select * from (select shop_id, customer_id, bill_id, total, state, address from bill) b  
		join (select customer_id, name, phone from customer) c 
        on b.customer_id = c.customer_id 
        where b.shop_id = (select shop_id from shop where email = "' . $email . '") and b.state = "NEW"';
        $result = $conn->query($query);
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        echo json_encode(array('status' => true, 'data' => $data));
    }

    public static function getDoneBill($email)
    {
        require_once '../database/database.php';
        $query = 'select * from (select shop_id, customer_id, bill_id, total, state, address from bill) b  
		join (select customer_id, name, phone from customer) c 
        on b.customer_id = c.customer_id 
        where b.shop_id = (select shop_id from shop where email = "' . $email . '") and b.state = "DONE"';
        $result = $conn->query($query);
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        echo json_encode(array('status' => true, 'data' => $data));
    }

    public static function updateBill($id)
    {
        require_once '../database/database.php';
        $query = 'update Bill set state = "DONE" where bill_id = ' . $id;
        $conn->query($query);
        echo json_encode(array('status' => true, 'msg' => 'UPDATED!'));
    }

    public static function getBillDetails($id)
    {
        require_once '../database/database.php';
        $query = 'select c.name as customer, c.phone, b.address, b.state, b.total, d.name as dish, db.amount from (((select bill_id, total, customer_id, address, state from bill) b 
        join (billdetail db 
            join (select dish_id, name, price from dish) d on db.dish_id = d.dish_id) 
            on b.bill_id = db.bill_id) 
        join (select customer_id, name, phone from customer) c on b.customer_id = c.customer_id)
        where b.bill_id =' . $id;
        $result = $conn->query($query);
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        echo json_encode(array('status' => true, 'data' => $data));
    }

    public static function addBill($email, $price, $shopID, $amount, $dish_id)
    {
        require_once '../database/database.php';
        $checkBill = "select * from bill where customer_id = (select customer_id from customer where email = '" . $email . "') and state = 'WAIT'";
        $resultCheckBill = $conn->query($checkBill);
        if ($resultCheckBill->num_rows == 0) {
            $addBill = "";
            $total = $price * $amount;
            $addBill = "insert into bill (total, date, time, shop_id, customer_id, state, address) 
                                values (" . $total . ", CURDATE(), CURRENT_TIME(), " . $shopID . ", (select customer_id from customer where email = '" . $email . "'), 'WAIT', '1');";
            $conn->query($addBill);
            $addBillDetail = "insert into billdetail values((select MAX(bill_id) from bill where customer_id = (select customer_id from customer where email = '" . $email . "')), " . $dish_id . "," . $amount . ")";
            $conn->query($addBillDetail);
            echo json_encode(array('status' => true));
        } else {
            $checkShopID = "select * from bill where customer_id = (select customer_id from customer where email = '" . $email . "') and state = 'WAIT' and shop_id = " . $shopID;
            $resultcheckShopId = $conn->query($checkShopID);
            if ($resultcheckShopId->num_rows == 0) {
                echo json_encode(array('status' => false, 'msg' => 'Havr to add same shop in a bill!'));
            } else {
                $checkBillDetail = "select * from billdetail where bill_id = (select MAX(bill_id) from bill where customer_id = (select customer_id from customer where email = '" . $email . "')) and dish_id = " . $dish_id;
                $resultCheckBillDetail = $conn->query($checkBillDetail);
                if ($resultCheckBillDetail->num_rows > 0) {
                    $updateBillDetail = "update billdetail set amount = amount + 1 where bill_id = (select MAX(bill_id) from bill where customer_id = (select customer_id from customer where email = '" . $email . "')) and dish_id = " . $dish_id;
                    $conn->query($updateBillDetail);
                } else {
                    $addBillDetail = "insert into billdetail values((select MAX(bill_id) from bill where customer_id = (select customer_id from customer where email = '" . $email . "')), " . $dish_id . "," . $amount . ")";
                    $conn->query($addBillDetail);
                }

                $getBillID = "select bill_id from bill where customer_id = (select customer_id from customer where email = '" . $email . "')";
                $resultBillID = $conn->query($getBillID);
                $bill_id;
                while ($row = $resultBillID->fetch_assoc()) {
                    $bill_id = $row['bill_id'];
                }

                $updaeBill = "update bill set date = CURDATE(), 
                                time = CURRENT_TIME(), 
                                total = (select sum(db.amount*d.price) as purchase
                                        from (select bill_id, dish_id, amount from billdetail) db 
                                        join (select dish_id, price from dish) d 
                                        where db.dish_id = d.dish_id 
                                        and db.bill_id = " . $bill_id . ")
                            where bill_id = " . $bill_id;
                $conn->query($updaeBill);
                echo json_encode(array('status' => true));
            }
        }
    }

    public static function getBillWait($email)
    {
        require_once '../database/database.php';
        $getBillWait = "select db.*, d.name, d.price, d.img from billdetail db join dish d on db.dish_id = d.dish_id 
                        where db.bill_id = (select bill_id from bill where customer_id = (select customer_id from customer where email = '" . $email . "') and state = 'WAIT')";
        $resultBillWait = $conn->query($getBillWait);
        $data = array();
        while ($row = $resultBillWait->fetch_assoc()) {
            $data[] = $row;
        }
        echo json_encode(array('status' => true, 'data' => $data));
    }

    public static function deleteDishInBillID($bill_id, $dish_id)
    {
        require_once '../database/database.php';
        $delete = "delete from billdetail where bill_id = " . $bill_id . " and dish_id = " . $dish_id;
        $conn->query($delete);
        $updaeBill = "update bill set date = CURDATE(), 
                        time = CURRENT_TIME(), 
                        total = (select sum(db.amount*d.price) as purchase
                                from (select bill_id, dish_id, amount from billdetail) db 
                                join (select dish_id, price from dish) d 
                                where db.dish_id = d.dish_id 
                                and db.bill_id = " . $bill_id . ")
                    where bill_id = " . $bill_id;
        $conn->query($updaeBill);
        echo json_encode(array('status' => true, 'msg' => 'Item ' . $dish_id . ' was deleted!'));
    }

    public static function orderBill($bill_id, $address)
    {
        require_once '../database/database.php';
        $order = "update bill set state = 'NEW', address = '" . $address . "' where bill_id =" . $bill_id;
        $conn->query($order);
        echo json_encode(array('status' => true));
    }

    public static function getHistory($email)
    {
        require_once '../database/database.php';
        $getHis = "select bill_id, total, date, state from bill where state <> 'WAIT' and customer_id = (select customer_id from customer where email = '" . $email . "')";
        $result = $conn->query($getHis);
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        echo json_encode(array('status' => true, 'data' => $data));
    }
}