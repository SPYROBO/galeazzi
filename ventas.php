<div class="container-fluid">
    <div class="row">
        <!-- Menú de navegación a la izquierda -->
        <div class="col-md-2">
            <nav class="d-md-block sidebarside">
                <div class="position-sticky">
                    <h4 class="text-light text-center mb-3">Menú de Gestión</h4>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link text-light" href="#gestionarProveedores" onclick="ManejarInfo('contenido')">
                                <i class="fas fa-users"></i> Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="#gestionarProveedores" onclick="ManejarInfo('prove_info')">
                                <i class="fas fa-users"></i> Información de Proveedores
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="#reportes" onclick="ManejarInfo('stock_bajo')">
                                <i class="fas fa-chart-line"></i> Productos con stock bajo
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="#ajustes" onclick="ManejarInfo('reponer_stock')">
                                <i class="fas fa-box"></i> Reponer Stock
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

        <!-- Contenedor principal a la derecha -->
        <div class="col-md-10">
            <div class="row">
                <!-- Formulario de ventas -->
                <div class="col-md-6">
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
                            <tbody id="ticket">
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
                <div class="col-md-6">
                    <center>
                        <h5 class="text-light">Buscar Artículos</h5>
                    </center>
                    <?php require_once('stock_info.php'); ?>
                </div>
            </div>

            <!-- Tarjetas de información -->
            <div class="row mt-4">
                <div class="col">
                    <div class="card mb-4" style="max-width: 150px; max-height: 160px;">
                        <div class="card-body text-center">
                            <img src="../imagenes/productos.png" style="max-width: 100px; max-height: 100px;" class="img-fluid mb-3" alt="Productos">
                            <h5 class="card-title">Productos</h5>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mb-4" style="max-width: 150px; max-height: 160px;">
                        <div class="card-body text-center">
                            <img src="../imagenes/clientes.png" style="max-width: 100px; max-height: 100px;" class="img-fluid mb-3" alt="Clientes">
                            <h5 class="card-title">Clientes</h5>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mb-4" style="max-width: 150px; max-height: 160px;">
                        <div class="card-body text-center">
                            <img src="../imagenes/compras.png" style="max-width: 100px; max-height: 100px;" class="img-fluid mb-3" alt="Ventas">
                            <h5 class="card-title">Ventas</h5>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mb-4" style="max-width: 150px; max-height: 160px;">
                        <div class="card-body text-center">
                            <img src="../imagenes/ingresos.png" style="max-width: 100px; max-height: 100px;" class="img-fluid mb-3" alt="Ingresos">
                            <h5 class="card-title">Ingresos</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
