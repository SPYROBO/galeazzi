<div>
    <form action="../register.php" method="POST">
        <div> Registrate</div>
        <?php
            if (!empty($error)) {
                echo '<div class="alert alert-danger" role="alert">' . $mensajeError . '</div>';
            }
        ?>
        <input type="text" placeholder="Nombre" name="Nombre" require> 
        <input type="number" placeholder="DNI" name="DNI" require> 
        <input type="text" placeholder="Dirección" name="Direccion" require>
        <input type="number" placeholder="Número de teléfono" name="Numero" require> 
        <input type="email" placeholder="Correo electrónico" name="Correo" require> 
        <input type="password" placeholder="Contraseña" name="Contra1" pattern=".{7,}" title="La contraseña debe tener al menos 7 caracteres" require>
        <input type="password" placeholder="Verificar Contraseña" name="Contra2" require> 
        <input type="text" placeholder="Puesto reponedor/vendedor" name="Puesto" require> 
        <input type="submit" value="Registrarse">
        <a href="#"> Iniciar Sesión </a>
    </form>
</div>