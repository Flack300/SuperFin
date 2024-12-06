<?php 

require("../conn/conn.php");
session_start();

$user_id = $_SESSION['user_id'];

$add_amount = $_POST['add_amount'];
$wallet_password = $_POST['wallet_password'];

$query = "SELECT * FROM `user_tbl` where user_id = '$user_id'";
    $a = mysqli_query($con, $query);
    $b = mysqli_num_rows($a);

    while ($row = mysqli_fetch_assoc($a)) {
        $ps = $row['pass'];
    }
    $hash = password_verify($wallet_password, $ps);

    if ($hash) {

        $query1 = "SELECT * FROM `wallet_tbl` where user_id = '$user_id'";
        $a1 = mysqli_query($con, $query1);
        $b1 = mysqli_num_rows($a1);
        if($b1){
            while ($row1 = mysqli_fetch_assoc($a1)) {
                $balance = $row1['funds'];
            }
            $final_add = $balance + $add_amount;
            $sql = "UPDATE wallet_tbl SET funds='$final_add' where user_id='$user_id'";
            $sql1 = "INSERT INTO wallet_history_tbl (user_id, wallet_amount, tran_type) VALUES ('$user_id', '$add_amount','DEPOSIT')";
        }else{
            $sql = "INSERT INTO wallet_tbl (user_id, funds) VALUES ('$user_id', '$add_amount')";
            $sql1 = "INSERT INTO wallet_history_tbl (user_id, wallet_amount, tran_type) VALUES ('$user_id', '$add_amount','DEPOSIT')";
        }
        

        if (mysqli_query($con, $sql) && mysqli_query($con, $sql1)) {
            echo "<script type='text/javascript'>
                    alert('Order Placed Successfully');
                    window.location.href = 'wallet.php';
                </script>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

}else{
    echo "<script type='text/javascript'>
                    alert('Password Incorrect');
                    window.location.href = 'wallet.php';
                </script>";
}