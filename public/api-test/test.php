<?php
echo '<h1>All Cryptocurrencies Data</h1>';

// API Endpoint for fetching all cryptocurrencies
$url = 'https://api.coincap.io/v2/assets';
// $url = 'https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&order=market_cap_desc&per_page=100&page=1&sparkline=false';

// Make the Request
$response = file_get_contents($url);

// Decode JSON Response
$data = json_decode($response, true);

// Display the Data
echo '<pre>';
print_r($data);
echo '</pre>';




$apiKey = '246deef3c21d28532af6bcff1574ed3d';

// API Endpoint for Forex Data
$url = 'http://api.currencylayer.com/live?access_key=' . $apiKey . '&currencies=EUR,GBP,JPY&source=USD';

// Make the Request
$response = file_get_contents($url);

// Decode JSON Response
$data = json_decode($response, true);

// Display the Data
echo '<h1>Forex Data from CurrencyLayer</h1>';
echo '<pre>';
print_r($data);
echo '</pre>';



// API Key
$apiKey = '946c97e59bd798223a970024';

// API Endpoint for Forex Data
$url = 'https://v6.exchangerate-api.com/v6/' . $apiKey . '/latest/INR';
// https://v6.exchangerate-api.com/v6/946c97e59bd798223a970024/latest/USD

// Make the Request
$response = file_get_contents($url);

// Decode JSON Response
$data = json_decode($response, true);

// Display the Data
echo '<h1>INDICES</h1>';
echo '<pre>';
print_r($data);
echo '</pre>';



