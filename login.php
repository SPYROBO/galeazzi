<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registro</title>
    <link rel="stylesheet" href="css/login.css">

</head>
<div>
    <form action="php/login_info.php" method="POST">
        <div class="ini">
        <div><h1>Iniciar Sesión</h1></div>
        <?php
            if (!empty($error)) {
                echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
            }
        ?>
        <input type="number" placeholder="DNI" name="DNI" required class="dni"> 
        <input type="password" placeholder="Contraseña" name="Contra" pattern=".{7,}" title="La contraseña debe tener al menos 7 caracteres" required class="contra">
        <input type="submit" value="Iniciar Sesión" class="sesion">
        <a href="register.php"> Registrarse </a>
        </div>
    </form>
</div>
