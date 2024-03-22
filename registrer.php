<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/registrer.css">
    <title>Registrar</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz@6..12&display=swap" rel="stylesheet">
</head>
<body>
    <section>
        <div class="left">
            <form method="post" action="./controller/createuser.php">
                <fieldset>
                    <legend>Registrar nuevo usuario</legend>
                    <label for="usuario">Nombre del usuario</label>
                    <input type="text" name="usuario" required>
                    <label for="correo">Correo electrónico</label>
                    <input type="email" name="correo" pattern=".+@gmail\.com" pattern=".+@outlook\.com"  pattern=".+@hotmail\.com" title="Proporcione un correo valido" required>
                    <label for="contrasena">Contraseña</label>
                    <input type="password" name="contrasena" required>
                    <button name="submit">Enviar</button>
                </fieldset>
            </form>
        </div>
        <div class="rigth">
            <img src="./images/cubo.gif" alt="">
        </div>
    </section>

</body>
</html>