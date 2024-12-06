<?php

require("../conn/conn.php");
session_start();
$user_id = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customerId = $con->real_escape_string($_POST['customerId']);
    $gasProvider = $con->real_escape_string($_POST['gasProvider']);
    $bookingAmount = $con->real_escape_string($_POST['bookingAmount']);

    // Validate customer ID
    if (empty($customerId)) {
        echo json_encode(['success' => false, 'message' => 'Invalid Customer ID.']);
        exit;
    }

    // Validate the booking amount
    if ($bookingAmount <= 0) {
        echo json_encode(['success' => false, 'message' => 'Invalid booking amount.']);
        exit;
    }

    $query1 = "SELECT * FROM `wallet_tbl` WHERE user_id = '$user_id'";
        $result1 = mysqli_query($con, $query1);
        $wallet = mysqli_fetch_assoc($result1);

        if ($wallet) {
            $balance = $wallet['funds'];

            if ($bookingAmount <= $balance) {
                $final_balance = $balance - $bookingAmount;
                $sql = "UPDATE wallet_tbl SET funds='$final_balance' WHERE user_id='$user_id'";
    

    $sql1 = "INSERT INTO gas_bookings (user_id, customer_id, gas_provider, booking_amount, status) VALUES ('$user_id', '$customerId', '$gasProvider', '$bookingAmount', 'successful')";

    // Execute the query
    if (mysqli_query($con, $sql) && mysqli_query($con, $sql1)) {
        echo json_encode(['success' => true, 'message' => 'Gas cylinder booked successfully.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error: ' . mysqli_error($conn)]);
    }
            } else {
                echo json_encode(['success' => true, 'message' => 'You do not have enough money in wallet.']);
            }
        }
    }
