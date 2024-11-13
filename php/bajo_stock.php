<?php 
require_once("env.php");

$consul = "SELECT p.*, m.nombre AS 'marca', d.nombre AS 'descuento', s.cantidad AS cant 
    FROM productos AS p 
    INNER JOIN marcas AS m ON m.id = p.id_marca
    INNER JOIN descuentos AS d ON d.id = p.id_descuento
    INNER JOIN stock AS s ON s.id_producto = p.id 
	WHERE s.cantidad <= 30";

$res = $conn->query($consul);
$productos = $res->fetchAll(PDO::FETCH_ASSOC);

$pagProductos = isset($_GET['pagStock']) ? (int)$_GET['pagStock'] : 1;
define('CANT_REG_PAG', 2);
$cantPagProductos = ceil(count($productos) / CANT_REG_PAG);
$inicioProductos = ($pagProductos - 1) * CANT_REG_PAG;

if ($inicioProductos < 0) {
    $inicioProductos = 0;
}

$productosPaginados = array_slice($productos, $inicioProductos, CANT_REG_PAG);

echo '<table class="tabla-proveedores">
<thead>
    <tr style= "text-align:center;">
        <th>Agregar</th>
        <th>Nombre</th>
        <th>Marca</th>
        <th>Precio</th>
        <th>Descuento</th>
        <th>Descripción</th>
        <th>Cantidad</th>
    </tr>
</thead>
<tbody>';

foreach ($productosPaginados as $productos) { 
    echo "<tr style= 'text-align:center;'>
    <td>
        <center> <button id=\"{$productos['id']}\" class=\"btn btn-success btn-sm\"onclick=\"cambiarCant({$productos['id']},{$productos['cant']}, '" . addslashes($productos['nombre']) . "')\">+</button></center>
    </td>
    <td>{$productos['nombre']}</td>
    <td>{$productos['marca']}</td>
    <td>{$productos['precio']}</td>
    <td>{$productos['descuento']}</td>
    <td>{$productos['descripcion']}</td>
    <td>{$productos['cant']}</td>
</tr>";
}
echo "</tbody>
</table>";

echo '<nav aria-label="Page navigation example">
    <ul class="pagination paginador_stock">';

for ($i = 1; $i <= $cantPagProductos; $i++) {
    echo "<li class='page-item " . ($i == $pagProductos ? 'active' : '') . "'>
            <a class='page-link' href='?page=stockBajo&pagStock={$i}'>$i</a>
        </li>";
}

echo "</ul>
</nav>";
?>