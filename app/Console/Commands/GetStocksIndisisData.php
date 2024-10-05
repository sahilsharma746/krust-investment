<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class GetStocksIndisisData extends Command
{
    protected $signature = 'app:get-indices-data';
    protected $description = 'Get latest indices data from FCS API';

    // Manually map symbols and images for European indices
    protected $indices_info = [
        'FTSE 100' => [
            'symbol' => '^FTSE',
            'image' => 'https://example.com/images/ftse100.png'
        ],
        'DAX' => [
            'symbol' => '^GDAXI',
            'image' => 'https://example.com/images/dax.png'
        ],
        'CAC 40' => [
            'symbol' => '^FCHI',
            'image' => 'https://example.com/images/cac40.png'
        ],
        'Euro Stoxx 50' => [
            'symbol' => '^STOXX50E',
            'image' => 'https://example.com/images/eurostoxx50.png'
        ],
        'IBEX 35' => [
            'symbol' => '^IBEX',
            'image' => 'https://example.com/images/ibex35.png'
        ],
    ];

    public function handle() {
        $api_key = 'rtF3NH0L4i1DSkKZlCmVXc';
        $api_url = "https://fcsapi.com/api-v3/stock/indices_latest?country=europe&access_key=$api_key";

        // Initialize a cURL session
        $ch = curl_init($api_url);

        // Set cURL options
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'User-Agent: Mozilla/5.0'
        ]);

        // Execute the request
        $response = curl_exec($ch);

        // Check for errors
        if ($response === FALSE) {
            Log::error('Error fetching indices data: ' . curl_error($ch));
            curl_close($ch);
            throw new \Exception('Error occurred while fetching indices data.');
        }

        // Close the cURL session
        curl_close($ch);

        // Decode the JSON response
        $indices_data = json_decode($response, true);

        // Check if data is valid
        if (is_array($indices_data) && isset($indices_data['response'])) {
            $indices_list = [];

            // Loop through the API response and extract necessary fields
            foreach ($indices_data['response'] as $index) {
                $index_name = $index['name'] ?? 'N/A';
                
                // Get symbol and image if they exist in the manual mapping
                $symbol = $this->indices_info[$index_name]['symbol'] ?? 'N/A';
                $image = $this->indices_info[$index_name]['image'] ?? 'https://example.com/default-image.png';

                $indices_list[] = [
                    'id' => $index['id'] ?? 'N/A',
                    'name' => $index_name,
                    'symbol' => $symbol,
                    'image' => $image,
                    'current_price' => $index['c'] ?? 'N/A',
                    'high' => $index['h'] ?? 'N/A',
                    'low' => $index['l'] ?? 'N/A',
                    'change' => $index['ch'] ?? 'N/A',
                    'percentage_change' => $index['cp'] ?? 'N/A',
                    'country' => $index['cty'] ?? 'N/A',
                    'last_updated' => $index['tm'] ?? 'N/A',
                ];
            }

            // Save data to a JSON file
            $json_file = public_path('indices.json');
            file_put_contents($json_file, json_encode($indices_list, JSON_PRETTY_PRINT));

            Log::info("Indices data saved to $json_file");
        } else {
            Log::warning("No valid data found in the API response.");
        }
    }
}
