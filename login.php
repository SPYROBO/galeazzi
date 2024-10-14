<?php session_start(); ?>
<div>
    <form action="php/login_info.php" method="POST">
        <div>Iniciar Sesión</div>
        <?php
        if(isset($_SESSION['msj_error'])){
            $error = $_SESSION['msj_error'];
                echo '<div id="alert-message" class="alert alert-danger" role="alert">' . $error . '</div>';
            }
        unset($_SESSION['msj_error']);
        ?>
        <input type="number" placeholder="DNI" name="DNI" required> 
        <input type="password" placeholder="Contraseña" name="Contra" pattern=".{7,}" title="La contraseña debe tener al menos 7 caracteres" required>
        <input type="submit" value="Iniciar Sesión">
        <a href="register.php"> Registrarse </a>
    </form>
</div>
