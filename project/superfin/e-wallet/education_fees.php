<?php

require("../conn/conn.php");
session_start();
$user_id = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $studentName = $con->real_escape_string($_POST['studentName']);
    $studentId = $con->real_escape_string($_POST['studentId']);
    $institution = $con->real_escape_string($_POST['institution']);
    $feesAmount = $con->real_escape_string($_POST['feesAmount']);

    // Validate student ID (assuming it should not be empty)
    if (empty($studentId)) {
        echo json_encode(['success' => false, 'message' => 'Invalid student ID.']);
        exit;
    }

    // Validate the fees amount
    if ($feesAmount <= 0) {
        echo json_encode(['success' => false, 'message' => 'Invalid fees amount.']);
        exit;
    }

    $query1 = "SELECT * FROM `wallet_tbl` WHERE user_id = '$user_id'";
        $result1 = mysqli_query($con, $query1);
        $wallet = mysqli_fetch_assoc($result1);

        if ($wallet) {
            $balance = $wallet['funds'];

            // Check if the withdrawal amount is less than or equal to the balance
            if ($feesAmount <= $balance) {
                $final_balance = $balance - $feesAmount;
                $sql = "UPDATE wallet_tbl SET funds='$final_balance' WHERE user_id='$user_id'";
    
    $sql1 = "INSERT INTO education_fees (user_id, student_name, student_id, institution, fees_amount) VALUES ('$user_id', '$studentName', '$studentId', '$institution', '$feesAmount')";

    // Execute the query
    if (mysqli_query($con, $sql) && mysqli_query($con, $sql1)) {
        echo json_encode(['success' => true, 'message' => 'Education fees paid successfully.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error: ' . mysqli_error($conn)]);
    }
            } else {
                echo json_encode(['success' => true, 'message' => 'You do not have enough money in wallet.']);
            }
        }
    }