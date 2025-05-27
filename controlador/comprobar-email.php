<?php

require_once 'connection.php';
$token = bin2hex(random_bytes(64));

$email = $_POST['email'];

// Comprobar si existe el email
$select = "SELECT * FROM usuarios WHERE email = :email";
$prep = $conn->prepare($select);
$prep->bindParam(":email", $email, PDO::PARAM_STR);
$prep->execute();

$usuarioExistente = $prep->fetch(PDO::FETCH_ASSOC);

if (!$usuarioExistente) {
    echo "error_1";
    exit();
}

// Obtener el momento 
$caducidad = new Datetime();
$caducidad->add( new DateInterval('PT2H')); // Añadir 2 horas de vida útil
$caducidad = $caducidad->format("Y-m-d H:i:s");

$insert = "INSERT INTO passreset(id_usuario, token, caducidad) ";
$insert .= "VALUES (:id, :token, :caducidad)";

$prep = $conn->prepare($insert);
$prep->bindParam(':id', $usuarioExistente['id_usuario'], PDO::PARAM_INT);
$prep->bindParam(':token', $token, PDO::PARAM_STR);
$prep->bindParam(':caducidad', $caducidad, PDO::PARAM_STR);

$prep->execute();

$usuario = $usuarioExistente['nombre_usuario'];
$body = "<p>Apreciado/Apreciada $usuario: </p><br>";
$body .= "<p>Este es el enlace necesario para que puedas acceder al servicio</p><br>";
$body .= "<p> <a href='http://localhost:8000/restablecer-password.php?token=$token'>HAZ CLIC AQUÍ</a></p><br>";
$body .= "<p>Si no has solicitado tú el enlace no hace falta que hagas nada.</p>";


include '../email_recuperacion.php';

// header('location: ../index.php?formulario=revisar_correo');