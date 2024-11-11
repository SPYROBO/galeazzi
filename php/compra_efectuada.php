<?php 
require_once('env.php');
if(isset($_POST['ticket'])){
    $ticket = $_POST['ticket'];
    var_dump($ticket);
}
?>