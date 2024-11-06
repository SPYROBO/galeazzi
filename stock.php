<?php
$page = isset($_GET['page']) ? $_GET['page'] : 'home';
?>
<div class="container-fluid">

    <div class="row">

        <nav class="col-md-3 col-lg-2 d-md-block sidebarside">
            <div class="position-sticky">
                <h4 class="text-light text-center mb-3">Menú de Gestión</h4>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link text-light" href="?page=home">
                            <i class="fas fa-users"></i> Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="?page=gestionarProveedores">
                            <i class="fas fa-users"></i> Información de Proveedores
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="?page=stockBajo">
                            <i class="fas fa-chart-line"></i> Productos con stock bajo
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="?page=ajustes">
                            <i class="fas fa-box"></i> Reponer Stock
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <div id="contenido">
            <main class="col-md-9 ms-sm-auto col-lg-10 px-4">
               <?php
                switch ($page){
                    case 'home':
                        require_once('../stock_home.php');
                        break;

                    case 'gestionarProveedores':
                        require_once('info_proveedores.php');
                        break;
                    case 'stockBajo':
                        require_once('bajo_stock.php');
                        break; 
                    default:
                        echo 'Not foun 404';
                        break;
                }
               ?>
            </main>
        </div>
    </div>
</div>