<?php

session_start();
require_once 'connection.php';


if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    die("Método no permitido");
}

// viene de restablecer-password.php
echo $_SESSION['id_reset']." - " . $_POST['password'];

// Variables de entrada
    $idReset = $_SESSION['id_reset']; 
$hash = password_hash($_POST['password'], PASSWORD_DEFAULT);// Nueva contraseña (ya cifrada si aplica)


try {
                   // ID del registro en passreset
                   
    // Preparar y ejecutar llamada al procedimiento
    $stmt = $conn->prepare("CALL reset_pass (:id, :pass)");
    $stmt->bindParam(':id', $idReset, PDO::PARAM_INT);
    $stmt->bindParam(':pass', $hash, PDO::PARAM_STR);
    $stmt->execute();

    echo "Contraseña actualizada y solicitud de reset eliminada correctamente.";
    header('Location: index.php');
    
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}