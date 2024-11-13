<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="css/register.css">
</head>
<?php session_start(); ?>
<div class="container">
    <form action="php/register_info.php" method="POST" class="register">
        <h1>Registrate</h1>

        <?php
        if(isset($_SESSION['msj_error_register'])){
            $error = $_SESSION['msj_error_register'];
            echo '<div id="alert-message" class="alert alert-danger" role="alert">' . $error . '</div>';
        }
        unset($_SESSION['msj_error_register']);
        ?>

        <div class="input-group">
            <input type="text" placeholder="Nombre" name="Nombre" required>
        </div>

        <div class="input-group">
            <input type="number" placeholder="DNI" name="DNI" required>
        </div>

        <div class="input-group">
            <label for="cargo">Selecciona un cargo:</label>
            <select name="Puesto" id="emp_opcion" required>
                <option value="Repositor">Repositor</option>
                <option value="Vendedor">Vendedor</option>
            </select>
        </div>

        <div class="input-group">
            <input type="text" placeholder="Dirección" name="Direccion" required>
        </div>

        <div class="input-group">
            <input type="number" placeholder="Número de teléfono" name="Numero" required>
        </div>

        <div class="input-group">
            <input type="email" placeholder="Correo electrónico" name="Correo" required>
        </div>

        <div class="input-group">
            <input type="password" placeholder="Contraseña" name="Contra1" pattern=".{7,}" title="La contraseña debe tener al menos 7 caracteres" required>
        </div>

        <div class="input-group">
            <input type="password" placeholder="Verificar Contraseña" name="Contra2" required>
        </div>

        <div class="input-group">
            <input type="submit" value="Registrarse" class="registrarse">
        </div>

        <div class="input-group">
            <a href="login.php">Iniciar Sesión</a>
        </div>
    </form>
</div>
