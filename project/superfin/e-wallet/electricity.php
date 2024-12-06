<?php

require("../conn/conn.php");
session_start();
$user_id = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $consumerNumber = $con->real_escape_string($_POST['consumerNumber']);
    $electricityBoard = $con->real_escape_string($_POST['electricityBoard']);
    $billAmount = $con->real_escape_string($_POST['billAmount']);

    // Validate consumer number (exactly 11 digits)
    if (strlen($consumerNumber) !== 11 || !is_numeric($consumerNumber)) {
        echo json_encode(['success' => false, 'message' => 'Invalid consumer number.']);
        exit;
    }

    // Validate the bill amount
    if ($billAmount <= 0) {
        echo json_encode(['success' => false, 'message' => 'Invalid bill amount.']);
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
    
    $sql1 = "INSERT INTO electricity_payments (user_id, consumer_number, electricity_board, bill_amount) VALUES ('$user_id', '$consumerNumber', '$electricityBoard', '$billAmount')";

    // Execute the query
    if (mysqli_query($con, $sql) && mysqli_query($con, $sql1)) {
        echo json_encode(['success' => true, 'message' => 'Electricity bill paid successfully.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error: ' . mysqli_error($conn)]);
    }
            } else {
                echo json_encode(['success' => true, 'message' => 'You do not have enough money in wallet.']);
            }
        }
    }