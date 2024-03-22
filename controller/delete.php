<?php
    include("../model/connection.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete"])) {
        $idclientes = $_POST["delete"];
        // Ejecutar la consulta DELETE en la base de datos
        $sqlDelete = "DELETE FROM clientes WHERE id = '$idclientes'";
        if ($connection->query($sqlDelete) === true) {
            header("Location: ../index.php");
        } else {
            echo "Error al eliminar al usuario: " . $connection->error;
        }
    }
?>