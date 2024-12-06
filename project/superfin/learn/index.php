<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learn</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav class="navbar">
        <div class="max-width">
            <?php
            require ("../conn/conn.php");
            session_start();
            if (!isset($_SESSION['login']) || $_SESSION['login'] != true) {
                echo '<div class="logo" style="margin-left: 7rem;"><a href="../index.php">SUPER<span>FIN</span></a></div>
                <ul class="menu" style="margin-right: 7rem;">
                    <li><a href="../signup/index.php" class="menu-btn">TRADE</a></li>
                    <li><a href="../signup/index.php" class="menu-btn">E-WALLET SERVICES</a></li>
                    <li><a href="../news/index.php" class="menu-btn">Crypto News</a></li>
                </ul>';
            }else{
                echo '<div class="logo" style="margin-left: 7rem;"><a href="../dashboard.php">SUPER<span>FIN</span></a></div>
                <ul class="menu" style="margin-right: 7rem;">
                    <li><a href="../trade/trade.php" class="menu-btn">TRADE</a></li>
                    <li><a href="../e-wallet/index.php" class="menu-btn">E-WALLET SERVICES</a></li>
                    <li><a href="../news/index.php" class="menu-btn">Crypto News</a></li>
                </ul>';
            }
            ?>
        </div>
    </nav>
    <div class="container">
        <h1 class="main-title" style="margin-top: 7rem; margin-left: 4rem; margin-bottom: 2rem;">Cryptocurrency Learning Modules </h1>
        <p class="intro-text">Explore the world of cryptocurrencies and enhance your knowledge with our comprehensive learning materials.</p>
        <div class="item" onclick="window.location.href='module1.html';" style="margin-right: 30rem;">
            <div class="tag1">Beginner</div>
            <div class="content">
                <h2>Understanding Cryptocurrencies</h2>
                <p>February 2022</p>
                <p>Learn the basics of cryptocurrencies, including how they work, their benefits, and the underlying blockchain technology.</p>
            </div>
            <div class="number">01</div>
        </div>

        <div class="item" onclick="window.location.href='module2.html';" style="margin-left: 40rem;">
            <div class="tag2">Intermediate</div>
            <div class="content">
                <h2>Investing in Crypto</h2>
                <p>February 2024</p>
                <p>Discover strategies for investing in cryptocurrencies, understanding market trends, and risk management.</p>
            </div>
            <div class="number">02</div>
        </div>

        <div class="item" onclick="window.location.href='module3.html';" style="margin-right: 30rem;">
            <div class="tag3">Advanced</div>
            <div class="content">
                <h2>Trading Techniques</h2>
                <p>February 2024</p>
                <p>Dive deep into various trading strategies such as day trading, swing trading, and scalping.</p>
            </div>
            <div class="number">03</div>
        </div>
        <div class="item" onclick="window.location.href='module4.html';"style="margin-left: 40rem;">
            <div class="tag4">Expert</div>
            <div class="content">
                <h2>Analysis of cryptocurrency Market</h2>
                <p>February 2024</p>
                <p>This module dives into the fundamentals analysis of cryptocurrency Market and what drives the prices.</p>
            </div>
            <div class="number">04</div>
        </div>
    </div>
<footer>
        <p>© 2024 Superfin. All rights reserved.</p>
    </footer>
<script>
        // Adding a smooth scroll effect for anchors
        const items = document.querySelectorAll('.item');
        items.forEach(item => {
            item.addEventListener('mouseover', () => {
                item.style.transform = 'scale(1.05)';
                item.style.transition = 'transform 0.2s ease';
            });
            item.addEventListener('mouseout', () => {
                item.style.transform = 'scale(1)';
            });
        });
    </script>
</body>

</html>