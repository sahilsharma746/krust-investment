<?php
// Set your Alpha Vantage API key
$apiKey = 'U2GSN3PZP2Z7CF3R';

// === Forex Data (EUR/USD) ===
$forexFromCurrency = 'GBP';
$forexToCurrency = 'USD';
$forexUrl = "https://www.alphavantage.co/query?function=CURRENCY_EXCHANGE_RATE&from_currency=$forexFromCurrency&to_currency=$forexToCurrency&apikey=$apiKey";


// BTC - USD
// BTH - USD

// EUR - USD
// GBP - USD
// USD - GPY
// GOLD - USD





// === Crypto Data (BTC/USD) ===
$cryptoSymbol = 'BTC';
$marketSymbol = 'USD'; 
$cryptoUrl = "https://www.alphavantage.co/query?function=CURRENCY_EXCHANGE_RATE&from_currency=$cryptoSymbol&to_currency=$marketSymbol&apikey=$apiKey";


// === Indices Data (S&P 500) ===
$indexSymbol = 'IBM'; // Example for S&P 500
$indicesUrl = "https://www.alphavantage.co/query?function=GLOBAL_QUOTE&symbol=$indexSymbol&apikey=$apiKey";

// Function to fetch data from API
function fetchData($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);


    curl_close($ch);
    return json_decode($response, true);
}

// Fetch Forex Data
$forexData = fetchData($forexUrl);

echo '<pre>';
print_r( $forexData );
die("**");


if (isset($forexData['Realtime Currency Exchange Rate'])) {
    $forexRate = $forexData['Realtime Currency Exchange Rate']['5. Exchange Rate'];
    $forexLastRefreshed = $forexData['Realtime Currency Exchange Rate']['6. Last Refreshed'];
} else {
    $forexRate = "Error fetching data";
    $forexLastRefreshed = "-";
}

// For demo purposes, let's assume a previous rate to calculate percentage change for Forex
$previousForexRate = 1.0953;
$forexPercentageChange = (($forexRate - $previousForexRate) / $previousForexRate) * 100;
$forexPercentageChange = number_format($forexPercentageChange, 2);

// Fetch Crypto Data
$cryptoData = fetchData($cryptoUrl);
if (isset($cryptoData['Realtime Currency Exchange Rate'])) {
    $cryptoRate = $cryptoData['Realtime Currency Exchange Rate']['5. Exchange Rate'];
    $cryptoLastRefreshed = $cryptoData['Realtime Currency Exchange Rate']['6. Last Refreshed'];
} else {
    $cryptoRate = "Error fetching data";
    $cryptoLastRefreshed = "-";
}

// For demo purposes, let's assume a previous rate to calculate percentage change for Crypto
$previousCryptoRate = 45000;
$cryptoPercentageChange = (($cryptoRate - $previousCryptoRate) / $previousCryptoRate) * 100;
$cryptoPercentageChange = number_format($cryptoPercentageChange, 2);

// Fetch Indices Data
$indicesData = fetchData($indicesUrl);
if (isset($indicesData['Global Quote'])) {
    $indexPrice = $indicesData['Global Quote']['05. price'];
    $indexPreviousClose = $indicesData['Global Quote']['08. previous close'];
    $indexPercentageChange = (($indexPrice - $indexPreviousClose) / $indexPreviousClose) * 100;
    $indexPercentageChange = number_format($indexPercentageChange, 2);
} else {
    $indexPrice = "Error fetching data";
    $indexPercentageChange = "-";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forex, Crypto, and Indices Data Display</title>
    <style>
        .data-box {
            font-family: Arial, sans-serif;
            background-color: #1a1a1a;
            color: white;
            padding: 10px;
            margin: 5px;
            display: inline-block;
            border-radius: 5px;
        }
        .green {
            color: #4CAF50;
        }
        .red {
            color: #F44336;
        }
    </style>
</head>
<body>

<!-- Forex Data Display -->
<div class="data-box">
    <img src="https://flagcdn.com/us.svg" alt="USD Flag" width="20"> 
    <span><strong>EUR/USD</strong></span><br>
    <span>Exchange Rate: <?php echo $forexRate; ?></span><br>
    <span>Last Refreshed: <?php echo $forexLastRefreshed; ?></span><br>
    <span>Change: 
        <span class="<?php echo $forexPercentageChange >= 0 ? 'green' : 'red'; ?>">
            <?php echo ($forexPercentageChange >= 0 ? '▲' : '▼') . ' ' . $forexPercentageChange . '%'; ?>
        </span>
    </span>
</div>

<!-- Crypto Data Display -->
<div class="data-box">
    <img src="https://cryptologos.cc/logos/bitcoin-btc-logo.svg" alt="BTC Logo" width="20"> 
    <span><strong>BTC/USD</strong></span><br>
    <span>Exchange Rate: <?php echo $cryptoRate; ?></span><br>
    <span>Last Refreshed: <?php echo $cryptoLastRefreshed; ?></span><br>
    <span>Change: 
        <span class="<?php echo $cryptoPercentageChange >= 0 ? 'green' : 'red'; ?>">
            <?php echo ($cryptoPercentageChange >= 0 ? '▲' : '▼') . ' ' . $cryptoPercentageChange . '%'; ?>
        </span>
    </span>
</div>

<!-- Indices Data Display (S&P 500) -->
<div class="data-box">
    <img src="https://cdn-icons-png.flaticon.com/512/149/149184.png" alt="S&P 500 Logo" width="20"> 
    <span><strong>S&P 500</strong></span><br>
    <span>Price: <?php echo $indexPrice; ?></span><br>
    <span>Change: 
        <span class="<?php echo $indexPercentageChange >= 0 ? 'green' : 'red'; ?>">
            <?php echo ($indexPercentageChange >= 0 ? '▲' : '▼') . ' ' . $indexPercentageChange . '%'; ?>
        </span>
    </span>
</div>

</body>
</html>
