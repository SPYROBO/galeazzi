<div class="container">
    <div class="row text-center">
        <!-- carrito -->
        <div class="col">
            <p>
                Stock
            </p>
            <form class="row g-3">
                <div class="col-md-6">
                    <label for="validationDefault01" class="form-label">Buscar</label>
                    <input type="text" class="text  " id="validationDefault01" value="" required>
                </div>
            </form>
            <form class="row g-3">
                <table class="table table-secondary table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>Agregar</th>
                            <th>Eliminar</th>
                            <th>Artículo</th>
                            <th>Marca</th>
                            <th>Tipo</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Código</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($productos as $producto) { ?>
                            <tr>
                                <td><button class="btn btn-info btn-sm">+</button></td>
                                <td><button class="btn btn-info btn-sm">-</button></td>
                                <td><?php echo $producto['nombre'] ?> </td>
                                <td><?php echo $producto['marca'] ?> </td>
                                <td><?php echo $producto['descripcion'] ?> </td>
                                <td><?php echo $producto['cant'] ?> </td>
                                <td><?php echo $producto['precio'] ?> </td>
                                <td><?php echo $producto['id'] ?> </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </form>
        </div>
        <!-- Agregar producto -->
        <div class="col">
            <label for="validationDefault04" class="form-label">Reponer Stock</label>
            <?php if (!empty($msj)) {
                echo '<div class="alert alert-danger" role="alert">' . $msj . '</div>';
            } ?>
            <form action="reponerstock.php" method="POST" class="stock-form">
                <input type="text" placeholder="Nombre" name="nombre" required>
                <input type="number" placeholder="Precio" name="precio" required>
                <input type="text" placeholder="Marca" name="marca" required>
                <input type="number" placeholder="Descuento" name="descuento" required>
                <input type="text" placeholder="Nombre Proveedor" name="proveedor" required>
                <input type="number" placeholder="Cantidad" name="cantidad" required>
                <input type="text" placeholder="Descripción" name="descripcion" required>
                <input type="submit" value="Agregar" class="submit-button">
            </form>
        </div>

    </div>
    <br>
</div>