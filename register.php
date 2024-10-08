<?php 
require_once("php/env.php");
$error = "";
$cod_emp = 0;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $nombre = $_POST["Nombre"];
    $dni = $_POST["DNI"];
    $contra1 = $_POST["Contra1"];
    $contra2 =  $_POST["Contra2"];
    $direccion = $_POST["Direccion"];
    $correo = $_POST["Correo"];
    $numero =  $_POST["Numero"];   
    $puesto =  $_POST["Puesto"];

if(!empty($contra1) && !empty($contra2) && $contra1 != $contra2){
    $error = "Las contraseñas no coinciden";
}
elseif( $puesto != "reponedor" && $puesto != "vendedor"  ){
    $error = "El puesto ingresado es incorrecto";
}
else{
    try{
        if( $puesto == 'reponedor' ){ $cod_emp = 1; $vista = "stock";}
        elseif ( $puesto == 'vendedor' ){ $cod_emp = 2; $vista = "ventas";}
        $sql= "INSERT INTO empleados (nombre, dni, contrasena, direccion, correo, cod_emp) VALUES (?,?,?,?,?,? )";
        $stmt = $conn->prepare($sql);
       if( $stmt->execute([$nombre, $dni, $contra1, $direccion, $correo , $cod_emp])){
        if( $cod_emp == 1){header('Location: stock.php');}
        else{header('Location: ventas.php');}
         exit();
       };

    }catch (PDOException $e) {
        die("Error al insertar datos: " . $e->getMessage());
    }
}
}

$vista = 'register';
require_once('vistas/layout.php')
?>