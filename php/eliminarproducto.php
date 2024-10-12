<?php 
require_once("env.php");

if($_POST['eliminar']){
    $id = $_POST['id'];
    $sql = "DELETE FROM productos WHERE id = :id ";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    if($stmt->execute()){
        echo json_encode(array('error' => 1, 'mensaje' => 'Eliminado con exito'));
    }
    else{
        echo json_encode(array('error' => 0, 'mensaje' => 'Error al eliminar producto'));
    }

}
?>