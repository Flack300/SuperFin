<?php 

require("../conn/conn.php");

session_start();

$user_id = $_SESSION['user_id'];

if (!isset($_SESSION['login']) || $_SESSION['login'] != true) {
    header("location:signup/index.php");
    exit;
}

$query = "SELECT * FROM `user_tbl` WHERE user_id = '$user_id'";
$a = mysqli_query($con, $query);
$b = mysqli_num_rows($a);
$row = mysqli_fetch_assoc($a);
$em = $row['email'];
$un = $row['username'];
$ph = $row['phone'];


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);

    $updateQuery = "UPDATE `user_tbl` SET username='$username', email='$email', phone='$phone' WHERE user_id='$user_id'";
    
    if (mysqli_query($con, $updateQuery)) {
        echo "<script type='text/javascript'>
                    alert('Profile updated successfully!');
                    window.location.href = 'profile.php';
                </script>";
    } else {
        $successMessage = "Error updating profile: " . mysqli_error($con);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="styles8.css"> <!-- Ensure this path is correct -->
</head>
<body>
    <header>
        <h1>User Profile</h1>
        <nav style="margin-top:1rem;">
            <a href="../dashboard.php">Home</a>
            <a href="../wallet/wallet.php">Wallet</a>
            <a href="../e-wallet/">E-Wallet</a>
        </nav>
    </header>
    <main class="profile-container">
        <form id="profileForm" method="POST">
            <label for="username">Username</label>
            <input type="text" id="username" value="<?php echo htmlspecialchars($un); ?>" name="username" required>

            <label for="email">Email</label>
            <input type="email" id="email" value="<?php echo htmlspecialchars($em); ?>" name="email" required>

            <label for="phone">Phone Number</label>
            <input type="text" id="phone" value="<?php echo htmlspecialchars($ph); ?>" name="phone" required>

            <button type="submit">Save Changes</button>
        </form>
        <div id="successMessage"><?php echo isset($successMessage) ? $successMessage : ''; ?></div>
    </main>

    <script src="profile_script.js"></script> <!-- Ensure the script is linked correctly -->
</body>
</html>
