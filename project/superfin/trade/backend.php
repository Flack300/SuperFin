<?php
// Ensure the user has selected a crypto pair
if (isset($_GET['pair'])) {
    $pair = $_GET['pair'];

    // Binance API URL for fetching the price
    $url = "https://api.binance.com/api/v3/ticker/price?symbol=" . $pair;

    // Use cURL to fetch the data
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    // Execute cURL request
    $response = curl_exec($curl);

    // Check for cURL errors
    if ($response === false) {
        // Send JSON error response
        echo json_encode(['error' => 'Unable to fetch price']);
        exit();
    }

    // Check if the response is valid JSON
    $data = json_decode($response, true);
    if (json_last_error() !== JSON_ERROR_NONE) {
        echo json_encode(['error' => 'Invalid response from Binance']);
        exit();
    }

    // Send response back to frontend
    echo json_encode(['price' => $data['price']]);
} else {
    echo json_encode(['error' => 'No crypto pair selected']);
}
?>
