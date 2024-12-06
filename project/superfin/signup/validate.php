<?php

require("../conn/conn.php");

$query2 = "SELECT * FROM `user_tbl` order by user_id desc limit 1";
$a2 = mysqli_query($con, $query2);
$b2 = mysqli_num_rows($a2);

error_reporting(0);


while ($row2 = mysqli_fetch_assoc($a2)) {
    $z = $row2['user_id'];
    $c_id     = $z;
}

if ($c_id == NULL) {
    $user_id = "1001";
} else {
    $user_id = ($c_id + 1);
}
$x = false;
$y = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];

    $query = "SELECT * FROM `user_tbl`";
    $a = mysqli_query($con, $query);
    $b = mysqli_num_rows($a);

    do {
        $cn = $row['phone'];
        $em = $row['email'];

        if ($phone != $cn) {
            $x = true;
        } else {
            $x = false;
            break;
        }
        if ($email != $em) {
            $y = true;
        } else {
            $y = false;
            break;
        }
    } while ($row = mysqli_fetch_assoc($a));

    if ($x == true) {
        if ($y == true) {
            if ($cpass == $pass) {
                $hash = password_hash($pass, PASSWORD_BCRYPT);
                $sql = "INSERT INTO `user_tbl` (`user_id`,`username`,`email`,`phone`,`pass`) VALUES ('$user_id','$username','$email','$phone','$hash');";
                $result = mysqli_query($con, $sql);
                if ($result) {
                    echo "Insert Successfully";
                    header("Location:index.php");
                    exit;
                } else {
                    echo "<script>alert('Insert Not Submitted')</script>";
                }
            } else {
                header("Location: signup.php?error=pass_not_match");
            exit;
            }
        } else {
            header("Location: signup.php?error=email_same");
            exit;
        }
    } else {
        header("Location: signup.php?error=phone_same");
        exit;
    }
}
