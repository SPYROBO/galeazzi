<?php 
require_once('env.php');
if(isset($_POST['ticket'])){
    $ticket = $_POST['ticket'];
    $sql = "INSERT INTO  ";
    $result = $conn->query($sql);
    $ventas = $result->fetchAll(PDO::FETCH_ASSOC);
    
}
?>