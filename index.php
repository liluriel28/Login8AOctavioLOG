<?php
    session_start();
    include("./model/connection.php");
    if(!isset($_SESSION["id"])){
        header("location: ./login.php");
        exit();   
    }
    
?>
 
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css">
    <title>Crud</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz@6..12&display=swap" rel="stylesheet">

    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>

<body>
    <header>
        <nav>
            <ul>
                <li>Salir</li>
            </ul>
        </nav>
    </header>
    <main>
        <article>
            <a href="./controller/logout.php">Salir</a>
            <a href="./agregar.php">Agregar</a>
        </article>
        
        <?php
            $user = $_SESSION['id'];
            $sql = "SELECT * FROM usuarios WHERE id = '$user'"; 
            $result = $connection->query($sql);
            $row = $result->fetch_assoc();
            echo "<h1>Bienvendio " . $row['usuario'] . "</h1>";
        ?>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                    <th>Editar</th>
                    <th>Borrar</th>
                </tr>
            </thead>
                
            <tbody>
                <?php
                    $sql = "SELECT * FROM clientes"; 
                    $result = $connection->query($sql);
                    
                    // Verificar si hay resultados
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['nombre'] . "</td>";
                            echo "<td>" . $row['correo'] . "</td>";
                            echo "<td>" . $row['telefono'] . "</td>";
                            echo "<td>" . $row['direccion'] . "</td>";
                            echo "<form method='POST' action='./controller/delete.php'>";
                            echo "<td> <button name='edit' class='edit' value=". $row['id'] ."> <i class='bx bxs-edit-alt'></i> </button>
                            </td>";
                            echo "<td class='deletetd'> <button name='delete' class='delete' value=". $row['id'] ."> <i class='bx bxs-trash-alt'></i> </button> 
                            </td>";
                            echo "</form>";
                            echo "</tr>";                                                                           
                            
                        }
                    } else {
                        echo "<tr><td colspan='5'>No hay datos disponibles</td></tr>";
                    }
                    $connection->close();
                ?>
            </tbody>
        </table>
    </main>
</body>
</html>
