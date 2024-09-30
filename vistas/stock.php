<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coco's Supermarket</title>

    <link rel="shortcut icon" href="amd.svg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style.css">

</head>
<nav class="navbar bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="amd.svg" alt="Coco's Supermarket" width="30" height="24">
        </a>
    </div>
</nav>

<body>
    <div class="container">
        <div class="row text-center">
            <!-- carrito -->
            <div class="col">
                <p>
                    ventas
                </p>
                <form class="row g-3">
                    <table class="table table-secondary table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>Agregar</th>
                                <th>Artículo</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th>Descuento</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><button class="btn btn-info btn-sm">+</button></td>
                                <td>Cocos</td>
                                <td>2</td>
                                <td>$10.00</td>
                                <td>$1.00</td>
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
                            <th><label class="listar">Nombre</label></th>
                            <th><label class="listar">Marca</label></th>
                            <th><label class="listar">Tipo</label></th>
                            <th><label class="listar">Codigo</label></th>
                        </tr>
                    </thead>
                    <!-- mostrador de info-->
                    <tbody>
                        <tr>
                            <td>
                                <div id="nombre" class="col mostrador">
                                    <p>arroz</p>
                                </div>
                            </td>
                            <td>
                                <div id="marca" class="col mostrador">
                                    <p>larga vida</p>
                                </div>
                            </td>
                            <td>
                                <div id="tipo" class="col mostrador">
                                    <p>largo</p>
                                </div>
                            </td>
                            <td>
                                <div id="codigo" class="col mostrador">
                                    <p>x213812938</p>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <br>
    </div>
</body>

</html>