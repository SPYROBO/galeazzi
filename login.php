<div>
    <form action="php/login_info.php" method="POST">
        <div>Iniciar Sesión</div>
        <?php
            if (!empty($error)) {
                echo '<div class="alert alert-danger" role="alert">' . $mensajeError . '</div>';
            }
        ?>
        <input type="number" placeholder="DNI" name="DNI" required> 
        <input type="password" placeholder="Contraseña" name="Contra1" pattern=".{7,}" title="La contraseña debe tener al menos 7 caracteres" required>
    </form>
</div>
