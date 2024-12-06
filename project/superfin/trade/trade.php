<?php 

require("../conn/conn.php");

session_start();

$user_id = $_SESSION['user_id'];

if (!isset($_SESSION['login']) || $_SESSION['login'] != true) {
    header("location:signup/index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crypto Trading</title>
    <link rel="stylesheet" href="trade.css">
</head>

<body>
    <!-- Header -->
    <header class="header" style="background-color:crimson; padding:20px 10px;">
        <a href="../dashboard.php" style="text-decoration: none; color:white;">
            <div class="header-logo" style="margin-left: 15rem;">SuperFin</div>
        </a>
        <nav class="header-nav" style="margin-right: 15rem;">
            <a href="../portfolio/index.php">Portfolio</a>
            <a href="../wallet/wallet.php">Wallet</a>
            <a href="history.php">Orders History</a>
        </nav>
    </header>

    <!-- Main Content -->
    <div class="main-container">
        <!-- Left Panel (Chart and Indicators) -->
        <div class="left-panel">
            <div class="chart">
                <h2>Chart</h2>
                <!-- Placeholder for Chart -->
                <!-- TradingView Widget BEGIN -->
                <div class="tradingview-widget-container">
                    <div class="tradingview-widget-container__widget"></div>
                    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-advanced-chart.js" async>
                        {
                            "width": "860",
                            "height": "610",
                            "symbol": "BINANCE:BTCUSDT",
                            "timezone": "Etc/UTC",
                            "theme": "dark",
                            "style": "1",
                            "locale": "en",
                            "withdateranges": true,
                            "range": "YTD",
                            "hide_side_toolbar": false,
                            "allow_symbol_change": true,
                            "watchlist": [
                                "BINANCE:BTCUSDT",
                                "BINANCE:ETHUSDT",
                                "BINANCE:BNBUSDT",
                                "BINANCE:SOLUSDT",
                                "BINANCE:XRPUSDT",
                                "BYBIT:DOGEUSDT",
                                "BINANCE:TRXUSDT",
                                "BINANCE:TONUSDT",
                                "BINANCE:ADAUSDT",
                                "BINANCE:AVAXUSDT",
                                "BINANCE:SHIBUSDT",
                                "BINANCE:LINKUSDT",
                                "BINANCE:BCHUSDT",
                                "BYBIT:DOTUSDT",
                                "BINANCE:LTCUSDT",
                                "BINANCE:NEARUSDT",
                                "BINANCE:MATICUSDT",
                                "BYBIT:KASUSDT",
                                "BINANCE:UNIUSDT",
                                "BINANCE:ICPUSDT",
                                "KUCOIN:XMRUSDT",
                                "BINANCE:PEPEUSDT",
                                "BINANCE:APTUSDT",
                                "BINANCE:FETUSDT",
                                "BINANCE:XLMUSDT",
                                "BINANCE:ETCUSDT",
                                "OKX:OKBUSDT",
                                "BINANCE:STXUSDT",
                                "BINANCE:SUIUSDT",
                                "OKX:CROUSDT",
                                "BINANCE:FILUSDT",
                                "BINANCE:TAOUSDT",
                                "BYBIT:MNTUSDT",
                                "BINANCE:RENDERUSDT",
                                "BINANCE:AAVEUSDT",
                                "BINANCE:IMXUSDT",
                                "BINANCE:HBARUSDT",
                                "BINANCE:ARBUSDT",
                                "BINANCE:VETUSDT",
                                "BINANCE:ATOMUSDT",
                                "BINANCE:OPUSDT",
                                "BINANCE:INJUSDT",
                                "BINANCE:MKRUSDT",
                                "BINANCE:WIFUSDT",
                                "BINANCE:ARUSDT",
                                "BITGET:BGBUSDT",
                                "BINANCE:RUNEUSDT",
                                "BINANCE:GRTUSDT",
                                "BINANCE:BONKUSDT",
                                "BYBIT:HNTUSDT",
                                "BINANCE:THETAUSDT",
                                "BINANCE:FLOKIUSDT",
                                "BINANCE:FTMUSDT",
                                "BINANCE:ALGOUSDT",
                                "BINANCE:JUPUSDT",
                                "KUCOIN:KCSUSDT",
                                "OKX:PYTHUSDT",
                                "BINANCE:LDOUSDT",
                                "BINANCE:JASMYUSDT",
                                "BINANCE:SEIUSDT",
                                "BINANCE:TIAUSDT",
                                "BINANCE:FLOWUSDT",
                                "OKX:BSVUSDT",
                                "BYBIT:ONDOUSDT",
                                "BINANCE:NOTUSDT",
                                "BINANCE:OMUSDT",
                                "OKX:COREUSDT",
                                "OKX:BTTUSDT",
                                "BINANCE:QNTUSDT",
                                "BINANCE:EGLDUSDT",
                                "OKX:FLRUSDT",
                                "BYBIT:BRETTUSDT",
                                "BINANCE:EOSUSDT",
                                "HTX:GTUSDT",
                                "BINANCE:AXSUSDT",
                                "BINANCE:NEOUSDT",
                                "BINANCE:STRKUSDT",
                                "BINANCE:ORDIUSDT",
                                "BINANCE:XTZUSDT",
                                "BINANCE:1000SATSUSDT",
                                "BYBIT:BEAMUSDT",
                                "BINANCE:GALAUSDT",
                                "BINANCE:XECUSDT",
                                "BINANCE:WLDUSDT",
                                "KUCOIN:AKTUSDT",
                                "BINANCE:SANDUSDT",
                                "COINEX:POPCATUSDT",
                                "BINANCE:ENSUSDT",
                                "BINANCE:DOGSUSDT",
                                "BINANCE:NEXOUSDT",
                                "BINANCE:DYDXUSDT",
                                "BINANCE:CFXUSDT"
                            ],
                            "details": true,
                            "calendar": false,
                            "show_popup_button": true,
                            "popup_width": "1000",
                            "popup_height": "650",
                            "support_host": "https://www.tradingview.com"
                        }
                    </script>
                </div>
                <!-- TradingView Widget END -->
            </div>
        </div>

        <!-- Right Panel (Dynamic Buy/Sell Box) -->
        <div class="right-panel">
            <div class="toggle-buttons">
                <button class="toggle-btn" id="buyToggle" onclick="showBuy()">Buy</button>
                <button class="toggle-btn" id="sellToggle" onclick="showSell()">Sell</button>
            </div>

            <!-- Buy Form -->
            <div id="buyForm" class="trade-form">
                <h2>Buy</h2>
                <form action="buy_order.php" method="POST">
                    <label for="cryptoPairs">Select a Crypto Pair</label>
                    <select id="cryptoPairBuy" name="order_name" style="margin-bottom: 1rem; margin-top: 1rem; background-color:#333; border-radius:.5rem; color:white; padding:10px 95px;">
                        <option value="BTCUSDT">BTC/USDT</option>
                        <option value="ETHUSDT">ETH/USDT</option>
                        <option value="BNBUSDT">BNB/USDT</option>
                        <option value="SOLUSDT">SOL/USDT</option>
                        <option value="XRPUSDT">XRP/USDT</option>
                        <option value="DOGEUSDT">DOGE/USDT</option>
                        <option value="TRXUSDT">TRX/USDT</option>
                        <option value="TONUSDT">TON/USDT</option>
                        <option value="ADAUSDT">ADA/USDT</option>
                        <option value="AVAXUSDT">AVAX/USDT</option>
                        <option value="SHIBUSDT">SHIB/USDT</option>
                        <option value="LINKUSDT">LINK/USDT</option>
                        <option value="BCHUSDT">BCH/USDT</option>
                        <option value="DOTUSDT">DOT/USDT</option>
                        <option value="LTCUSDT">LTC/USDT</option>
                        <option value="NEARUSDT">NEAR/USDT</option>
                        <option value="MATICUSDT">MATIC/USDT</option>
                        <option value="KASUSDT">KAS/USDT</option>
                        <option value="UNIUSDT">UNI/USDT</option>
                        <option value="ICPUSDT">ICP/USDT</option>
                        <option value="XMRUSDT">XMR/USDT</option>
                        <option value="PEPEUSDT">PEPE/USDT</option>
                        <option value="APTUSDT">APT/USDT</option>
                        <option value="FETUSDT">FET/USDT</option>
                        <option value="XLMUSDT">XLM/USDT</option>
                        <option value="ETCUSDT">ETC/USDT</option>
                    </select>
                    <span style="display:none;" id="livePriceBuy">Fetching...</span>
                    <label for="buyLimitPrice">Limit Price</label>
                    <input type="text" id="buyLimitPrice" name="order_price" placeholder="Enter Price" readonly>
                    <label for="buyQuantity">Quantity</label>
                    <input type="text" id="buyQuantity" name="order_quantity" placeholder="Enter Quantity">
                    <button class="place-order-btn" type="submit">Place Buy Order</button>
                </form>
            </div>

            <!-- Sell Form -->
            <div id="sellForm" class="trade-form" style="display: none;">
                <h2>Sell</h2>
                <form action="sell_order.php" method="POST">
                    <label for="cryptoPairs">Select a Crypto Pair</label>
                    <select id="cryptoPairSell" name="order_name" style="margin-bottom: 1rem; margin-top: 1rem; background-color:#333; border-radius:.5rem; color:white; padding:10px 95px;">
                        <option value="BTCUSDT">BTC/USDT</option>
                        <option value="ETHUSDT">ETH/USDT</option>
                        <option value="BNBUSDT">BNB/USDT</option>
                        <option value="SOLUSDT">SOL/USDT</option>
                        <option value="XRPUSDT">XRP/USDT</option>
                        <option value="DOGEUSDT">DOGE/USDT</option>
                        <option value="TRXUSDT">TRX/USDT</option>
                        <option value="TONUSDT">TON/USDT</option>
                        <option value="ADAUSDT">ADA/USDT</option>
                        <option value="AVAXUSDT">AVAX/USDT</option>
                        <option value="SHIBUSDT">SHIB/USDT</option>
                        <option value="LINKUSDT">LINK/USDT</option>
                        <option value="BCHUSDT">BCH/USDT</option>
                        <option value="DOTUSDT">DOT/USDT</option>
                        <option value="LTCUSDT">LTC/USDT</option>
                        <option value="NEARUSDT">NEAR/USDT</option>
                        <option value="MATICUSDT">MATIC/USDT</option>
                        <option value="KASUSDT">KAS/USDT</option>
                        <option value="UNIUSDT">UNI/USDT</option>
                        <option value="ICPUSDT">ICP/USDT</option>
                        <option value="XMRUSDT">XMR/USDT</option>
                        <option value="PEPEUSDT">PEPE/USDT</option>
                        <option value="APTUSDT">APT/USDT</option>
                        <option value="FETUSDT">FET/USDT</option>
                        <option value="XLMUSDT">XLM/USDT</option>
                        <option value="ETCUSDT">ETC/USDT</option>
                    </select>
                    <span style="display:none;" id="livePriceSell">Fetching...</span>
                    <label for="sellLimitPrice">Limit Price</label>
                    <input type="text" id="sellLimitPrice" name="order_price" placeholder="Enter Price" readonly>
                    <label for="sellQuantity">Quantity</label>
                    <input type="text" id="sellQuantity" name="order_quantity" placeholder="Enter Quantity">
                    <button class="place-order-btn" type="submit">Place Sell Order</button>
                </form>
            </div>
        </div>
    </div>

   
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            function getLivePrice() {
                // Get the selected cryptocurrency pair from both forms
                const buyPair = document.getElementById('cryptoPairBuy').value;
                const sellPair = document.getElementById('cryptoPairSell').value;

                // Fetch live price for both forms
                Promise.all([
                    fetch(`backend.php?pair=${buyPair}`),
                    fetch(`backend.php?pair=${sellPair}`)
                ])
                .then(responses => Promise.all(responses.map(response => response.json())))
                .then(data => {
                    // Update live prices in both forms
                    document.getElementById('livePriceBuy').innerText = data[0].price;
                    document.getElementById('livePriceSell').innerText = data[1].price;

                    // Set the live price as the limit price
                    document.getElementById('buyLimitPrice').value = data[0].price;
                    document.getElementById('sellLimitPrice').value = data[1].price;
                })
                .catch(error => {
                    console.error('Error fetching live prices:', error);
                });
            }

            // Fetch live price on page load for the default pairs
            getLivePrice();

            // Update live price when the selected crypto pair changes
            document.getElementById('cryptoPairBuy').addEventListener('change', getLivePrice);
            document.getElementById('cryptoPairSell').addEventListener('change', getLivePrice);
        });
    </script>
 <script src="trade.js"></script>
</body>

</html>
