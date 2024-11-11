<?php
require_once("env.php");

switch($_POST['data']){
    case 'marcas':
        $sql = "SELECT * FROM marcas";
        $res = $conn->query($sql);
        $marcas = $res->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($marcas);
        break;
    case 'descuentos':
        $sql = "SELECT * FROM descuentos";
        $res = $conn->query($sql);
        $descuentos = $res->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($descuentos);
        break;
    case 'proveedores':
        $sql = "SELECT * FROM info_proveedores";
        $res = $conn->query($sql);
        $prov = $res->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($prov);
        break;
    case 'productos':
        $sql = "SELECT p.*, m.nombre AS 'marca', d.nombre AS 'descuento', s.cantidad AS cant 
        FROM productos AS p 
        INNER JOIN marcas AS m ON m.id = p.id_marca
        INNER JOIN descuentos AS d ON d.id = p.id_descuento
        INNER JOIN stock AS s ON s.id_producto = p.id ";
        $result = $conn->query($sql);
        $productos = $result->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($productos);
        break;
}
