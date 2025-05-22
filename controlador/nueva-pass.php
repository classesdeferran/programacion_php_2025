<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    die("Método no permitido");
}

echo $_SESSION['id_reset']."<br>";
echo $_POST['password'];