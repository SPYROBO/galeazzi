<?php
session_start();
require_once("env.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = strtolower($_POST["nombre"]);
    $precio = $_POST["precio"];
    $descuentoId = $_POST["descuento"];
    $descripcion = $_POST["descripcion"];
    $marcaId = $_POST["marca"];
    $proveedorId = $_POST["proveedor"];
    $cantidad = $_POST["cantidad"];
    $msj = '';

    $sql = "SELECT * FROM productos WHERE nombre = :nombre AND id_marca = :id_marca";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':id_marca', $marcaId);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (empty($result)) {
        $sql = "INSERT INTO productos (nombre, descripcion, id_marca, id_descuento, precio) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        if ($stmt->execute([$nombre, $descripcion, $marcaId, $descuentoId, $precio])) {
            $msj = 'Producto insertado';
            $sql = "SELECT * FROM productos WHERE nombre = :nombre AND id_marca = :id_marca";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':id_marca', $marcaId);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $producId = $result[0]['id'];

                $sql = "INSERT INTO proveedores (id_proveedor ,id_producto) VALUES (?,?)";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$proveedorId, $producId]);

                $sql = "INSERT INTO stock (id_proveedor, id_producto, cantidad) VALUES (?,?,?)";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$proveedorId, $producId, $cantidad]);
        } else {
            $msj = 'Error al insertar el producto.';
        }
    } else {
        $msj = 'El producto ya se encuentra en la Base de Datos';
    }
}
$_SESSION['reponerstock_msj'] = $msj;
header('Location: stock_direccion.php');
