<?php 
require_once("env.php");
$consul = "SELECT ip.*, pr.nombre AS produc_nom, pr.id AS id_prod, m.nombre AS marca FROM info_proveedores AS ip 
INNER JOIN proveedores AS p ON ip.id = p.id_proveedor
INNER JOIN productos AS pr ON pr.id = p.id_producto
INNER JOIN marcas AS m On pr.id_marca = m.id";
$res = $conn->query($consul);
$proveedores = $res->fetchAll(PDO::FETCH_ASSOC);
?>