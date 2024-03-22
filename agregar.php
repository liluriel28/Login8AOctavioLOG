<?php
    session_start();
    include("./model/connection.php");
    if(!isset($_SESSION["id"])) {
        header("Location: ./login.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz@6..12&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="./css/agregar.css">
</head>
<body>
    <section>
        <form method="post" action="./controller/insert.php">
            <fieldset>
                <legend>Agregar clientes</legend>
                <label for="name">Nombre</label>
                <input type="text" name="name" required>
                <label for="email">Correo</label>
                <input type="text" name="email" required>
                <label for="number">Teléfono</label>
                <input type="text" name="number" required>
                <label for="direction">Dirección</label>
                <input type="text" name="direction" required>
                <button name="insert"> Agregar</button>
            </fieldset>
        </form>
    </section>
</body>
</html>