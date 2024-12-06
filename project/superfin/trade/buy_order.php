<?php 

require("../conn/conn.php");
session_start();

$user_id = $_SESSION['user_id'];

$order_name = $_POST['order_name'];
$order_price = $_POST['order_price'];
$order_quantity = $_POST['order_quantity'];
$order_type = "BUY";
$amountHave = ($order_price*$order_quantity)*84;

$balance_sql = "SELECT * FROM wallet_tbl WHERE user_id = '$user_id'";
$balance_result = mysqli_query($con, $balance_sql);

if ($balance_result) {
    $balance_row = mysqli_fetch_assoc($balance_result);
    $wallet_balance = $balance_row['funds'];

    if ($wallet_balance >= $amountHave) {
        $final_balance = $wallet_balance - $amountHave;
        $sql1 = "UPDATE wallet_tbl SET funds='$final_balance' where user_id='$user_id'";
        $sql = "INSERT INTO order_tbl (user_id, order_name, order_price, order_quantity, order_type) VALUES ('$user_id','$order_name', '$amountHave', '$order_quantity', '$order_type')";

        $get_trade = "SELECT * FROM trade_tbl WHERE user_id = '$user_id' and order_name='$order_name'";
        $get_trade1 = mysqli_query($con, $get_trade);
        $trade_name = mysqli_num_rows($get_trade1);

        if ($trade_name) {
            while ($row11 = mysqli_fetch_assoc($get_trade1)) {
                $trade_qun = $row11['order_quantity'];
                $trade_price = $row11['order_price'];
            }
            $final_order_quantity = $order_quantity + $trade_qun;
            $final_order_price = $amountHave + $trade_price;
            $sql2 = "UPDATE trade_tbl SET order_quantity='$final_order_quantity', order_price='$final_order_price' where user_id='$user_id' and order_name='$order_name'";
        } else {
            $sql2 = "INSERT INTO trade_tbl (user_id, order_name, order_price, order_quantity, order_type) VALUES ('$user_id','$order_name', '$amountHave', '$order_quantity', '$order_type')";
        }

        if (mysqli_query($con, $sql) && mysqli_query($con, $sql1) && mysqli_query($con, $sql2)) {
            echo "<script type='text/javascript'>
                    alert('Order Placed Successfully');
                    window.location.href = 'trade.php';
                </script>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }else {
        echo "<script type='text/javascript'>
                alert('Insufficient funds in your wallet.');
                window.location.href = 'trade.php';
              </script>";
    }
}