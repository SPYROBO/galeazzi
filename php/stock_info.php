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
define('CANT_REG_PAG', 5);
$cantPagProductos = ceil(count($productos) / CANT_REG_PAG);
$inicioProductos = ($pagProductos - 1) * CANT_REG_PAG;

if ($inicioProductos < 0) {
    $inicioProductos = 0;
}

$productosPaginados = array_slice($productos, $inicioProductos, CANT_REG_PAG);

echo "<div class='tabla-container'>
    <div class='tabla-container'>
    <h3>Buscar Productos</h3>
    <form method='GET'>
        <input type='text' name='busqueda' placeholder='ingrese producto,codigo o marca' value=''>
        <button type='submit'>Buscar</button>
    </form>
</div>
    <table class='table table-hover table-bordered'>
    <thead class='thead-dark'>
        <tr>
            <th>Eliminar</th>
            <th>Artículo</th>
            <th>Marca</th>
            <th>Descripción</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Código</th>
        </tr>
    </thead>
    <tbody>";

foreach ($productosPaginados as $producto) { 
    echo "<tr>
        <td>
            <center><button id='{$producto['id']}' class='btn btn-danger btn-sm' onclick='eliminarProducto({$producto['id']})'>-</button></center>
        </td>
        <td>{$producto['nombre']}</td>
        <td>{$producto['marca']}</td>
        <td>{$producto['descripcion']}</td>
        <td>{$producto['cant']}</td>
        <td>{$producto['precio']}</td>
        <td>{$producto['id']}</td>
    </tr>";
}

echo "</tbody>
</table>
<nav aria-label='Page navigation example'>
    <ul class='pagination'>";

for ($i = 1; $i <= $cantPagProductos; $i++) {
    echo "<li class='page-item " . ($i == $pagProductos ? 'active' : '') . "'>
            <a class='page-link' href='?pagProductos={$i}'>$i</a>
        </li>";
}

echo "</ul>
</nav>";
?>
