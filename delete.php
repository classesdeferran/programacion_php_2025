<?php
session_start();
print_r($_GET);

if ($_GET ) {
    header('location: controlador/logout.php');
    exit();
}
// print_r($_POST);


// Llamar a la conexión una vez
require_once 'controlador/connection.php';

// 1. Definir la sentencia preparada
$delete = "DELETE FROM colores WHERE id_color = ?;";
// 2. Preparación
$delete_pre = $conn->prepare($delete);
// 3. Ejecución
$delete_pre->execute([$_POST['quitar']]);

$delete_pre = null;
$conn = null;

// Volver a casa -> index.php
header('location: colores.php');