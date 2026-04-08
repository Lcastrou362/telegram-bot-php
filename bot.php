<?php

$token = "8758552882:AAF5I3hLztmAOkik281YKj-IQGoFxBSCSOU";

$input = file_get_contents("php://input");
$update = json_decode($input, true);

if(!isset($update["message"])) {
    exit;
}

$chat_id = $update["message"]["chat"]["id"];
$text = strtolower(trim($update["message"]["text"]));

$respuesta = "";

switch($text) {

    case "/start":
        $respuesta = "Hola! Soy tu bot 🤖 para ayudarte a encontrar productos del supermercado.\nEscribe 'ayuda' para comenzar o 'salir' para terminar.";
        break;

    case "ayuda":
        $respuesta = "¿Qué producto buscas?\nCarne, Queso, Jamon, Leche, Yogurth, Cereal, Bebidas, Jugos, Pan, Pasteles, Tortas, Detergente, Lavaloza";
        break;

    case "carne":
    case "queso":
    case "jamon":
        $respuesta = "Pasillo 1";
        break;

    case "leche":
    case "yogurth":
    case "cereal":
        $respuesta = "Pasillo 2";
        break;

    case "bebidas":
    case "jugos":
        $respuesta = "Pasillo 3";
        break;

    case "pan":
    case "pasteles":
    case "tortas":
        $respuesta = "Pasillo 4";
        break;

    case "detergente":
    case "lavaloza":
        $respuesta = "Pasillo 5";
        break;

    case "salir":
        $respuesta = "Gracias por usar el bot 👋";
        break;

    default:
        $respuesta = "No entiendo 😅 escribe 'ayuda'";
        break;
}

file_get_contents("https://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=" . urlencode($respuesta));

?>
