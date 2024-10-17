<?php 
require_once("env.php");

if($_POST['eliminar']){
    $id = $_POST['id'];
    $sql = "DELETE FROM proveedores WHERE id_producto = :id ";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    $sql = "DELETE FROM stock WHERE id_producto = :id ";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    
    $sql = "DELETE FROM productos WHERE id = :id ";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    if($stmt->execute()){
        echo json_encode(array('error' => 1));
        exit();
    }
    else{
        echo json_encode(array('error' => 0));
    }

}
?>