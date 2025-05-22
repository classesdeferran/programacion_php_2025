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



