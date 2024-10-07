<!-- <?php 
require_once("php/env.php");
$error = "";
$cod_emp = 0;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $dni = $_POST["DNI"];
    $contra = $_POST["Contra"];
    try{
        $sql= "SELECT dni, contrasena FROM empleados WHERE dni = $dni AND contrasena = $contra";
        $stmt = $conn->prepare($sql);
       if( $stmt->execute([ $dni, $contra1])){
         exit();
       };

    }catch (PDOException $e) {
        die("Error al iniciar sesion: " . $e->getMessage());
    }
}
$vista = 'login';
require_once('vistas/layout.php')
?> -->