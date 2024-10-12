<div>
    <form action="php/register_info.php" method="POST">
        <div> Registrate</div>
        <?php
            if (!empty($error)) {
                echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
            }
        ?>
        <input type="text" placeholder="Nombre" name="Nombre" required> 
        <input type="number" placeholder="DNI" name="DNI" required> 
        <input type="text" placeholder="Dirección" name="Direccion" required>
        <input type="number" placeholder="Número de teléfono" name="Numero" required> 
        <input type="email" placeholder="Correo electrónico" name="Correo" required> 
        <input type="password" placeholder="Contraseña" name="Contra1" pattern=".{7,}" title="La contraseña debe tener al menos 7 caracteres" required>
        <input type="password" placeholder="Verificar Contraseña" name="Contra2" required> 
        <input type="text" placeholder="Puesto reponedor/vendedor" name="Puesto" required> 
        <input type="submit" value="Registrarse">
        <a href="login.php"> Iniciar Sesión </a>
    </form>
</div>