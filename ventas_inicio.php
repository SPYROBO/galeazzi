<div class="row">
    <!-- Contenedor principal a la derecha -->
    <!-- Formulario de ventas -->
    <div class="col-md-6">
        <form class="mb-4" id="form_ticket">
            <div class="row g-3">
                <div class="col-md-6">
                    <br>
                    <label for="dni" class="form-label">DNI</label>
                    <input type="number" class="form-control" id="dni" required>
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
                    <select name='' class="form-select" id="tipoPago" required>
                        <option value="">Seleccione</option>
                        <option value="3">Efectivo</option>
                        <option value="1">Tarjeta</option>
                        <option value="2">Mercado Pago</option>
                    </select>
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
            <div class="pagination paginador" id="paginacion">
                <nav aria-label='Page navigation example'>
                    <ul class='pagination paginador_stock'>
                        <a href="#" class="prev">Anterior</a>
                        <a href="#" class="next">Siguiente</a>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>