<?php 
    session_start(); 
    require_once("env.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = strtolower($_POST['email']);
        $nombre = strtolower($_POST['nombre']);                                                                         
        $tel = intval($_POST['telefono']);
        $dir = $_POST['direccion'];
        $ciudad = $_POST['ciudad'];
        $msj = '';
        if($tel <= 0){
            $msj = "Ingrese un número de teléfono válido.";
        }
        else{
            try{
            $sql = "SELECT * FROM info_proveedores WHERE email = :email AND telefono = :tel";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':tel', $tel);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if(empty($result)){
                $sql = "INSERT INTO info_proveedores(nombre, direccion,ciudad, telefono, email) VALUES (?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                if($stmt->execute([$nombre, $dir,$ciudad ,$tel, $email])){
                    $msj = 'Se añadió con éxito.';
                }
                else{
                    $msj = "Error al añadirse";
                }
            }
            else{
                $msj = 'El proveedor ya existe.';
            }
            }
            catch (PDOException $e) {
                die("Error al insertar datos: " . $e->getMessage());
            }
        }
}
    $_SESSION['msj'] = $msj;
    header('Location: stock_direccion.php');
?>