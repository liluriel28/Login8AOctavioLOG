<?php
require("../model/connection.php");
require("./vendor/autoload.php");
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// Crear un logger llamado 'inserts'
$logger = new Logger('inserts');
// Agregar un manejador para guardar registros en el archivo 'inserts.log'
$fileHandler = new StreamHandler(__DIR__ . '/inserts.log', Logger::INFO);
$logger->pushHandler($fileHandler);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["insert"])) {
    $pref = "ELtriunfo";
    $id = uniqid($pref);
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $direction = $_POST['direction'];

    // Insertar datos en la base de datos
    $sql = "INSERT INTO clientes (`id`, `nombre`, `correo`, `telefono`, `direccion`) VALUES ('$id', '$name', '$email', '$number', '$direction')";
    if ($connection->query($sql) === true) {
        // Guardar los datos ingresados en el archivo de registro
        $logger->info('Datos insertados: ID=' . $id . ', Nombre=' . $name . ', Correo=' . $email . ', Teléfono=' . $number . ', Dirección=' . $direction);
        header("Location: ../index.php");
    } else {
        echo "Error al agregar al usuario: " . $connection->error;
    }
}
?>
