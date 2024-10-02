<?php 
require_once('menu.php');
require_once('../stock.php');
 ?>

    <div class="container">
        <div class="row text-center">
            <!-- carrito -->
            <div class="col">
                <p>
                    ventas
                </p>
                <form class="row g-3">
                    <div class="col-md-6">
                        <label for="validationDefault01" class="form-label">DNI</label>
                        <input type="text" class="form-control" id="validationDefault01" value="" required>
                    </div>
                    <div class="col-md-6">
                        <label for="validationDefault04" class="form-label">Comprobante</label>
                        <select class="form-select" id="validationDefault04" required>
                            <option id="option_si" value="si">si</option>
                            <option id="option_no" value="no">no</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="validationDefault04" class="form-label">Tipo de pago</label>
                        <select class="form-select" id="validationDefault04" required>
                            <option selected value="">Efectivo</option>
                            <option selected value="">Tarjeta</option>
                            <option selected value="">Mercado Pago</option>
                            <div class="col-md-6">
                                <label for="validationDefault01" class="form-label">Cliente</label>
                            </div>
                        </select>
                    </div>
                    <table class="table table-secondary table-bordered">
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
                                <td><button class="btn btn-info btn-sm">X</button></td>
                                <td>Cocos</td>
                                <td>2</td>
                                <td>$10.00</td>
                                <td>$1.00</td>
                                <td>$19.00</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="row justify-content-center">
                        <div class="col-4">
                            <button class="btn btn-primary" type="submit">Confirmar</button>
                        </div>
                        <div class="col-4">
                            <button class="btn btn-primary" type="submit">Cancelar</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- buscador -->
            <div class="col">
                <p>Buscar articulos</p>
                <form class="row g-3">
                    <div class="col-md-6">
                        <label for="validationDefault01" class="form-label">Buscar</label>
                        <input type="text" class="text  " id="validationDefault01" value="" required>
                    </div>
                </form>
                <br>
                <table class="table table-secondary table-bordered">
                    <thead>
                        <tr>
                            <th><label class="listar">Agregar</label></th>
                            <th><label class="listar">Nombre</label></th>
                            <th><label class="listar">Marca</label></th>
                            <th><label class="listar">Tipo</label></th>
                            <th><label class="listar">Codigo</label></th>
                            <th><label class="listar">Stock</label></th>
                            <th><label class="listar">Precio</label></th>
                        </tr>
                    </thead>
                    <!-- mostrador de info-->
                    <tbody>
                    <?php foreach( $productos as $producto){ ?>
                        <tr>
                                <td><button class="btn btn-info btn-sm">+</button></td>
                                 <td><?php echo $producto['nombre'] ?> </td>
                                 <td><?php echo $producto['marca'] ?> </td>
                                 <td><?php echo $producto['descripcion'] ?> </td>
                                 <td><?php echo $producto['id'] ?> </td>
                                 <td> nada </td>
                                 <td><?php echo $producto['precio'] ?> </td>
                                 </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <div class="row">
                <div class="card mb-2 col" style="max-width: 320px;">
                    <div class="col-md-2">
                        <img src="../imagenes/productos.png" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Productos</h5>
                            <p class="card-text"></p>

                        </div>
                    </div>
                </div>
            <div class="card mb-2 col" style="max-width: 320px;">
                <div class="col-md-2">
                    <img src="../imagenes/clientes.png" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Clientes</h5>
                        <p class="card-text"></p>

                    </div>
                </div>
            </div>
            <div class="card mb-2 col" style="max-width: 320px;">
                <div class="col-md-2">
                    <img src="../imagenes/compras.png" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Ventas</h5>
                        <p class="card-text"></p>

                    </div>
                </div>
            </div>
            <div class="card mb-2 col" style="max-width: 320px;">
                <div class="col-md-2">
                    <img src="../imagenes/ingresos.png" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Ingresos</h5>
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
