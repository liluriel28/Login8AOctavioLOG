<?php
if (isset($_POST["submit"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
    include('../model/connection.php');
    $nameUser = trim($_REQUEST['usuario']);
    $emailUser = trim($_REQUEST['correo']);
    $passwordUser = trim($_REQUEST['contrasena']);
    /**
     * password_hash es una función de PHP que se utiliza para cifrar contraseñas 
     * de manera segura antes de almacenarlas en una base de datos.
     */
    $PasswordHash = password_hash($passwordUser, PASSWORD_BCRYPT); //Incriptando clave,
    //crea un nuevo hash de contraseña usando un algoritmo de hash fuerte de único sentido.

    $sql = "INSERT INTO usuarios (`id`, `usuario`, `correo`, `contrasena`, `rol`) VALUES ('', '$nameUser', '$emailUser', '$PasswordHash', 'Administrador')";

    if ($connection->query($sql) === true) {
        header("Location: ../login.php");
    } else {
        echo "Error al agregar al usuario: " . $connection->error;
    }
}
?>