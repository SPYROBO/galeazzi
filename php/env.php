<?php
try {
    $dsn = "sqlsrv:Server=DESKTOP-QT2ARVV\SQLEXPRESS;Database=supermercado_cocos";
    $usuario = "";
    $contrasena = "";

    // Crear la conexión PDO
    $conn = new PDO($dsn, $usuario, $contrasena);

    // Configurar PDO para mostrar errores
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
    die();
}
?>