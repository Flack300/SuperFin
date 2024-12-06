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
    <title>Broadband Transaction History</title>
    <link rel="stylesheet" href="styles9.css"> <!-- Ensure this path is correct -->
</head>
<body>
    <header class="header"> <!-- Added class for styling -->
        <h1>Broadband Transaction History</h1>
        <nav style="margin-top: 1rem;">
            <a href="index.php">E-Wallet</a>
        </nav>
    </header>
    <main class="history-container"> <!-- Ensure this class is applied -->
        <table>
            <thead>
                <tr>
                    <th>Account Number</th>
                    <th>Service Provider</th>
                    <th>Bill Amount (₹)</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody id="transactionTableBody">
                <?php 
                // Fetch broadband transaction history
                $query = "SELECT * FROM broadband_payments WHERE user_id=$user_id"; // Adjust your query as needed
                $result = mysqli_query($con, $query);

                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . htmlspecialchars($row['account_number']) . "</td>
                                <td>" . htmlspecialchars($row['service_provider']) . "</td>
                                <td>₹" . htmlspecialchars($row['bill_amount']) . "</td>
                                <td>" . htmlspecialchars($row['status']) . "</td> <!-- Assuming status field is used -->
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
