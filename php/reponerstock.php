<?php
require_once("env.php");

function buscar($conn, $table, $column, $value)
{

    $sql = "SELECT * FROM $table WHERE $column = :value";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':value', $value);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (empty($result)) {
        $sql = "INSERT INTO $table ($column) VALUES (:value)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':value', $value);
        $stmt->execute();

        $sql = "SELECT * FROM $table WHERE $column = :value";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':value', $value);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    return $result[0]['id'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $precio = $_POST["precio"];
    $descuento = $_POST["descuento"];
    $descripcion = $_POST["descripcion"];
    $marca = $_POST["marca"];
    $proveedor = $_POST["proveedor"];
    $cantidad = $_POST["cantidad"];
    $msj = '';
    $marcaId = buscar($conn, 'marcas', 'nombre', $marca);

    $descuentoId = buscar($conn, 'descuentos', 'nombre', $descuento);

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

            $sql = "SELECT * FROM proveedores WHERE nombre = :nombre";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':nombre', $proveedor);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (empty($result)) {
                $sql = "INSERT INTO  proveedores (nombre,id_producto) VALUES (?,?)";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$proveedor, $producId]);

                $sql = "SELECT * FROM proveedores WHERE nombre = :nombre";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':nombre', $proveedor);
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            $proveedorId = $result[0]['id'];
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

require_once('stock_direccion.php');
