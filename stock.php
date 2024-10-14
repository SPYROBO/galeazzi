<div class="container">
    <div class="row text-center mb-4">
        <!-- Título -->
        <div class="col">
            <h2 class="text-light">Gestión de Stock</h2>
        </div>
    </div>

    <div class="row">
        <!-- Buscador y tabla -->
        <div class="col">
            <form class="mb-4">
                <div class="input-group">
                    <input type="text" class="form-control" id="validationDefault01" placeholder="Buscar artículo" required>
                    <button class="btn btn-primary" type="submit">Buscar</button>
                </div>
            </form>
            <table class="table table-hover table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Agregar</th>
                        <th>Eliminar</th>
                        <th>Artículo</th>
                        <th>Marca</th>
                        <th>Descripción</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Código</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($productos as $producto) { ?>
                        <tr>
                            <td><button class="btn btn-success btn-sm">+</button></td>
                            <td>
                                <button id="<?php echo $producto['id']; ?>" class="btn btn-danger btn-sm" onclick="eliminarProducto(<?php echo $producto['id']; ?>)">-</button>
                            </td>
                            <td><?php echo $producto['nombre']; ?></td>
                            <td><?php echo $producto['marca']; ?></td>
                            <td><?php echo $producto['descripcion']; ?></td>
                            <td><?php echo $producto['cant']; ?></td>
                            <td><?php echo $producto['precio']; ?></td>
                            <td><?php echo $producto['id']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <div class="col">
            <button id="addProductBtn" class="btn btn-primary" onclick="showForm('product')">Agregar Producto</button>
            <button id="addProviderBtn" class="btn btn-secondary" onclick="showForm('provider')">Agregar Proveedor</button>
            <?php if (!empty($error)) {
                echo '<div id="alert-message" class="alert alert-danger" role="alert">' . $error . '</div>';
            } ?>
            <div id="formContainer" class="mt-4">
                <form id="productForm" action="reponerstock.php" method="POST" class="stock-form">
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Nombre" name="nombre" required>
                    </div>
                    <div class="mb-3">
                        <input type="number" class="form-control" placeholder="Precio" name="precio" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Marca" name="marca" required>
                    </div>
                    <div class="mb-3">
                        <input type="number" class="form-control" placeholder="Descuento" name="descuento" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Nombre Proveedor" name="proveedor" required>
                    </div>
                    <div class="mb-3">
                        <input type="number" class="form-control" placeholder="Cantidad" name="cantidad" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Descripción" name="descripcion" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Agregar Producto</button>
                </form>
                <?php
                if (isset($_SESSION['msj_error_proveedores'])) {
                    $error = $_SESSION['msj_error_proveedores'];
                    echo '<div id="alert-message" class="alert alert-danger" role="alert">' . $error . '</div>';
                }
                unset($_SESSION['msj_error_proveedores']);
                ?>
                <form id="providerForm" action="agregarproveedor.php" method="POST" class="stock-form d-none">
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Nombre del Proveedor" name="nombre" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Teléfono" name="telefono" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Dirección" name="direccion" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Email" name="email" required>
                    </div>
                    <button type="submit" class="btn btn-secondary w-100">Agregar Proveedor</button>
                </form>
            </div>
        </div>
    </div>
</div>