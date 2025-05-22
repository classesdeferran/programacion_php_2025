<?php
session_start();
require_once 'controlador/connection.php';

$token = $_GET['token'];

if (!$token) {
    header('location: index.php');
    $conn = null;
    exit();
}

// Comprobar si existe el email
$select = "SELECT * FROM passreset WHERE token = :token";
$prep = $conn->prepare($select);
$prep->bindParam(":token", $token, PDO::PARAM_STR);
$prep->execute();

$tokenExistente = $prep->fetch(PDO::FETCH_ASSOC);

if (!$tokenExistente) {
    header('location: index.php');
    exit();
}

$ahora = new DateTime();
$ahora = $ahora->format("Y-m-d H:i:s");
echo $ahora."<br>"; 
echo $tokenExistente['caducidad']."<br>";

if ($tokenExistente['caducidad'] < $ahora) {
    echo "El token ha caducado";
    header('location: index.php');
} else {
    echo "El token NO ha caducado";
}

$_SESSION['id_reset'] = $tokenExistente['id_usuario'];
header('location: index.php?formulario=restablecer');

