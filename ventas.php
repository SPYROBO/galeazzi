<?php
$page = isset($_GET['page']) ? $_GET['page'] : 'inicio';
?>
<div class="container-fluid">

    <div class="row">

        <nav class="col-md-3 col-lg-2 d-md-block sidebarside">
            <div class="position-sticky">
                <h4 class="text-light text-center mb-3">Menú de Gestión</h4>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link text-light" href="?page=inicio">
                            <i class="fas fa-users"></i> Inicio
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="?page=clientes">
                            <i class="fas fa-users"></i> Clientes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="?page=ventas">
                            <i class="fas fa-chart-line"></i> Ventas
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <div id="contenido">
            <main class="col-md-9 ms-sm-auto col-lg-10 px-4">
               <?php
                switch ($page){
                    case 'inicio':
                        require_once('../ventas_inicio.php');
                        break;

                    case 'clientes':
                        require_once('info_clientes.php');
                        break;
                    case 'ventas':
                        require_once('ventas_info.php');
                        break; 
                    default:
                        echo 'Not found 404';
                        break;
                }
               ?>
            </main>
        </div>
    </div>
</div>