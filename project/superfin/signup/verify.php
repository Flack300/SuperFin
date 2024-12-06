<?php

$x = false;
require("../conn/conn.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $query = "SELECT * FROM `user_tbl` where email = '$email'";
    $a = mysqli_query($con, $query);
    $b = mysqli_num_rows($a);

    while ($row = mysqli_fetch_assoc($a)) {
        $em = $row['email'];
        $ps = $row['pass'];
        $un = $row['username'];
        $cid = $row['user_id'];
        if ($email == $em) {
            $x = true;
        } else {
            $x = false;
            break;
        }
    }

    if ($x == true) {
        if ($em == $email) {
            $result = password_verify($pass, $ps);
            if ($result) {
                session_start();
                $_SESSION['username'] = $un;
                $_SESSION['email'] = $em;
                $_SESSION['user_id'] = $cid;
                $_SESSION['login'] = true;
                header("Location:../dashboard.php");
                exit;
            } else {
                header("Location: index.php?error=pass_incorrect");
                exit;
            }
        } else {
            header("Location: index.php?error=incorrect_email");
            exit;
        }
    } else {
        header("Location: index.php?error=email_not_found");
        exit;
    }
}
