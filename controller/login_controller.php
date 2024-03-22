<?php
session_start();
require ("./vendor/autoload.php");
use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$logger = new Logger('login');
$fileHandler = new StreamHandler(__DIR__ . '/login.log', Level::Info);
$logger->pushHandler($fileHandler);

if (isset ($_POST['validar'])) {
    if (isset ($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] === "POST") {
        include_once ("../model/connection.php");

        $usuario = mysqli_escape_string($connection, $_POST["user"]);
        $password = mysqli_escape_string($connection, $_POST["password"]);

        $sql = "SELECT * FROM usuarios WHERE usuario='$usuario'";
        $result = $connection->query($sql);

        if ($result && $result->num_rows == 1) {
            $datos = $result->fetch_object();
            if (password_verify($password, $datos->contrasena)) {
                $_SESSION["id"] = $datos->id;
                $_SESSION["usuario"] = $datos->usuario;

                // Registro de inicio de sesión exitoso
                $logger->info('Inicio de sesión exitoso para el usuario: ' . $_POST['user']);

                header('location: ../index.php');
                exit();
            } else {
                // Contraseña inválida
                $_SESSION["error_message"] = 'Contraseña o Usuario inválido';
                // Registro de error en inicio de sesión
                $logger->error('Error al iniciar sesión para el usuario: ' . $_POST['user']);

                header('location: ../login.php');
                exit();
            }
        } else {
            // Usuario no encontrado en la base de datos
            $_SESSION["error_message"] = 'Contraseña o Usuario inválido' . $usuario;
            // Registro de error en inicio de sesión
            $logger->error('Error al iniciar sesión para el usuario: ' . $_POST['user']);

            header('location: ../login.php');
            exit();
        }
    } else {
        // Manejo de error si no se envió el formulario por POST
        $_SESSION["error_message"] = "Método de solicitud incorrecto";
        $logger->error('Error: Método de solicitud incorrecto al iniciar sesión');
        header("Location: ./login.php"); // Redirigir de vuelta al formulario de inicio de sesión
        exit(); // Asegurarse de que el script se detenga después de la redirección
    }
}
?>