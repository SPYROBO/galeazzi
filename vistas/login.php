<div>
    <form action="../login.php" method="POST">
        <div>Iniciar Sesión</div>
        <?php
            if (!empty($error)) {
                echo('<div class="alert alert-danger" role="alert">' . $error . '</div>');
            }
        ?>
        <input type="number" placeholder="DNI" name="DNI" require> 
        <input type="password" placeholder="Contraseña" name="Contra" pattern=".{7,}" title="La contraseña debe tener al menos 7 caracteres" require>
        <input type="submit" value="Iniciar Sesión">
        <a href="register.php">¿No tienes cuenta? ¡Regístrate aquí!</a>
    </form>
</div>