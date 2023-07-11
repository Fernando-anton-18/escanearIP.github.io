<?php
// Obtener los datos
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
$apellido = isset($_POST['apellido']) ? $_POST['apellido'] : '';
$mensaje = isset($_POST['mensaje']) ? $_POST['mensaje'] : '';

// Validar si los campos están llenos
if(empty($nombre) || empty($apellido) || empty($mensaje)) {
    // Redireccionar al formulario sin mostrar notificación
    ob_start();
    header("Location: index.html");
    ob_end_clean();
    exit();
}

// Sanitizar los datos del formulario
$nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
$apellido = filter_var($apellido, FILTER_SANITIZE_STRING);
$mensaje = filter_var($mensaje, FILTER_SANITIZE_STRING);

// Enviar los datos
$token = '6304803733:AAF_juIr6mTB89rZEjvV5sOXJo2DNkL9fBg';
$chatId = '1757655126';

$message = "Nombre: $nombre\nApellido: $apellido\nMensaje: $mensaje";

$url = "https://api.telegram.org/bot$token/sendMessage?chat_id=$chatId&text=" . urlencode($message);

$context = stream_context_create([
    'http' => [
        'ignore_errors' => true,
        'method' => 'POST'
    ]
]);

file_get_contents($url, $context);

// Redireccionando a google.com sin mostrar notificación
ob_start();
header("Location: https://www.google.com");
ob_end_clean();
exit();
?>
