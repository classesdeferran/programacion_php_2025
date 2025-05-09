<?php

// include 'connection.php';
// require 'connection.php';
// include_once 'connection.php';

// Llamar a la conexión una vez
require_once 'connection.php';

$array_fondo_claro = [
    "white",
    "yellow",
    "pink",
    "darksalmon",
    "orange"
];

// 1. Definir la sentencia (query)
$select = "SELECT * FROM colores;";
// 2. Preparación
$select_pre = $conn->prepare($select);
// 3. Ejecución
$select_pre->execute();
// 4. Obtención de los valores
$array_filas = $select_pre->fetchAll();

// foreach ($array_filas as $fila) {
//     echo "<pre>";
//     print_r ($fila);
//     echo "</pre>";
// }

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Colores</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <h1>Nuestros colores preferidos</h1>
    </header>
    <main>
        <section>
            <h2>Nuestros usuarios</h2>

            <?php foreach ($array_filas as $fila) : ?>
                <?php $color = "white";
                if (in_array($fila['color_en'], $array_fondo_claro)) {
                    $color = "black";
                }
                ?>
                <div style="background-color: <?= $fila['color_en'] ?>;color:<?= $color ?>;">
                    <p> <?= $fila['usuario'] ?> </p>
                    <span class="icons">
                        <a href="index.php?id=<?= $fila['id_color'] ?>&usuario=<?= $fila['usuario'] ?>&color=<?= $fila['color_es'] ?>">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>

                        <a href="delete.php?id=<?= $fila['id_color'] ?>">
                            <i class="fa-solid fa-trash-can"></i>
                        </a>

                    </span>
                </div>

            <?php endforeach ?>
        </section>
        <section>

            <?php if ($_GET) : ?>
                <!-- Formulario para actualizar los datos -->
                <h2>Modifica tus datos</h2>
                <form action="update.php" method="post">

                    <fieldset>
                        <div>
                            <label for="usuario">Nombre del usuario</label>
                            <input type="text" id="usuario" name="usuario" value="<?= $_GET['usuario'] ?>">
                        </div>
                        <div>
                            <label for="color">Nombre del color:</label>
                            <input type="text" id="color" name="color" value="<?= $_GET['color'] ?>">
                        </div>
                        <div>
                            <button type="submit">Enviar datos</button>
                            <a href="index.php">Cancelar</a> 
                        </div>
                    </fieldset>

                </form>

            <?php else : ?>
                <!-- Formulario para insertar los datos -->

                <h2>Pon aquí tus datos</h2>
                <form action="insert.php" method="post">

                    <fieldset>
                        <div>
                            <label for="usuario">Nombre del usuario</label>
                            <input type="text" id="usuario" name="usuario">
                        </div>
                        <div>
                            <label for="color">Nombre del color:</label>
                            <input type="text" id="color" name="color">
                        </div>
                        <div>
                            <button type="submit">Enviar datos</button>
                            <button type="reset">Limpiar formulario</button>
                        </div>
                    </fieldset>

                </form>

            <?php endif ?>



        </section>
    </main>
</body>

</html>