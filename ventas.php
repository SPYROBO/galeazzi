<div class="container">
 <br>
 <br>
    <div class="row mb-4">
        <!-- Formulario de ventas -->
        <div class="col">
            <form class="mb-4">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="dni" class="form-label">DNI</label>
                        <input type="text" class="form-control" id="dni" required>
                    </div>
                    <div class="col-md-6">
                        <label for="comprobante" class="form-label">Comprobante</label>
                        <select class="form-select" id="comprobante" required>
                            <option value="si">Sí</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="tipoPago" class="form-label">Tipo de Pago</label>
                        <select class="form-select" id="tipoPago" required>
                            <option value="">Seleccione</option>
                            <option value="efectivo">Efectivo</option>
                            <option value="tarjeta">Tarjeta</option>
                            <option value="mercado_pago">Mercado Pago</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="cliente" class="form-label">Cliente</label>
                        <input type="text" class="form-control" id="cliente" required>
                    </div>
                </div>
                <table class="table table-secondary table-bordered mt-3">
                    <thead class="thead-dark">
                        <tr>
                            <th>Opción</th>
                            <th>Artículo</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Descuento</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><button class="btn btn-danger btn-sm">X</button></td>
                            <td>Cocos</td>
                            <td>2</td>
                            <td>$10.00</td>
                            <td>$1.00</td>
                            <td>$19.00</td>
                        </tr>
                    </tbody>
                </table>
                <div class="row justify-content-center mt-3">
                    <div class="col-4">
                        <button class="btn btn-success w-100" type="submit">Confirmar</button>
                    </div>
                    <div class="col-4">
                        <button class="btn btn-secondary w-100" type="button">Cancelar</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Buscador -->
        <div class="col">
            <center><h5 class="text-light">Buscar Artículos</h5></center>
            <table class="table table-secondary table-bordered mt-3">
                <thead>
                    <tr>
                        <th>Agregar</th>
                        <th>Nombre</th>
                        <th>Marca</th>
                        <th>Tipo</th>
                        <th>Código</th>
                        <th>Stock</th>
                        <th>Precio</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($productos as $producto) { ?>
                        <tr>
                            <td><button class="btn btn-info btn-sm">+</button></td>
                            <td><?php echo $producto['nombre']; ?></td>
                            <td><?php echo $producto['marca']; ?></td>
                            <td><?php echo $producto['descripcion']; ?></td>
                            <td><?php echo $producto['id']; ?></td>
                            <td><?php echo $producto['cant']; ?></td>
                            <td><?php echo $producto['precio']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <!-- Tarjetas de información -->
        <div class="col">
            <div class="card mb-4" style="max-width: 320px;">
                <div class="card-body text-center">
                    <img src="imagenes/productos.png" class="img-fluid mb-3" alt="Productos">
                    <h5 class="card-title">Productos</h5>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card mb-4" style="max-width: 320px;">
                <div class="card-body text-center">
                    <img src="imagenes/clientes.png" class="img-fluid mb-3" alt="Clientes">
                    <h5 class="card-title">Clientes</h5>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card mb-4" style="max-width: 320px;">
                <div class="card-body text-center">
                    <img src="imagenes/compras.png" class="img-fluid mb-3" alt="Ventas">
                    <h5 class="card-title">Ventas</h5>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card mb-4" style="max-width: 320px;">
                <div class="card-body text-center">
                    <img src="imagenes/ingresos.png" class="img-fluid mb-3" alt="Ingresos">
                    <h5 class="card-title">Ingresos</h5>
                </div>
            </div>
        </div>
    </div>
</div>
