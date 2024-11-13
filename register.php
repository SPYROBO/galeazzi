<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registro</title>
    <link rel="stylesheet" href="css/register.css">

</head>
<?php session_start(); ?>
<div>
    <form action="php/register_info.php" method="POST" class="register">
        <br>
        <div><h1> Registrate </h1></div>
        <?php
        if(isset($_SESSION['msj_error_register'])){
            $error = $_SESSION['msj_error_register'];
                echo '<div id="alert-message" class="alert alert-danger" role="alert">' . $error . '</div>';
            }
        unset($_SESSION['msj_error_register']);
        ?>
        <input type="text" placeholder="Nombre" name="Nombre" required>
        <input type="number" placeholder="DNI" name="DNI" required>
        <input type="text" placeholder="Dirección" name="Direccion" required>
        <input type="number" placeholder="Número de teléfono" name="Numero" required>
        <input type="email" placeholder="Correo electrónico" name="Correo" required>
        <input type="password" placeholder="Contraseña" name="Contra1" pattern=".{7,}" title="La contraseña debe tener al menos 7 caracteres" required>
        <input type="password" placeholder="Verificar Contraseña" name="Contra2" required>
        <label for="cargo">Selecciona un cargo:</label>
            <select name="Puesto" id="emp_opcion" required>
                <option value = "Repositor">Repositor</option>
                <option value = "Vendedor"> Vendedor</option>
            </select>
        <input type="submit" value="Registrarse" class="registrarse">
        <a href="login.php"> Iniciar Sesión </a>
    </form>
</div>
