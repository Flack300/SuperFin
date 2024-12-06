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
            <a href="index.php">E-Wallet</a>
        </nav>
    </header>
    <main class="history-container"> <!-- Ensure this class is applied -->
        <table>
            <thead>
                <tr>
                    <th>Mobile Number</th>
                    <th>Operator</th>
                    <th>Amount (₹)</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody id="transactionTableBody">
                <?php
                $query = "SELECT * FROM `mobile_recharges` WHERE user_id=$user_id";
                $result = mysqli_query($con, $query);

                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . htmlspecialchars($row['mobile_number']) . "</td>
                                <td>" . htmlspecialchars($row['operator']) . "</td>
                                <td>₹" . htmlspecialchars($row['amount']) . "</td>
                                <td>Successful</td>
                                <td>" . htmlspecialchars($row['created_at']) . "</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5' class='empty-state'>No transactions found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </main>
</body>
</html>
