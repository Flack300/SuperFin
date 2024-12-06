<?php 

require("conn/conn.php");

session_start();
error_reporting(0);
if (isset($_SESSION['login']) || $_SESSION['login'] == true) {
    header("location:dashboard.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SuperFin</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.11/typed.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
</head>

<body>
    <div class="scroll-up-btn">
        <i class="fas fa-angle-up"></i>
    </div>

    <nav class="navbar">
        <div class="max-width">
            <div class="logo"><a href="index.html">SUPER<span>FIN</span></a></div>
            <ul class="menu">
                <li><a href="./signup/index.php" class="menu-btn">TRADE</a></li>
                <li><a href="./signup/index.php" class="menu-btn">E-WALLET SERVICES</a></li>
                <li><a href="./news/index.php" class="menu-btn">CRYPTO NEWS</a></li>
                <li><a href="./learn/index.php" class="menu-btn">LEARN</a></li>
                <li><a href="#about" class="menu-btn">ABOUT US</a></li>
                <li><a href="#contact" class="menu-btn">CONTACT US</a></li>
            </ul>
            <div class="menu-btn">
            </div>
        </div>
    </nav>

    <!-- home section start -->
    <section class="home" id="home">
        <div class="max-width">
            <div class="home-content">
                <div class="text-1">HELLO, WELCOME TO SUPERFIN </div>
                <div class="text-2">"Don't be late, Investing is great."</div>
                <div class="text-3">We are here to help you with <span class="typing"></span></div>
                <a href="./signup/index.php">Join Us</a>
            </div>
        </div>
    </section>
    <!-- <h1 style="text-align:center; font-family:verdana;background-color:crimson;color:white">Market Summary</h1> -->
    <!-- TradingView Widget BEGIN -->
    <div class="tradingview-widget-container">
        <div class="tradingview-widget-container__widget"></div>
        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
            {
                "symbols": [{
                    "description": "",
                    "proName": "BINANCE:BTCUSDT"
                }, {
                    "description": "",
                    "proName": "BINANCE:ETHUSDT"
                }, {
                    "description": "",
                    "proName": "BINANCE:BNBUSDT"
                }, {
                    "description": "",
                    "proName": "BINANCE:SOLUSDT"
                }, {
                    "description": "",
                    "proName": "BINANCE:XRPUSDT"
                }, {
                    "description": "",
                    "proName": "BINANCE:DOGEUSDT"
                }, {
                    "description": "",
                    "proName": "OKX:TONUSDT"
                }, {
                    "description": "",
                    "proName": "BINANCE:ADAUSDT"
                }, {
                    "description": "",
                    "proName": "BINANCE:AVAXUSDT"
                }, {
                    "description": "",
                    "proName": "BINANCE:TRXUSDT"
                }, {
                    "description": "",
                    "proName": "BINANCE:SHIBUSDT"
                }, {
                    "description": "",
                    "proName": "BINANCE:DOTUSDT"
                }, {
                    "description": "",
                    "proName": "BINANCE:LINKUSDT"
                }, {
                    "description": "",
                    "proName": "BINANCE:BCHUSDT"
                }, {
                    "description": "",
                    "proName": "BINANCE:NEARUSDT"
                }, {
                    "description": "",
                    "proName": "BINANCE:LTCUSDT"
                }, {
                    "description": "",
                    "proName": "BINANCE:MATICUSDT"
                }],
                "showSymbolLogo": true,
                "isTransparent": false,
                "displayMode": "adaptive",
                "colorTheme": "white",
                "locale": "en"
            }
        </script>
    </div>
    <!-- TradingView Widget END -->
    <div class="widget-container">
        <div class="widget-container__widget"></div>
        <!-- TradingView Widget BEGIN -->
        <div class="tradingview-widget-container">
            <div class="tradingview-widget-container__widget"></div>
            <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-market-overview.js" async>
                {
                    "colorTheme": "white",
                    "dateRange": "12M",
                    "showChart": true,
                    "locale": "en",
                    "largeChartUrl": "",
                    "isTransparent": false,
                    "showSymbolLogo": true,
                    "showFloatingTooltip": false,
                    "width": "100%",
                    "height": "650",
                    "plotLineColorGrowing": "rgba(41, 98, 255, 1)",
                    "plotLineColorFalling": "rgba(41, 98, 255, 1)",
                    "gridLineColor": "rgba(42, 46, 57, 0)",
                    "scaleFontColor": "rgba(209, 212, 220, 1)",
                    "belowLineFillColorGrowing": "rgba(41, 98, 255, 0.12)",
                    "belowLineFillColorFalling": "rgba(41, 98, 255, 0.12)",
                    "belowLineFillColorGrowingBottom": "rgba(41, 98, 255, 0)",
                    "belowLineFillColorFallingBottom": "rgba(41, 98, 255, 0)",
                    "symbolActiveColor": "rgba(41, 98, 255, 0.12)",
                    "tabs": [{
                        "title": "CRYPTOCURRENCY",
                        "symbols": [{
                            "s": "BINANCE:BTCUSDT"
                        }, {
                            "s": "BINANCE:ETHUSDT"
                        }, {
                            "s": "COINBASE:USDTUSD"
                        }, {
                            "s": "BINANCE:BNBUSDT"
                        }, {
                            "s": "BINANCE:SOLUSDT"
                        }],
                        "originalTitle": "Indices"
                    }]
                }
            </script>
        </div>
    </div>

    <!-- services section start -->
    <section class="services" id="services">
        <div class="max-width">
            <h2 class="title">Our services</h2>
            <div class="serv-content">
                <div class="card">
                    <div class="box">
                        <i class="fas fa-angle-double-up"></i>
                        <div class="text">Crypto Trading</div>
                        <p>Join us to explore the world of crypto trading—learn about blockchain technology, key crypto assets, technical tools, trading indicators.</p>
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <i class="fas fa-wallet"></i>
                        <div class="text">E-wallet Services</div>
                        <p>We will help you to simplify your payments with seamless e-wallet services for mobile recharges, bill payments, and more.</p>
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <i class="fas fa-newspaper"></i>
                        <div class="text">Crypto News</div>
                        <p>Stay updated with the latest crypto news and trends to make informed trading decisions and stay ahead in the market.</p>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <!-- about section start -->
    <section class="about" id="about">
        <div class="max-width">
            <h2 class="title">About us</h2>
            <div class="about-content">
                <div class="column left">
                    <img src="assets/img/logo.jpeg" alt="">
                </div>
                <div class="column right">
                    <div class="text">We are here to help you,whether you are <span class="typing-2"></span></div>
                    <p>What's SuperFin? Superfin is an integrated platform that combines digital wallet services with cryptocurrency trading. It eliminates the need for multiple apps, providing users with a seamless, secure, and efficient way to manage both traditional and digital financial transactions in one place.</p>

                </div>
            </div>
        </div>
    </section>
    <!-- contact section start -->
    <section class="contact" id="contact">
        <div class="max-width">
            <h2 class="title">Contact us</h2>
            <div class="contact-content">
                <div class="column left">
                    <div class="text">Get in Touch</div>
                    <p></p>
                    <div class="icons">
                        <div class="row">
                            <i class="fas fa-user"></i>
                            <div class="info">
                                <div class="head">Name</div>
                                <div class="sub-title">SuperFin</div>
                            </div>
                        </div>
                        <div class="row">
                            <i class="fas fa-map-marker-alt"></i>
                            <div class="info">
                                <div class="head">Address</div>
                                <div class="sub-title">Vadodara,Gujarat</div>
                            </div>
                        </div>
                        <div class="row">
                            <i class="fas fa-envelope"></i>
                            <div class="info">
                                <div class="head">Email</div>
                                <div class="sub-title">superfin@gmail.com</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column right">
                    <div class="text">Message me</div>
                    <form action="contact.php" method="post">
                        <div class="fields">
                            <div class="field name">
                                <input type="text" placeholder="Name" name="name" required>
                            </div>
                            <div class="field email">
                                <input type="email" placeholder="Email" name="email" required>
                            </div>
                        </div>
                        <div class="field">
                            <input type="text" placeholder="Subject" name="subject" required>
                        </div>
                        <div class="field textarea">
                            <textarea cols="30" rows="10" placeholder="Message.." name="message" required></textarea>
                        </div>
                        <div class="button-area">
                            <button type="submit">Send message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- footer section start -->
    <footer>
        <span>Created By SuperFin <a href="#home"></a> | <span class="far fa-copyright"></span> 2024 All rights reserved.</span>
    </footer>
    <script>
        function openNav() {
            document.getElementById("mySidebar").style.width = "250px";
            document.getElementById("main").style.marginLeft = "250px";
        }

        function closeNav() {
            document.getElementById("mySidebar").style.width = "0";
            document.getElementById("main").style.marginLeft = "0";
        }
    </script>

    <script src="assets/js/script.js"></script>
</body>

</html>