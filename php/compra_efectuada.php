<?php 
require_once('env.php');
if(isset($_POST['ticket_completo'])){
    $ticket = $_POST['ticket_completo'];
    var_dump($ticket);
    echo $ticket;
}
?>