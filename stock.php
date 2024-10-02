<?php 
require_once("php/env.php");
$sql = "SELECT p.*, m.nombre AS 'marca', d.nombre AS 'descuento' FROM productos AS p 
INNER JOIN marcas AS M ON m.id = p.id_marca
INNER JOIN descuentos AS d ON d.id = p.id_descuento";
$result = $conn->query($sql);
$productos = $result->fetchAll(PDO::FETCH_ASSOC);
?>