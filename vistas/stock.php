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
                            <th>Artículo</th>
                            <th>Marca</th>
                            <th>Tipo</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Código</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach( $productos as $producto){ ?>
                        <tr>
                                <td><button class="btn btn-info btn-sm">+</button></td>
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
            <div class="col">
                <label for="validationDefault04" class="form-label">Provedores</label>
                <select class="form-select" id="validationDefault04" required>
                    <option selected value="">Fruta</option>
                    <option selected value="">Muebles</option>
                    <option selected value="">Coca Cola</option>
                    <div class="col-md-6">
                        <label for="validationDefault01" class="form-label">Cliente</label>
                    </div>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
        </div>
    </div>
    <br>
</div>