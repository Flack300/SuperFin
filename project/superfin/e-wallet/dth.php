<?php

require("../conn/conn.php");
session_start();
$user_id = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $subscriberId = $con->real_escape_string($_POST['dthNumber']);
    $operator = $con->real_escape_string($_POST['operator']);
    $amount = $con->real_escape_string($_POST['amount']);

    // Validate subscriber ID and amount
    if (strlen($subscriberId) !== 10 || !is_numeric($subscriberId)) {
        echo json_encode(['success' => false, 'message' => 'Invalid DTH number.']);
        exit;
    }

    if ($amount <= 0) {
        echo json_encode(['success' => false, 'message' => 'Invalid recharge amount.']);
        exit;
    }

    $query1 = "SELECT * FROM `wallet_tbl` WHERE user_id = '$user_id'";
        $result1 = mysqli_query($con, $query1);
        $wallet = mysqli_fetch_assoc($result1);

        if ($wallet) {
            $balance = $wallet['funds'];

            // Check if the withdrawal amount is less than or equal to the balance
            if ($amount <= $balance) {
                $final_balance = $balance - $amount;
                $sql = "UPDATE wallet_tbl SET funds='$final_balance' WHERE user_id='$user_id'";
    
    
                $sql1 = "INSERT INTO dth_recharges (user_id, subscriber_id, operator, amount) VALUES ('$user_id', '$subscriberId', '$operator', '$amount')";

    if (mysqli_query($con, $sql) && mysqli_query($con, $sql1)) {
        echo json_encode(['success' => true, 'message' => 'DTH recharge successful.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error: ' . mysqli_error($conn)]);
    }
    } else {
        echo json_encode(['success' => true, 'message' => 'You do not have enough money in wallet.']);
    }
}
}
