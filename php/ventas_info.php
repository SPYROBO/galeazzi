<?php 
require_once("env.php");

$consul = "SELECT v.*, tp.nombre AS 'pago' FROM ventas AS v INNER JOIN tipo_pago AS tp ON tp.id = v.id_tipo_pago";

$res = $conn->query($consul);
$ventas = $res->fetchAll(PDO::FETCH_ASSOC);

$pagVentas = isset($_GET['pagVentas']) ? (int)$_GET['pagVentas'] : 1;
define('CANT_REG_PAG', 15);
$cantPagVentas = ceil(count($ventas) / CANT_REG_PAG);
$inicioVentas = ($pagVentas - 1) * CANT_REG_PAG;

if ($inicioVentas < 0) {
    $inicioVentas = 0;
}

$ventasPaginados = array_slice($ventas, $inicioVentas, CANT_REG_PAG);

echo '<table class="tabla-ventas">
<thead>
    <tr>
        <th>Número</th>
        <th>DNI Cliente</th>
        <th>Código de empleado</th>
        <th>Fecha de Venta</th>
        <th>Total pagado</th>
        <th>Método de Pago</th>

    </tr>
</thead>
<tbody>';

foreach ($ventasPaginados as $venta) { 
    echo "<tr>
        <td>{$venta['id']}</td>
        <td>{$venta['dni_cliente']}</td>
        <td>{$venta['id_empleado']}</td>
        <td>{$venta['fecha_venta']}</td>
        <td>$ {$venta['total']}</td>
        <td>{$venta['pago']}</td>
    </tr>";
}

echo "</tbody>
</table>";

echo '<nav aria-label="Page navigation example">
    <ul class="pagination paginador_stock">';

for ($i = 1; $i <= $cantPagVentas; $i++) {
    echo "<li class='page-item " . ($i == $pagVentas ? 'active' : '') . "'>
            <a class='page-link' href='?page=ventas&pagVentas={$i}'>$i</a>
        </li>";
}

echo "</ul>
</nav>";
?>
