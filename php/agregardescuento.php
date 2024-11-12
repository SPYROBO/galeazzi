<?php
session_start();
require_once("env.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = intval($_POST['descuento']);
    $msj = '';
    if ($nombre <= 0) {
        $msj = "El descuento debe ser mayor a 0";
    } 
    else {
        try {
            $sql = "SELECT * FROM descuentos WHERE nombre = :nombre";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':nombre', $nombre, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (empty($result)) {
                $sql = "INSERT INTO descuentos(nombre) VALUES (?)";
                $stmt = $conn->prepare($sql);
                if ($stmt->execute([$nombre])) {
                    $msj = 'El descuento se añadió con éxito.';
                } else {
                    $msj = "Error al añadir el descuento";
                }
            } else {
                $msj = 'El descuento ya existe.';
            }
        } catch (PDOException $e) {
            die("Error al insertar datos: " . $e->getMessage());
        }
    }
}
$_SESSION['msj'] = $msj;
header('Location: stock_direccion.php');
