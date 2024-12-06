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
    <title>All Transaction Histories</title>
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

        <!-- Mobile Recharge Transaction History -->
        <section>
            <h2>Mobile Recharge History</h2>
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
                <tbody>
                    <?php 
                    $query = "SELECT * FROM `mobile_recharges` WHERE user_id=$user_id";
                    $result = mysqli_query($con, $query);

                    if ($result->num_rows > 0) {
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
        </section>

        <!-- DTH Recharge Transaction History -->
        <section>
            <h2>DTH Recharge History</h2>
            <table>
                <thead>
                    <tr>
                        <th>Subscriber ID</th>
                        <th>Operator</th>
                        <th>Amount (₹)</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $query = "SELECT * FROM `dth_recharges` WHERE user_id=$user_id";
                    $result = mysqli_query($con, $query);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>" . htmlspecialchars($row['subscriber_id']) . "</td>
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
        </section>

        <!-- Electricity Bill Payment History -->
        <section>
            <h2>Electricity Bill Payment History</h2>
            <table>
                <thead>
                    <tr>
                        <th>Consumer Number</th>
                        <th>Electricity Board</th>
                        <th>Bill Amount (₹)</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $query = "SELECT * FROM `electricity_payments` WHERE user_id=$user_id";
                    $result = mysqli_query($con, $query);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>" . htmlspecialchars($row['consumer_number']) . "</td>
                                    <td>" . htmlspecialchars($row['electricity_board']) . "</td>
                                    <td>₹" . htmlspecialchars($row['bill_amount']) . "</td>
                                    <td>" . htmlspecialchars($row['status']) . "</td>
                                    <td>" . htmlspecialchars($row['created_at']) . "</td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5' class='empty-state'>No transactions found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </section>

        <!-- Gas Cylinder Booking History -->
        <section>
            <h2>Gas Cylinder Booking History</h2>
            <table>
                <thead>
                    <tr>
                        <th>Customer ID</th>
                        <th>Gas Provider</th>
                        <th>Booking Amount (₹)</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $query = "SELECT * FROM `gas_bookings` WHERE user_id=$user_id";
                    $result = mysqli_query($con, $query);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>" . htmlspecialchars($row['customer_id']) . "</td>
                                    <td>" . htmlspecialchars($row['gas_provider']) . "</td>
                                    <td>₹" . htmlspecialchars($row['booking_amount']) . "</td>
                                    <td>" . htmlspecialchars($row['status']) . "</td>
                                    <td>" . htmlspecialchars($row['created_at']) . "</td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5' class='empty-state'>No transactions found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </section>

        <!-- Education Fees Payment History -->
        <section>
            <h2>Education Fees Payment History</h2>
            <table>
                <thead>
                    <tr>
                        <th>Student Name</th>
                        <th>Student ID</th>
                        <th>Institution</th>
                        <th>Fees Amount (₹)</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $query = "SELECT * FROM `education_fees` WHERE user_id=$user_id";
                    $result = mysqli_query($con, $query);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>" . htmlspecialchars($row['student_name']) . "</td>
                                    <td>" . htmlspecialchars($row['student_id']) . "</td>
                                    <td>" . htmlspecialchars($row['institution']) . "</td>
                                    <td>₹" . htmlspecialchars($row['fees_amount']) . "</td>
                                    <td>" . htmlspecialchars($row['status']) . "</td>
                                    <td>" . htmlspecialchars($row['created_at']) . "</td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6' class='empty-state'>No transactions found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </section>

        <!-- Broadband Bill Payment History -->
        <section>
            <h2>Broadband Bill Payment History</h2>
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
                <tbody>
                    <?php 
                    $query = "SELECT * FROM broadband_payments WHERE user_id=$user_id";
                    $result = mysqli_query($con, $query);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>" . htmlspecialchars($row['account_number']) . "</td>
                                    <td>" . htmlspecialchars($row['service_provider']) . "</td>
                                    <td>₹" . htmlspecialchars($row['bill_amount']) . "</td>
                                    <td>" . htmlspecialchars($row['status']) . "</td>
                                    <td>" . htmlspecialchars($row['created_at']) . "</td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5' class='empty-state'>No transactions found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </section>

    </main>
</body>
</html>
