<?php
require("../conn/conn.php");
session_start();

$user_id = $_SESSION['user_id'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mobileNumber = $_POST['mobileNumber'];
    $operator = $_POST['operator'];
    $amount = $_POST['amount'];

    $query1 = "SELECT * FROM `wallet_tbl` WHERE user_id = '$user_id'";
        $result1 = mysqli_query($con, $query1);
        $wallet = mysqli_fetch_assoc($result1);

        if ($wallet) {
            $balance = $wallet['funds'];

            if ($amount <= $balance) {
                $final_balance = $balance - $amount;
                $sql = "UPDATE wallet_tbl SET funds='$final_balance' WHERE user_id='$user_id'";
    

    $sql1 = "INSERT INTO mobile_recharges (user_id, mobile_number, operator, amount) VALUES ('$user_id', '$mobileNumber', '$operator', '$amount')";

    if (mysqli_query($con, $sql) && mysqli_query($con, $sql1)) {
        echo json_encode(['success' => true, 'message' => 'Mobile recharge successfully.']);
    } else {
        echo json_encode(['failed' => true, 'message' => 'Mobile recharge Failed.']);
    }
            } else {
                echo json_encode(['success' => true, 'message' => 'You do not have enough money in wallet.']);
            }
        }
    }