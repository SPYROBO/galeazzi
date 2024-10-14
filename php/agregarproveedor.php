<?php 
    session_start(); 
    require_once("env.php");
    $error = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $nombre = $_POST['nombre'];                                                                         
        $tel = $_POST['telefono'];
        $dir = $_POST['direccion'];
        $msj = '';
        try{
            $sql = "INSERT INTO info_proveedores(nombre, direccion, telefono, email) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$nombre, $dir, $tel, $email]);
            $msj = 'Se añadió con éxito.';
        }
        catch (PDOException $e) {
            die("Error al insertar datos: " . $e->getMessage());
        }
    }
    $_SESSION['msj_error_proveedores'] = $error;
    header('Location: stock_direccion.php');
?>