<?php 
require_once("env.php");

$consul = "SELECT ip.*, pr.nombre AS produc_nom, pr.id AS id_prod, m.nombre AS marca FROM info_proveedores AS ip 
INNER JOIN proveedores AS p ON ip.id = p.id_proveedor
INNER JOIN productos AS pr ON pr.id = p.id_producto
INNER JOIN marcas AS m ON pr.id_marca = m.id";

$res = $conn->query($consul);
$proveedores = $res->fetchAll(PDO::FETCH_ASSOC);

$pagProveedores = isset($_GET['pagProveedores']) ? (int)$_GET['pagProveedores'] : 1;
define('CANT_REG_PAG', 10);
$cantPagProveedores = ceil(count($proveedores) / CANT_REG_PAG);
$inicioProveedores = ($pagProveedores - 1) * CANT_REG_PAG;

if ($inicioProveedores < 0) {
    $inicioProveedores = 0;
}

$proveedoresPaginados = array_slice($proveedores, $inicioProveedores, CANT_REG_PAG);

echo '<table class="tabla-proveedores">
<thead>
    <tr style= "text-align:center;">
        <th>Eliminar</th>
        <th>Nombre</th>
        <th>Dirección</th>
        <th>Teléfono</th>
        <th>Ciudad</th>
        <th>Email</th>
        <th>Productos</th>
        <th>Marcas</th>
    </tr>
</thead>
<tbody>';

foreach ($proveedoresPaginados as $proveedor) { 
    echo "<tr style= 'text-align:center;'>
        <td>
            <center><button id='{$proveedor['id']}' class='btn btn-danger btn-sm' onclick='eliminarProveedor({$proveedor['id']}, {$proveedor['id_prod']})'>-</button></center>
        </td>
        <td>{$proveedor['nombre']}</td>
        <td>{$proveedor['direccion']}</td>
        <td>{$proveedor['telefono']}</td>
        <td>{$proveedor['ciudad']}</td>
        <td>{$proveedor['email']}</td>
        <td>{$proveedor['produc_nom']}</td>
        <td>{$proveedor['marca']}</td>
    </tr>";
}

echo "</tbody>
</table>";

echo '<nav aria-label="Page navigation example">
    <ul class="pagination paginador_stock">';

for ($i = 1; $i <= $cantPagProveedores; $i++) {
    echo "<li class='page-item " . ($i == $pagProveedores ? 'active' : '') . "'>
            <a class='page-link' href='?page=gestionarProveedores&pagProveedores={$i}'>$i</a>
        </li>";
}

echo "</ul>
</nav>";
?>
