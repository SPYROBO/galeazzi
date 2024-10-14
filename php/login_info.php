<?php 
session_start();
require_once("env.php");
$error = "";
$cod_emp = 0;

if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $dni = $_POST["DNI"];
    $contra = $_POST["Contra"];
    try{
        $sql= "SELECT * FROM empleados WHERE dni = :dni";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':dni', $dni);
       if( $stmt->execute()){
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        var_dump($result);
        if(count($result) != 0 ){
            if($result[0]['dni'] == $dni && $result[0]['contrasena'] == $contra){
            if($result[0]['cod_emp'] == 1){
                header('Location: stock_direccion.php');
                exit();
            }
            if($result[0]['cod_emp'] == 2){
                header('Location: ventas_direccion.php');
                exit();
            }
            }
            else{
                $error = 'La contraseña es incorrecta';
            }
        }
        else{
            $error = 'El usuario no existe';
        }
       }
    }catch (PDOException $e) {
        die("Error al iniciar sesion: " . $e->getMessage());
    }
}

$_SESSION['msj_error'] = $error;
header('Location: ../login.php')
?>
