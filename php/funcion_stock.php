<?php 
function stock($productos,$productosPaginados,$cantPagProductos,$pagProductos,$m){ 
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
            <th>$m</th>
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
    if($m == "Añadir"){
        echo "<tr>
        <td>
            <center><button id='añadir{$producto['id']}' class='btn btn-success btn-sm' onclick='crearTicket({$producto['id']},". json_encode($producto['nombre']) .", {$producto['precio']}, {$producto['descuento']}, {$producto['cant']})'>+</button></center>
        </td>
        <td>{$producto['nombre']}</td>
        <td>{$producto['marca']}</td>
        <td>{$producto['descripcion']}</td>
        <td>{$producto['cant']}</td>
        <td>{$producto['precio']}</td>
        <td>{$producto['id']}</td>
        </tr>";
    } else {
        echo "<tr>
        <td>
            <center><button id='elim{$producto['id']}' class='btn btn-danger btn-sm' onclick='eliminarProducto({$producto['id']})'>-</button></center>
        </td>
        <td>{$producto['nombre']}</td>
        <td>{$producto['marca']}</td>
        <td>{$producto['descripcion']}</td>
        <td>{$producto['cant']}</td>
        <td>{$producto['precio']}</td>
        <td>{$producto['id']}</td>
        </tr>";
    }
    
}

echo "</tbody>
</table>
<nav aria-label='Page navigation example'>
    <ul class='pagination'>";

for ($i = 1; $i <= $cantPagProductos; $i++) {
    echo "<li class='page-item " . ($i == $pagProductos ? 'active' : '') . "'>
            <a class='page-link' href='?page=home&pagProductos={$i}'>$i</a>
        </li>";
}

echo "</ul>
</nav>";
}
?>