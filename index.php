<?php

// include 'connection.php';
// require 'connection.php';
// include_once 'connection.php';

// Llamar a la conexión una vez
require_once 'connection.php';

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
                <div style="background-color: <?= $fila['color_en'] ?>;">
                    <p> <?= $fila['usuario'] ?> </p>
                </div>

            <?php endforeach ?>
        </section>
        <section>
            <h2>Indica tus datos</h2>

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

            <!-- <h2>Modifica tus datos</h2> -->

        </section>
    </main>
</body>

</html>