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
                            <tr>
                                <td><button class="btn btn-info btn-sm">+</button></td>
                                <td>Cocos</td>
                                <td>Ninguna</td>
                                <td>Fruta</td>
                                <td>2</td>
                                <td>$10.00</td>
                                <td>1</td>
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
            <div class="col" >
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
</body>

</html>