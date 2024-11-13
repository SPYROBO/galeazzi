<?php 
session_start();
require_once('env.php');
if(isset($_SESSION['id_empleado'])){
if(isset($_POST['ticket'])){
    $_SESSION['dic_ticket'] = $_POST['ticket'];
    $ticket = $_POST['ticket'];
    if(count($ticket) > 1){
        $id_emp = intval($_SESSION['id_empleado']);
        $suma = 0;
        for($i = 0; $i < count($ticket)-1; $i++){
            $suma += $ticket[$i]['precio_final'];
        }
        $sql = "INSERT INTO ventas (dni_cliente, id_empleado, fecha_venta, total, id_tipo_pago) VALUES (?,?,?,?,?,?) ";
        $result = $conn->prepare($sql);
        $result -> execute([intval(end($ticket)[0]),$id_emp,date("Y-m-d"),$suma,intval(end($ticket)[1])]);
        $sql = "SELECT IDENT_CURRENT ('ventas')";
        $stmt = $conn->prepare($sql);
        $stmt -> execute();
        $id_venta = $stmt->fetchAll(PDO::FETCH_ASSOC);
        for($i = 0; $i < count($ticket)-1; $i++){
            $sql = "INSERT INTO detalle_venta (id_venta, id_producto, cant_producto) VALUES (?,?,?)";
            $result = $conn->prepare($sql);
            $result->execute([intval($id_venta[0][""]),intval($ticket[$i]["id"]),intval($ticket[$i]["cantidad"])]);
            $sql = "UPDATE stock SET cantidad = cantidad - ".intval($ticket[$i]['cantidad'])." WHERE id_producto = ".intval($ticket[$i]["id"]);
            $result = $conn->prepare($sql);
            $result->execute();
        }
    }
}
}
?>             