<?php
$token ="8758552882:AAF5I3hLztmAOkik281YKj-IQGoFxBSCSOU";
$input = file_get_contents("php://input");
$update = json_decode($input, true);

$chat_id = $update["message"]["chat"]["id"];
$text=strtolower($update["message"]["text"]);

$respuesta="No entiendo";

switch($text) {
    case "/start":
        $respuesta = "Hola! Soy tu bot 🤖";
        break;

    case "hola":
        $respuesta = "Hola, ¿cómo estás?";
        break;

    case "adios":
        $respuesta = "Chao 👋";
        break;

    case "menu":
        $respuesta = "Opciones:\n1. hola\n2. adios\n3. info";
        break;

    case "info":
        $respuesta = "Soy un bot creado en PHP 🚀";
        break;

    default:
        $respuesta = "No entiendo 😅 escribe 'menu'";
        break;
}

$url = "https://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=".urlencode($respuesta);

file_get_contents($url);

?>
