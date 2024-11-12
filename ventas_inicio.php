<div class="row">
        <!-- Contenedor principal a la derecha -->
        <!-- Formulario de ventas -->
    <div class="col-md-6">
        <form class="mb-4" id="form_ticket">
            <div class="row g-3">
                <div class="col-md-6">
                    <br>
                    <label for="dni" class="form-label">DNI</label>
                    <input type="text" class="form-control" id="dni" required>
                </div>
                <div class="col-md-6">
                    <br>
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
                        <option value="3">Efectivo</option>
                        <option value="1">Tarjeta</option>
                        <option value="2">Mercado Pago</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="cliente" class="form-label">Cliente</label>
                    <input type="text" class="form-control" id="cliente" required>
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
                    <tbody id="ticket"></tbody>
                </table>
                <div class="row justify-content-center mt-3">
                    <div class="col-4">
                        <button class="btn btn-success w-100" type="submit" onclick="compra_efectuada()">Confirmar</button>
                    </div>
                    <div class="col-4">
                        <button class="btn btn-secondary w-100" type="button" id="cancelar" onclick="compra_cancelada()">Cancelar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- Buscador -->
    <div class="col-md-6">
        <center>
            <br>
            <h5 class="text-light">Buscar Artículos</h5>
        </center>
        <div class="col">
            <div id="productos"></div>
                <div class="paginacion" id="paginacion">
                    <a href="#" class="prev">Anterior</a>
                    <a href="#" class="next">Siguiente</a>
                </div>
            </div>
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
