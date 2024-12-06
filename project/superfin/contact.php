<?php 

require("conn/conn.php");

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];


$sql = "INSERT INTO contact_tbl (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";

$result = mysqli_query($con, $sql);
                    if ($result) {
                        echo "<script type='text/javascript'>alert('Message Successfully Sented');window.location.href = 'index.php';</script>";
                    } else {
                        echo "<script>alert('Message sending Failed')</script>";
                    }