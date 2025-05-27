<?php
session_start(); // -> $_SESSION

// $token = $_SESSION['token'];
// echo strlen($token);

$num_random = random_int(0,4);
$imagenes = [
    ['src' => 'cuadrados.jpg', 'alt'=> 'cuadrados de colores'],
    ['src' => 'lapices.jpg', 'alt'=> 'lapices de colores'],
    ['src' => 'manos.webp', 'alt'=> 'manos pintadas de colores vivos'],
    ['src' => 'ondas.jpeg', 'alt'=> 'papeles de colores formando ondas'],
    ['src' => 'pinturas.jpg', 'alt'=> 'pinturas de colores']
];


// include 'connection.php';
// require 'connection.php';
// include_once 'connection.php';

// Llamar a la conexión una vez
require_once 'controlador/connection.php';

$idiomesJSON = "idiomas.json";
$file = file_get_contents($idiomesJSON);
$idiomas = json_decode($file, true);
$idioma = $_SESSION['idioma'] ?? "CAT";

?>

<!DOCTYPE html>
<html lang="<?= $idiomas[$idioma]['lang'] ?>">

<head>
<?php include_once 'modulos/meta.php';?>
    <title>Colores</title>
      
</head>

<body>
<?php include_once 'modulos/header.php';?>
    <main class="main-index">
        <section>
            <img src="img/<?= $imagenes[$num_random]['src']?>" alt="<?= $imagenes[$num_random]['alt']?>">
        </section>
        <section >
<?php
$formulario = $_GET['formulario'] ?? 'login';

switch ($formulario) {
    case "login":
        include_once 'formularios/form_login.php';
        break;
    case "crear_cuenta":
        include_once 'formularios/form_crear_usuario.php';
        break;
    case "reset":
        include_once 'formularios/form_reset_password.php';
        break;
    case "revisar_correo":
        include_once 'formularios/revisar_correo.php';
        break;   
    case "restablecer":
        include_once 'formularios/form_restablecer.php';
        break;
}

?>
           
        </section>
    </main>

    <script src="js/index.js"></script>
</body>

</html>
<?php
