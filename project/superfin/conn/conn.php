<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "superfin";

$con = mysqli_connect($server, $username, $password, $database);

if($con){
    // echo "Connection Successful";
}else{
    echo "<script>alert('Connection Failed');</script>";
}

?>