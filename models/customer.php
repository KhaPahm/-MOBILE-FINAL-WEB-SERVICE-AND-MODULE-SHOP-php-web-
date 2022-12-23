<?php
class customer
{
    public function __construct()
    {
    }

    public static function signUp($email, $pass, $phone, $name)
    {
        function hashPassword($pass)
        {
            $options = [
                'cost' => 10,
            ];
            $hpass = password_hash($pass, PASSWORD_BCRYPT, $options);
            return $hpass;
        }
        require_once '../database/database.php';
        $checkUser = 'select * from Account where email = "' . $email . '"';
        $reCheck = $conn->query($checkUser);
        if ($reCheck->num_rows == 1) {
            echo json_encode(array("status" => false, 'msg' => 'User has been use!'));
        } else {

            $hpass = hashPassword($pass);
            $insertAccount = 'insert into Account  (email, password, verify, otp, role) values ("' . $email . '", "' . $hpass . '", true, 0, 1)';
            $conn->query($insertAccount);
            $insertUser = 'insert into Customer (name, dateofbirth, email, avatar,phone) values ("' . $name . '", now(),"' . $email . '","","' . $phone . '")';
            $conn->query($insertUser);
            echo json_encode(array("status" => true, 'msg' => 'Sign up done!'));
        }
    }

    public static function login($eamil, $pass)
    {
        require_once '../database/database.php';
        $query = "select * from Account where email = '" . $eamil . "' and role = 1";
        $resultCheck = $conn->query($query);
        if ($resultCheck->num_rows == 0) {
            echo json_encode(array("status" => false, 'msg' => 'Wrong password'));
        } else {
            while ($row = $resultCheck->fetch_assoc()) {
                $password = $row['password'];
                if (password_verify($pass, $password)) {
                    setcookie("customer", $eamil, time() + (86400 * 30));
                    $customerInfro = "select * from customer where email = '" . $eamil . "'";
                    $resultCustomerInfor = $conn->query($customerInfro);
                    $data = array();
                    while ($row = $resultCustomerInfor->fetch_assoc()) {
                        $data[] = $row;
                    }
                    echo json_encode(array("status" => true, 'customer' => $data));
                } else {
                    echo json_encode(array("status" => false, 'msg' => 'Wrong password'));
                }
            }
        }
    }

    public static function changePass($email, $old_pas, $newPass)
    {
        function hashPassword1($pass)
        {
            $options = [
                'cost' => 10,
            ];
            $hpass = password_hash($pass, PASSWORD_BCRYPT, $options);
            return $hpass;
        }
        require_once '../database/database.php';
        $query = "select * from Account where email = '" . $email . "' and role = 1";
        $resultCheck = $conn->query($query);
        $p = "";
        while ($row = $resultCheck->fetch_assoc()) {
            $p = $row['password'];
        }

        if (password_verify($old_pas, $p)) {
            $hpass = hashPassword1($newPass);
            $update = "update Account set password =  '" . $hpass . "' where email = '" . $email . "'";
            $conn->query($update);
            echo json_encode(array("status" => true, 'msg' => 'UPpdated new password'));
        } else {
            echo json_encode(array("status" => false, 'msg' => 'wrong password'));
        }
    }
}