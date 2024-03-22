<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="default-src 'self'; child-src 'none';">
    <link rel="stylesheet" href="./css/login.css">
    <title>Login</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz@6..12&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>


</head>

<body>
    <!-- <script>
     function encryptFormData() {
         var user = document.getElementById('user').value;
       var password = document.getElementById('password').value;

        // Clave para el cifrado AES (debería ser secreta y segura)
         var key = CryptoJS.enc.Utf8.parse('clave_secreta');

        // Vector de inicialización para el cifrado AES (debería ser aleatorio y único)
         var iv = CryptoJS.enc.Utf8.parse('vector_inicializacion');

        // Cifrado de los datos utilizando AES
         var encryptedUser = CryptoJS.AES.encrypt(user, key, { iv: iv });
         var encryptedPassword = CryptoJS.AES.encrypt(password, key, { iv: iv });

        // Actualización de los valores de los campos del formulario con los datos cifrados
         document.getElementById('user').value = encryptedUser.toString();
         document.getElementById('password').value = encryptedPassword.toString();

         return true; // Continuar con el envío del formulario
     }
    </script> -->

    <section>
        <form method="post" action="./controller/login_controller.php" onsubmit="return encryptFormData();">
            <fieldset>
                <legend>
                    <h1>Login</h1>
                </legend>
                <label for="user">Usuario:</label>
                <input type="text" name="user" id="user" placeholder="Ingrese su usuario" required>
                <i class='bx bx-user'></i>
                <label for="password">Contraseña:</label>
                <input type="password" name="password" id="password" placeholder="Ingrese su contraseña" required>
                <i class='bx bx-lock'></i>
                <button type="submit" name="validar">Iniciar sesión</button>
                <a href="./registrer.php" class="registrarse">Registrarse</a>
            </fieldset>
        </form>
    </section>

    <article class="message <?php echo isset ($_SESSION["error_message"]) ? 'has-error' : ''; ?>">
        <?php
        if (isset ($_SESSION["error_message"])) {
            echo "<p>" . "<i class='bx bx-error'></i>" . $_SESSION["error_message"] . "</p>";

            unset($_SESSION["error_message"]);
        }
        ?>
    </article>

</body>

</html>