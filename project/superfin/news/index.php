<!DOCTYPE html>
<html lang="en">

<!-- Basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Site Metas -->
<title>SuperFin NEWS</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">

<!-- Site Icons -->
<link rel="apple-touch-icon" href="images/apple-touch-icon.png">

<!-- Design fonts -->
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

<!-- Bootstrap core CSS -->
<link href="css/bootstrap.css" rel="stylesheet">

<!-- FontAwesome Icons core CSS -->
<link href="css/font-awesome.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="style.css" rel="stylesheet">


<!-- Responsive styles for this template -->
<link href="css/responsive.css" rel="stylesheet">

<!-- Colors for this template -->
<link href="css/colors.css" rel="stylesheet">

<!-- Version Tech CSS for this template -->
<link href="css/version/tech.css" rel="stylesheet">

<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<style>

</style>
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
                    <li><a href="../learn/index.php" class="menu-btn">LEARN</a></li>
                </ul>';
            }else{
                echo '<div class="logo" style="margin-left: 7rem;"><a href="../dashboard.php">SUPER<span>FIN</span></a></div>
                <ul class="menu" style="margin-right: 7rem;">
                    <li><a href="../trade/trade.php" class="menu-btn">TRADE</a></li>
                    <li><a href="../e-wallet/index.php" class="menu-btn">E-WALLET SERVICES</a></li>
                    <li><a href="../learn/index.php" class="menu-btn">LEARN</a></li>
                </ul>';
            }
            ?>
        </div>
    </nav>
    <div id="wrapper">
        <section class="section" style="background-image: url('https://img.freepik.com/premium-vector/global-abstract-bitcoin-crypto-currency-blockchain-technology-world-map-background_115579-1393.jpg'); background-size:1200px 800px;">
            <div class="container" style="margin-top: 5rem; margin-left: 20rem;">
                <h1 class="text-white">Cryptocurrency NEWS</h1>
                <div class="row">
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-wrapper">
                            <div class="blog-list clearfix">
                                <?php 
                                    $query = "SELECT * FROM `news_tbl`";
                                    $a = mysqli_query($con, $query);
                                    $b = mysqli_num_rows($a);
                                
                                    while ($row = mysqli_fetch_assoc($a)) {
                                        echo '<div class="blog-box row">
                                        <div class="col-md-4">
                                            <div class="post-media">
                                                <a href="https://coinmarketcap.com/headlines/news/" title="">
                                                    <img src="../assets/images/'. $row["news_img"].'" alt="" class="img-fluid">
                                                    <div class="hovereffect"></div>
                                                </a>
                                            </div>
                                            <!-- end media -->
                                        </div>
                                        <!-- end col -->
    
                                        <div class="blog-meta big-meta col-md-8">
                                            <h4><a href="https://coinmarketcap.com/headlines/news/" title="">'. $row["news_headline"].'</a></h4>
                                            <p class="short-text">'. $row["news_detail"].'</p>
                                        </div>
                                        <!-- end meta -->
                                        </div>
                                        <hr class="invis">';
                                    }
                                ?>
                                <!-- end blog-box -->
                            </div>
                            <!-- end blog-list -->
                        </div>
                        <!-- end page-wrapper -->

                        <hr class="invis">
                        <!-- end row -->
                    </div>
                    <!-- end col -->

                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </section>
        <!-- end footer -->

    </div>
    <!-- end wrapper -->

    <!-- Core JavaScript
    ================================================== -->
    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>

</body>

</html>