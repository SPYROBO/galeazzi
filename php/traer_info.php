<?php
require_once("env.php");

switch($_POST['data']){
    case 'marcas':
        $sql = "SELECT * FROM marcas";
        $res = $conn->query($sql);
        $marcas = $res->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($marcas);
        break;
    case 'descuentos':
        $sql = "SELECT * FROM descuentos";
        $res = $conn->query($sql);
        $descuentos = $res->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($descuentos);
        break;
    case 'proveedores':
        $sql = "SELECT * FROM info_proveedores";
        $res = $conn->query($sql);
        $prov = $res->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($prov);
        break;
}
