<?php 
session_start();
require_once('env.php');
if(isset($_SESSION['id_empleado'])){
if(isset($_POST['ticket'])){
        $_SESSION['dic_ticket'] = $_POST['ticket'];
        $id_emp = intval($_SESSION['id_empleado']);
        $ticket = $_POST['ticket'];
        $suma = 0;
        for($i = 0; $i < count($ticket)-1; $i++){
            $suma += $ticket[$i]['precio_final'];
        }
    
        $sql = "INSERT INTO ventas (num_factura ,dni_cliente, id_empleado, fecha_venta, total, id_tipo_pago) VALUES (?,?,?,?,?,?) ";
        $result = $conn->prepare($sql);
        $result -> execute([1231,end($ticket)[0],$id_emp,date("Y-m-d"),$suma,end($ticket)[1]]);
}
}
?>             