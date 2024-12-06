<?php 

require("../conn/conn.php");
session_start();

$user_id = $_SESSION['user_id'];

$order_name = $_POST['order_name'];
$order_price = $_POST['order_price'];
$order_quantity = $_POST['order_quantity'];
$order_type = "SELL";
$amountHave = ($order_price*$order_quantity)*84;

$balance_sql = "SELECT * FROM trade_tbl WHERE user_id = '$user_id' and order_name='$order_name'";
$balance_result = mysqli_query($con, $balance_sql);
$balance_num = mysqli_num_rows($balance_result);
        

if ($balance_num) {

    $balance = "SELECT * FROM wallet_tbl WHERE user_id = '$user_id'";
    $balance1 = mysqli_query($con, $balance);
    $balance2 = mysqli_num_rows($balance1);
    if ($balance2) {
        $balance3 = mysqli_fetch_assoc($balance1);
        $wallet_balance = $balance3['funds'];
    } else {
        echo "<script type='text/javascript'>
            alert('Wallet Fetch Error.');
                window.location.href = 'trade.php';
            </script>";
    }

    $balance_row = mysqli_fetch_assoc($balance_result);
    $wallet_quantity = $balance_row['order_quantity'];
    $wallet_price = $balance_row['order_price'];
    
    if ($wallet_quantity >= $order_quantity) {
        $final_balance = $wallet_balance + $amountHave;
        $sql1 = "UPDATE wallet_tbl SET funds='$final_balance' where user_id='$user_id'";
        $sql = "INSERT INTO order_tbl (user_id, order_name, order_price, order_quantity, order_type) VALUES ('$user_id','$order_name', '$amountHave', '$order_quantity', '$order_type')";
        $final_order_quantity = $wallet_quantity - $order_quantity;
        $final_order_price = $wallet_price - $amountHave;
        $sql2 = "UPDATE trade_tbl SET order_quantity='$final_order_quantity', order_price='$final_order_price' where user_id='$user_id' and order_name='$order_name'";
        
        if (mysqli_query($con, $sql) && mysqli_query($con, $sql1) && mysqli_query($con, $sql2)) {
            echo "<script type='text/javascript'>
            alert('Order Placed Successfully');
            window.location.href = 'trade.php';
            </script>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "<script type='text/javascript'>
        alert('Invalid Crypto Quantity.');
        window.location.href = 'trade.php';
      </script>";
    }
}else {
    echo "<script type='text/javascript'>
    alert('You do not have this crypto in your wallet.');
        window.location.href = 'trade.php';
      </script>";
}