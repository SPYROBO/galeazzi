<?php 
require_once("env.php");
switch($_POST['info_stock']){
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

?>
