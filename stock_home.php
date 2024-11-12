<div class="col-12">
    <div class="row">
        <div class="col-md-6 tabla_productos">
            <?php require_once('stock_info.php'); ?>
        </div>

        <div class="col-md-6" style="margin-top: 20px;">
            <center>
                <button id="addProductBtn" class="btn btn-primary" onclick="showForm('product')">Agregar Producto</button>
                <button id="addProviderBtn" class="btn btn-primary" onclick="showForm('provider')">Agregar Proveedor</button>
                <button id="addMarcaBtn" class="btn btn-primary" onclick="showForm('marca')">Agregar Marca</button>
                <button id="addDescBtn" class="btn btn-primary" onclick="showForm('descuento')">Agregar Descuento</button>
            </center>
            <?php
            if (isset($_SESSION['msj'])) {
                $error = $_SESSION['msj'];
                echo '<div id="alert-message" class="alert alert-danger msj_error" role="alert">' . $error . '</div>';
            }
            unset($_SESSION['msj']);
            ?>
            <div id="formContainer" class="mt-4">
                <form id="productForm" action="nuevoStock.php" method="POST" class="stock-form">
                    <div class="mb-3">
                        <br>
                        <input type="text" class="form-control" placeholder="Nombre" name="nombre" required>
                    </div>
                    <div class="mb-3">
                        <input type="number" class="form-control" placeholder="Precio" name="precio" required>
                    </div>
                    <div class="mb-3">
                        <br>
                        <label for="marcas">Selecciona una marca:</label>
                        <select name="marca" id="marca_opcion" required></select>
                    </div>
                    <div class="mb-3">
                        <label for="desc">Selecciona un descuento:</label>
                        <select name="descuento" id="desc_opcion" required></select>
                    </div>
                    <div class="mb-3">
                        <label for="prov">Selecciona un proveedor:</label>
                        <select name="proveedor" id="prov_opcion" required></select>
                    </div>
                    <div class="mb-3">
                        <br>
                        <input type="number" class="form-control" placeholder="Cantidad" name="cantidad" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Descripción" name="descripcion" required>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary w-100">Agregar Producto</button>
                </form>

                <form id="providerForm" action="agregarproveedor.php" method="POST" class="stock-form d-none">
                    <div class="mb-3">
                        <br>
                        <input type="text" class="form-control" placeholder="Nombre del Proveedor" name="nombre" required>
                    </div>
                    <div class="mb-3">
                        <br>
                        <input type="number" class="form-control" placeholder="Teléfono" name="telefono" required>
                    </div>
                    <div class="mb-3">
                        <br>
                        <input type="text" class="form-control" placeholder="Dirección" name="direccion" required>
                    </div>
                    <div class="mb-3">
                        <br>
                        <input type="text" class="form-control" placeholder="Ciudad" name="ciudad" required>
                    </div>
                    <div class="mb-3">
                        <br>
                        <input type="text" class="form-control" placeholder="Email" name="email" required>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary w-100">Agregar Proveedor</button>
                </form>
                <form id="marcaForm" action="agregarmarca.php" method="POST" class="stock-form d-none">
                    <div class="mb-3">
                        <br>
                        <input type="text" class="form-control" placeholder="Nombre de la Marca" name="nombre" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Agregar Marca</button>
                </form>
                <form id="descForm" action="agregardescuento.php" method="POST" class="stock-form d-none">
                    <div class="mb-3">
                        <br>
                        <input type="number" class="form-control" placeholder="Ingrese el Descuento" name="descuento" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Agregar Descuento</button>
                </form>
            </div>
        </div>
    </div>
</div>