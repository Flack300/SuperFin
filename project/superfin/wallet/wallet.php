<?php 
require("../conn/conn.php");
session_start();

if (!isset($_SESSION['login']) || $_SESSION['login'] != true) {
    header("location:signup/index.php");
    exit;
}

$user_id = $_SESSION['user_id'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wallet</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="wallet.css">
</head>

<body>
    <div class="wallet-container" style="margin-top: 12rem;">
        <header class="wallet-header">
            <a href="../dashboard.php" class="back-button">&#8592;</a>
            <h1>Wallet</h1>
        </header>
        <section class="balance-section">
            <div class="balance-card">
                <?php 
                $query11 = "SELECT * FROM `wallet_tbl` where user_id = '$user_id'";
                $a11 = mysqli_query($con, $query11);
                $b11 = mysqli_num_rows($a11);
                if($b11){
                    while ($row11 = mysqli_fetch_assoc($a11)) {
                        echo '<p>Current Balance</p>
                        <h2>₹'. $row11['funds'] .'</h2>
                        <p>Locked Balance ₹'. $row11['funds'] .'</p>';
                    }
                }else{
                    echo '<p>Current Balance</p>
                    <h2>₹0</h2>
                    <p>Locked Balance ₹0</p>';
                }
                ?>
                
            </div>
        </section>
        <section class="transaction-history">
            <h2>Transaction History</h2>
            <?php 
                $query1 = "SELECT * FROM `wallet_history_tbl` where user_id = '$user_id'";
                $a1 = mysqli_query($con, $query1);
                $b1 = mysqli_num_rows($a1);
                if($b1){
                    while ($row1 = mysqli_fetch_assoc($a1)) {
                        echo '<div class="transaction-item">
                        <div class="transaction-info">
                            <span class="transaction-type">'. $row1['tran_type'] .'</span>
                            <span class="transaction-status">Complete</span>
                        </div>
                        <div class="transaction-amount">₹'. $row1['wallet_amount'] .'</div>
                    </div>';
                    }
                }else{
                    echo '<div class="transaction-item">
                    <h3>Empty Transcation</h3>
                </div>';
                }
            ?>
        </section>
        <div class="wallet-actions">
    <button type="button" class="btn add-money" data-toggle="modal" data-target="#addMoneyModal">
        Add Money
    </button>
    <button type="button" class="btn add-money" data-toggle="modal" data-target="#withdrawModal">
        Withdraw
    </button>
</div>

<!-- Add Money Modal -->
<div class="modal fade" id="addMoneyModal" tabindex="-1" role="dialog" aria-labelledby="addMoneyModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="addMoneyModalLabel">Add Money</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="add_wallet.php" method="post">
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label for="addAmount" class="text-dark">Add Amount</label>
                            <input type="number" class="form-control mt-2" name="add_amount" id="addAmount" placeholder="Enter amount *" required>
                        </div>
                        <div class="col-md-12">
                            <label for="walletPassword1" class="text-dark">Password</label>
                            <input type="password" class="form-control mt-2" name="wallet_password" id="walletPassword1" placeholder="Password *" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Deposit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Withdraw Modal -->
<div class="modal fade" id="withdrawModal" tabindex="-1" role="dialog" aria-labelledby="withdrawModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="withdrawModalLabel">Withdraw Money</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="withdraw.php" method="post">
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label for="withdrawAmount" class="text-dark">Amount</label>
                            <input type="number" class="form-control mt-2" name="withdraw_amount" id="withdrawAmount" placeholder="Enter amount *" required>
                        </div>
                        <div class="col-md-12">
                            <label for="walletPassword2" class="text-dark">Password</label>
                            <input type="password" class="form-control mt-2" name="wallet_password" id="walletPassword2" placeholder="Password *" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Withdraw</button>
                </div>
            </form>
        </div>
    </div>
</div>

    <script src="wallet.js"></script>
</body>

</html>