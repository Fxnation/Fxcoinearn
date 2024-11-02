<?php

$token = '7894607733:AAFQ6wJmKsaiw3TcreOZ5C28khj-4Q2Q9do';  // Replace with your bot token
$apiURL = "https://api.telegram.org/bot$token/";

// Get the incoming update
$update = json_decode(file_get_contents('php://input'), true);
$chatId = $update['message']['chat']['id'];

// Handle commands
if (isset($update['message']['text'])) {
    $text = $update['message']['text'];

    switch ($text) {
        case '/start':
            sendMessage($chatId, "Hello! I am your wealth bot.");
            break;
        default:
            sendMessage($chatId, "I don't understand that command.");
            break;
    }
}

// Function to send messages
function sendMessage($chatId, $text) {
    global $apiURL;
    $url = $apiURL . "sendMessage?chat_id=$chatId&text=" . urlencode($text);
    file_get_contents($url);
