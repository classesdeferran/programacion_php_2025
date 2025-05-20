<?php

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

session_start();
// Llamar a la conexión una vez
require_once 'connection.php';
$token = bin2hex(random_bytes(64));

foreach ($_POST as $clave => $valor) {
    $_POST[$clave] = trim(htmlspecialchars($valor, ENT_QUOTES, "UTF-8"));
}

/*
// Vigila si un bot intenta acceder
if ( !empty($_POST['web'])  ) {
    $_SESSION['error'] = true;
    header('location: index.php');
    exit();
}

// Par impedir el acceso directo a isert.php
if (!hash_equals($_SESSION['token'], $_POST['token'])) {
    $_SESSION['error'] = true;
    header('location: index.php');
    exit();
}
*/

$hash = password_hash($_POST['password'], PASSWORD_DEFAULT);


// 1. Definir la sentencia preparada
$insert = "INSERT INTO temporal (nombre_usuario, password_usuario, email, idioma, token_registro) VALUES (:nombre, :pass, :email, :idioma, :token);";
// 2. Preparación
$prep = $conn->prepare($insert);
// 3. Parametrizar los valores
$prep -> bindParam(':nombre', $_POST['nombre'], PDO::PARAM_STR);
$prep -> bindParam(':pass', $hash, PDO::PARAM_STR);
$prep -> bindParam(':email', $_POST['email'], PDO::PARAM_STR);
$prep -> bindParam(':idioma', $_POST['idioma'], PDO::PARAM_STR);
$prep -> bindParam(':token', $token, PDO::PARAM_STR);

// 4. Ejecución
$prep->execute();



echo "Usuario creado correctamente";
$_SESSION['id_usuario'] = $conn->lastInsertId();
echo $_SESSION['id_usuario'];
// Volver a casa -> index.php
// header('location: index.php');

$_SESSION['nombre_usuario'] = $_POST['nombre'];
$_SESSION['email'] = $_POST['email'];
$_SESSION['ruta'] = "localhost:8000/registro.php?registro=$token";
// header('location: ../email.php');

$prep = null;
$conn = null;
