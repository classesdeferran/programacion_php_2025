<?php

// Llamar a la conexión una vez
require_once 'connection.php';

// 1. Definir la sentencia preparada
$update = "update FROM colores WHERE id_color = ?;";
// 2. Preparación
$update_pre = $conn->prepare($update);
// 3. Ejecución
$update_pre->execute([$_GET['id']]);

$update_pre = null;
$conn = null;

// Volver a casa -> index.php
header('location: index.php');

