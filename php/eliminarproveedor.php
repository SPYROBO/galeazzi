<?php 
require_once("env.php");

function borrar($id, $tabla, $campo, $tipo, $conn){
    if($tipo == 'prov'){
    $sql = "DELETE FROM $tabla WHERE $campo = :id ";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return true;
    }
    else{
        $sql = "DELETE FROM $tabla WHERE $campo = :id ";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute(); 
    }
}

if($_POST['eliminar']){
    $id = $_POST['idprov'];
    $id_produc = $_POST['id_produc'];
    borrar($id, 'proveedores', 'id_proveedor', 'prov', $conn);
    borrar($id_produc, 'stock', 'id_producto', 'produc', $conn);
    borrar($id_produc, 'productos', 'id', 'produc', $conn);
    if(borrar($id, 'info_proveedores', 'id', 'prov', $conn)){
        echo json_encode(array('error' => 1));
        exit();
    }
    else{
        echo json_encode(array('error' => 0));
    }
}
?>