<?php 

require("../conn/conn.php");
session_start();

$user_id = $_SESSION['user_id'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction History</title>
    <link rel="stylesheet" href="styles9.css"> <!-- Ensure this path is correct -->
</head>
<body>
    <header class="header"> <!-- Added class for styling -->
        <h1>Transaction History</h1>
        <nav style="margin-top: 1rem;">
            <a href="../dashboard.php">Home</a>
            <a href="../wallet/wallet.php">Wallet</a>
            <a href="trade.php">Trade</a>
        </nav>
    </header>
    <main class="history-container"> <!-- Ensure this class is applied -->
        <table>
            <thead>
                <tr>
                    <th>Crypto Name</th>
                    <th>Amount (₹)</th>
                    <th>Quantity</th>
                    <th>Order Type</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody id="transactionTableBody">
            <?php 
                $query11 = "SELECT * FROM `order_tbl` where user_id = '$user_id'";
                $a11 = mysqli_query($con, $query11);
                $b11 = mysqli_num_rows($a11);
                if($b11){
                    while ($row11 = mysqli_fetch_assoc($a11)) {
                        echo '<tr>
                        <td>'. $row11['order_name'] .'</td>
                        <td>₹'. $row11['order_price'] .'</td>
                        <td>'. $row11['order_quantity'] .'</td>
                        <td>'. $row11['order_type'] .'</td>
                        <td>Successful</td>
                    </tr>';
                    }
                }else{
                    echo '<h1>No Data Found</h1>';
                }
                ?>
            </tbody>
        </table>
    </main>
</body>
</html>
