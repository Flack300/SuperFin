<?php 

require("../conn/conn.php");
session_start();

$user_id = $_SESSION['user_id'];

$withdraw_amount = $_POST['withdraw_amount'];
$wallet_password = $_POST['wallet_password'];

// Fetch the user's password hash
$query = "SELECT * FROM `user_tbl` WHERE user_id = '$user_id'";
$result = mysqli_query($con, $query);
$user = mysqli_fetch_assoc($result);

if ($user) {
    $ps = $user['pass'];
    $hash = password_verify($wallet_password, $ps);

    if ($hash) {
        // Fetch the user's wallet balance
        $query1 = "SELECT * FROM `wallet_tbl` WHERE user_id = '$user_id'";
        $result1 = mysqli_query($con, $query1);
        $wallet = mysqli_fetch_assoc($result1);

        if ($wallet) {
            $balance = $wallet['funds'];

            // Check if the withdrawal amount is less than or equal to the balance
            if ($withdraw_amount <= $balance) {
                $final_balance = $balance - $withdraw_amount;
                $sql = "UPDATE wallet_tbl SET funds='$final_balance' WHERE user_id='$user_id'";
                $sql1 = "INSERT INTO wallet_history_tbl (user_id, wallet_amount, tran_type) VALUES ('$user_id', '$withdraw_amount','WITHDRAW')";

                if (mysqli_query($con, $sql) && mysqli_query($con, $sql1)) {
                    echo "<script type='text/javascript'>
                            alert('Withdrawal Successful');
                            window.location.href = 'wallet.php';
                          </script>";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($con);
                }
            } else {
                echo "<script type='text/javascript'>
                        alert('Insufficient funds');
                        window.location.href = 'wallet.php';
                      </script>";
            }
        } else {
            echo "<script type='text/javascript'>
                    alert('Wallet not found');
                    window.location.href = 'wallet.php';
                  </script>";
        }
    } else {
        echo "<script type='text/javascript'>
                alert('Invalid wallet password');
                window.location.href = 'wallet.php';
              </script>";
    }
} else {
    echo "<script type='text/javascript'>
            alert('User not found');
            window.location.href = 'wallet.php';
          </script>";
}

?>
