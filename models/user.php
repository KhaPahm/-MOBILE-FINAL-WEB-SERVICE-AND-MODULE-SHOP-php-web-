<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class user
{
    public static function logIn($email, $password)
    {
        require_once '../database/database.php';
        $query = "select * from Account where email = '" . $email . "'";
        $result = $conn->query($query);
        $count = $result->num_rows;
        if ($count <= 0) {
            echo json_encode(array("status" => false));
        } else {
            while ($row = $result->fetch_assoc()) {
                $p = $row['password'];
                $v = $row['verify'];
                $r = $row['role'];
                if ($v == 1) {
                    if ($r == 3) {
                        if (password_verify($password, $p)) {
                            session_start();
                            $_SESSION['shop'] = $email;
                            echo json_encode(array("status" => true, 'msg' => 'Login done!'));
                        } else {
                            echo json_encode(array("status" => false, 'msg' => 'Wrong password or email!'));
                        }
                    } else {
                        echo json_encode(array("status" => false, 'msg' => 'Wrong password or email!'));
                    }
                } else {
                    echo json_encode(array("status" => false, 'msg' => 'Wrong password or email!'));
                }
            }
        }
    }

    public static function shopSignup($name, $address, $logo, $ower, $idcard, $phone, $email, $password)
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
        $checkUser = 'select * from Account where email = "' . $email . '" and role = 3';
        $result = $conn->query($checkUser);
        if ($result->num_rows == 1) {
            echo json_encode(array("status" => false, 'msg' => 'Email has been use!'));
        } else {
            $hpass = hashPassword($password);
            $otp = rand(1000, 9999);
            $insertAccount = 'insert into Account (email, password, otp, role) values ("' . $email . '", "' . $hpass . '", "' . $otp . '", 3)';
            // echo $insertAccount;
            $conn->query($insertAccount);
            $insertShopInfor = 'insert into Shop (name, address, logo, owner, owneridcard, phone, email)
                                values ("' . $name . '", "' . $address . '", "' . $logo . '", "' . $ower . '", "' . $idcard . '", "' . $phone . '", "' . $email . '")';
            $conn->query($insertShopInfor);
            user::verifyUser($email, $otp);
            session_start();
            $_SESSION['email_signup'] = $email;
            echo json_encode(array("status" => true, 'msg' => 'Send otp!'));
        }
    }

    public static function checkOTP($email, $otp)
    {
        require_once '../database/database.php';
        $check = "select * from Account where email = '" . $email . "' and otp = " . $otp . "";
        $resultCheck = $conn->query($check);
        $countUser = $resultCheck->num_rows;
        if ($countUser == 1) {
            $updateVerify = "update account set verify = true where email = '" . $email . "';";
            $conn->query($updateVerify);
            //clear session email-signup and set session logined
            session_start();
            unset($_SESSION['email_signup']);
            echo json_encode(array("status" => true, 'msg' => 'signup done!'));
        } else {
            echo json_encode(array("status" => false, 'msg' => 'Wrong otp'));
        }
    }

    public static function verifyUser($email, $otp)
    {
        require "../vendor/autoload.php";
        $mail = new PHPMailer(true);
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;

        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "khapham1909@gmail.com";
        $mail->Password = "addqthixfgyptkbn";
        $mail->SMTPSecure = "ssl";
        $mail->Port = 465;

        $mail->setFrom('khapham1909@gmail.com');
        $mail->addAddress($email);
        $mail->isHTML(true);

        $mail->Subject = "[NO REPLY] VERIFY YOUR ACCOUNT IN KHQ FOOD";
        $mail->Body = "<div>Hi,</div> <br> <div>This is your otp: </div> <h3>" . $otp . "</h3> <br> <div>Thank you!</div>";
        $mail->send();
    }

    public static function getUserProfile($email)
    {
        require_once '../database/database.php';
        $query = 'select * from shop where email = "' . $email . '"';
        $result = $conn->query($query);
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        echo json_encode(array("status" => true, 'message' => 'Get users done!', 'data' => $data));
    }
}