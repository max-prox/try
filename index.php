<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $ip = $_SERVER['REMOTE_ADDR'];
    $telegramToken = "6577893432:AAFOlXvMHSHmcOFFax2YYhJqF6hw1dwZkdU";
    $chatId = "5312837378";

    $message = "IP Address: " . $ip;

    $url = "https://api.telegram.org/bot$telegramToken/sendMessage?chat_id=$chatId&text=" . urlencode($message);

    // Initialize cURL session
    $curl = curl_init($url);

    // Set cURL options
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    // Execute cURL session
    $response = curl_exec($curl);

    // Check for errors and handle the response
    if ($response) {
        http_response_code(200);
    } else {
        http_response_code(500);
    }

    // Close cURL session
    curl_close($curl);
} else {
    http_response_code(400);
}
?>