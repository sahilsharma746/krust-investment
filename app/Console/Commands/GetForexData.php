<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class GetForexData extends Command
{
    protected $signature = 'app:get-forex-data';
    protected $description = 'Get Forex data';

    public function handle() {
        $api_key = 'rtF3NH0L4i1DSkKZlCmVXc';
        $api_url = "https://fcsapi.com/api-v3/forex/latest?symbol=EUR/USD,GBP/USD,USD/JPY,AUD/USD&access_key=$api_key";

        $response = file_get_contents($api_url);

        if ($response === FALSE) {
            Log::error('Error occurred while fetching Forex data.');
            throw new \Exception('Error occurred while fetching Forex data.');
        }

        $forex_data = json_decode($response, true);

        if (isset($forex_data['response']) && !empty($forex_data['response'])) {
            $forex_list = [];

            foreach ($forex_data['response'] as $forex) {
                $symbol = $forex['s'] ?? 'N/A';
                $currencies = explode('/', $symbol);
                $base_currency = $currencies[0] ?? 'N/A';
                $quote_currency = $currencies[1] ?? 'N/A';
                $base_currency_image = $this->getFlagImageUrl($base_currency);
                $quote_currency_image = $this->getFlagImageUrl($quote_currency);

                $forex_list[] = [
                    'symbol' => $symbol,
                    'base_currency_image' => $base_currency_image,
                    'quote_currency_image' => $quote_currency_image,
                    'current_price' => $forex['c'] ?? 'N/A', // Current price
                    'percentage_change' => $forex['cp'] ?? 'N/A', // Percentage change
                    'open_price' => $forex['o'] ?? 'N/A', // Opening price
                    'high_24h' => $forex['h'] ?? 'N/A', // High price
                    'low_24h' => $forex['l'] ?? 'N/A', // Low price
                    'price_change' => $forex['ch'] ?? 'N/A', // Price change
                    'last_updated' => $forex['tm'] ?? 'N/A', // Last updated time
                ];
            }

            $json_file = public_path('forex.json');
            file_put_contents($json_file, json_encode($forex_list, JSON_PRETTY_PRINT));

            Log::info("Forex data saved to $json_file");
        } else {
            Log::warning("No data found in the API response.");
        }
    }

    public function getFlagImageUrl($currency_code) {
        $country_flags = [
            'USD' => 'https://s3-symbol-logo.tradingview.com/country/US.svg',  // United States
            'EUR' => 'https://s3-symbol-logo.tradingview.com/country/EU.svg',  // European Union
            'GBP' => 'https://s3-symbol-logo.tradingview.com/country/GB.svg',  // United Kingdom
            'JPY' => 'https://s3-symbol-logo.tradingview.com/country/JP.svg',  // Japan
            'AUD' => 'https://s3-symbol-logo.tradingview.com/country/AU.svg',  // Australia
            // Add more currency codes as needed
        ];
    
        return $country_flags[$currency_code] ?? 'https://example.com/default_image.png';  // Default image if not found
    }
    
}
