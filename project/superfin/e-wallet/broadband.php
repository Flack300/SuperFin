<?php
require("../conn/conn.php");
session_start();
$user_id = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $accountNumber = $_POST['accountNumber'];
    $serviceProvider = $_POST['serviceProvider'];
    $billAmount = $_POST['billAmount'];

    
    if (!is_numeric($accountNumber) || $billAmount <= 0) {
        echo json_encode(['success' => false, 'message' => 'Invalid input.']);
        exit;
    }

    $query1 = "SELECT * FROM `wallet_tbl` WHERE user_id = '$user_id'";
        $result1 = mysqli_query($con, $query1);
        $wallet = mysqli_fetch_assoc($result1);

        if ($wallet) {
            $balance = $wallet['funds'];

            // Check if the withdrawal amount is less than or equal to the balance
            if ($billAmount <= $balance) {
                $final_balance = $balance - $billAmount;
                $sql = "UPDATE wallet_tbl SET funds='$final_balance' WHERE user_id='$user_id'";
    
                $sql1 = "INSERT INTO broadband_payments (user_id, account_number, service_provider, bill_amount) VALUES ('$user_id', '$accountNumber', '$serviceProvider', '$billAmount')";

    if (mysqli_query($con, $sql) && mysqli_query($con, $sql1)) {
        echo json_encode(['success' => true, 'message' => 'Broadband bill paid successfully.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error: ' . mysqli_error($conn)]);
    }
    } else {
        echo json_encode(['success' => true, 'message' => 'You do not have enough money in wallet.']);
    }
}
}