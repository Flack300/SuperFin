<?php 

require("../conn/conn.php");
session_start();

if (!isset($_SESSION['login']) || $_SESSION['login'] != true) {
    header("location:signup/index.php");
    exit;
}

$user_id = $_SESSION['user_id'];

$query11 = "SELECT * FROM `trade_tbl` WHERE user_id = '$user_id' AND order_type = 'BUY' AND order_quantity > 0";
$a11 = mysqli_query($con, $query11);
$b11 = mysqli_num_rows($a11);

$sql = "SELECT funds FROM wallet_tbl WHERE user_id = '$user_id'";
$a = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($a);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crypto Portfolio</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="portfolio-container">
        <!-- Portfolio Header -->
        <div class="portfolio-header">
            <h2>Crypto Portfolio</h2>
        </div>

        <!-- Portfolio Stats -->
        <div class="portfolio-stats">
            <?php
                $total_sql = "SELECT SUM(CASE WHEN order_type = 'BUY' THEN order_price ELSE 0 END) AS total_buy FROM trade_tbl WHERE user_id = '$user_id'";

                $a12 = mysqli_query($con, $total_sql);
                $b12 = mysqli_num_rows($a12);
                $row12 = mysqli_fetch_assoc($a12);
                $total_order_price = 0;
                $total_order_price = $row12['total_buy'];
                $formatted_price = number_format($total_order_price, 2, '.', ',');
                if ($b12) {
                    echo '<div class="stat-item">
                        <span class="stat-label">Invested Value</span>
                        <span class="stat-value invested">₹'.$formatted_price.'</span>
                    </div>';
                    echo '<div class="stat-item">
                    <span class="stat-label">Current Value</span>
                    <span class="stat-value current">₹'.$formatted_price.'</span>
                    </div>';
                    echo '<div class="stat-item">
                        <span class="stat-label">Net Gain/Loss</span>
                        <span class="stat-value profit">₹200.00</span>
                        <span class="stat-percent profit">2.28% Profit</span>
                    </div>';
                }else {
                    echo '<h1>No Data Found</h1>';
                }
                ?>
        </div>

        <!-- Cryptos List -->
        <div class="crypto-list">
            <?php 
                
                if($b11){
                    while ($row11 = mysqli_fetch_assoc($a11)) {
                        echo '<div class="crypto-item" id="numeraire">
                        <h2>'. $row11['order_name'] .'</h2>
                        <div class="crypto-stats">
                            <div class="quantity">Quantity: '. $row11['order_quantity'] .'</div>
                            <div class="current">Current: ₹'. $row11['order_price'] .'.00</div>
                            <div class="total-profit profit">profit: ₹100 (+2.50%)</div>
                        </div>
                    </div>';
                    }
                }else{
                    echo '<h1>No Data Found</h1>';
                }
            ?>
            
        </div>

        <!-- Wallet -->
        <div class="wallet">
            <span class="wallet-balance">₹<?php echo $row['funds'] ?></span>
            <a href="../wallet/wallet.php" style="text-decoration:none;" class="wallet-btn">Wallet</a>
            <a href="../trade/trade.php" style="text-decoration:none;" class="wallet-btn">Trade</a>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>