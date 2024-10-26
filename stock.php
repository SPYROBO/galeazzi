<div class="container-fluid">
    <div class="row">

        <nav class="col-md-3 col-lg-2 d-md-block sidebarside">
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
        <div id="contenido_stock">
            <main class="col-md-9 ms-sm-auto col-lg-10 px-4">
                <div class="row text-center mb-4">
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
                                        <td>
                                            <center><button id="<?php echo $producto['id']; ?>" class="btn btn-danger btn-sm" onclick="eliminarProducto(<?php echo $producto['id']; ?>)">-</button></center>
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
                        <?php if (isset($_SESSION['reponerstock_msj'])) {
                            $error = $_SESSION['reponerstock_msj'];
                            echo '<div id="alert-message" class="alert alert-danger" role="alert">' . $error . '</div>';
                            unset($_SESSION['reponerstock_msj']);
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
                            if (isset($_SESSION['msj_proveedores'])) {
                                $error = $_SESSION['msj_proveedores'];
                                echo '<div id="alert-message" class="alert alert-danger" role="alert">' . $error . '</div>';
                            }
                            unset($_SESSION['msj_proveedores']);
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
                                    <input type="text" class="form-control" placeholder="Ciudad" name="ciudad" required>
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" placeholder="Email" name="email" required>
                                </div>
                                <button type="submit" class="btn btn-primary w-100">Agregar Proveedor</button>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="info_proveedores" class="d-none">
    <main class="col-md-9 ms-sm-auto col-lg-10 px-4">
        <table class="tabla-proveedores">
            <thead>
                <tr>
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
            <tbody>
            <?php foreach ($proveedores as $proveedor) { ?>
                <tr>
                <td>
                <center><button id="<?php echo $proveedor['id']; ?>" class="btn btn-danger btn-sm" onclick="eliminarProveedor(<?php echo $proveedor['id']; ?>, <?php echo $proveedor['id_prod']; ?> )">-</button></center>
                </td>
                <td><?php echo $proveedor['nombre']; ?></td>
                <td><?php echo $proveedor['direccion']; ?></td>
                <td><?php echo $proveedor['telefono']; ?></td>
                <td><?php echo $proveedor['ciudad']; ?></td>
                <td><?php echo $proveedor['email']; ?></td>
                <td><?php echo $proveedor['produc_nom']; ?></td>
                <td><?php echo $proveedor['marca']; ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </main>
</div>

        <div id="stock_bajo" class="d-none"> hola2</div>
        <div id="reponer_stock" class="d-none"> hola3</div>
    </div>
</div>