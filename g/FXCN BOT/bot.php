<?php
$content = file_get_contents("php://input");
$update = json_decode($content, true);

$chat_id = $update["message"]["chat"]["id"];
$message = $update["message"]["text"];

if($message == "/start") {
    sendMessage($chat_id, "What can this bot do and offer! Allows you to earn FXCoin by tapping on the FXCN image,complete task,invite friends and get rewarded.Welcome shareholders to your tap to earn bot CEO:Adebayo david");
}

function sendMessage($chat_id, $message) {
    $apiToken = "7369288582:AAHJgLvd8BNMea0VS7FdjzQoEhZ7vGd0mL8";
    $url = ""$apiToken/sendMessage?chat_id=$chat_id&text=".urlencode($message);
    file_get_contents($url);
}
?>
