<?php 
require_once("env.php");


$Busqueda = isset($_GET['busqueda']) ? $_GET['busqueda'] : '';
$terminoBusqueda = isset($_GET['busqueda']) ? $_GET['busqueda'] : '';

if ($terminoBusqueda != '')
{
    $sql = "SELECT p.*, m.nombre AS 'marca', d.nombre AS 'descuento', s.cantidad AS cant 
    FROM productos AS p 
    INNER JOIN marcas AS m ON m.id = p.id_marca
    INNER JOIN descuentos AS d ON d.id = p.id_descuento
    INNER JOIN stock AS s ON s.id_producto = p.id 
    WHERE p.nombre LIKE '%$Busqueda%' OR m.nombre LIKE '%$Busqueda%' or p.id like '%$Busqueda%'";
    

    $result = $conn->query($sql);
    $productos = $result->fetchAll(PDO::FETCH_ASSOC);
}else {
    $sql = "SELECT p.*, m.nombre AS 'marca', d.nombre AS 'descuento', s.cantidad AS cant 
        FROM productos AS p 
        INNER JOIN marcas AS m ON m.id = p.id_marca
        INNER JOIN descuentos AS d ON d.id = p.id_descuento
        INNER JOIN stock AS s ON s.id_producto = p.id ";

$result = $conn->query($sql);
$productos = $result->fetchAll(PDO::FETCH_ASSOC);
}

$pagProductos = isset($_GET['pagProductos']) ? (int)$_GET['pagProductos'] : 1;
define('CANT_REG_PAG', 2);
$cantPagProductos = ceil(count($productos) / CANT_REG_PAG);
$inicioProductos = ($pagProductos - 1) * CANT_REG_PAG;

if ($inicioProductos < 0) {
    $inicioProductos = 0;
}

$productosPaginados = array_slice($productos, $inicioProductos, CANT_REG_PAG);


require_once("funcion_stock.php");
stock($productos,$productosPaginados,$cantPagProductos,$pagProductos, $tipo_valor);
?>
