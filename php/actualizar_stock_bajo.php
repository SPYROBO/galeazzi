<?php
require_once("env.php");
try{
if ($_POST['update'] === 'valorSuma'){
    $cantidad = isset($_POST['cantidad'])? (int)$_POST['cantidad'] : 0 ;
    $id= isset($_POST['id']) ? (int)$_POST['id'] : 0;

    $sql = " UPDATE stock
        SET cantidad = :cantidad
        WHERE id_producto = :id ";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':cantidad', $cantidad, PDO::PARAM_INT);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
if($stmt->execute()){
    echo json_encode(array('error' => 1 , 'id' => $id,'cantidad' => $cantidad,));

}
else{
    echo json_encode(array('error' => 0));
}
}
} catch (PDOException $e) {
    echo json_encode(array('error' => 0, 'message' => $e->getMessage()));
}
?>