<?php 
    session_start(); 
    require_once("env.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = strtolower($_POST['email']);
        $nombre = strtolower($_POST['nombre']);                                                                         
        $tel = $_POST['telefono'];
        $dir = $_POST['direccion'];
        $msj = '';
        try{
            $sql = "SELECT * FROM info_proveedores WHERE email = :email AND telefono = :tel";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':tel', $tel);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if(empty($result)){
                $sql = "INSERT INTO info_proveedores(nombre, direccion, telefono, email) VALUES (?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                if($stmt->execute([$nombre, $dir, $tel, $email])){
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
    $_SESSION['msj_proveedores'] = $msj;
    header('Location: stock_direccion.php');
?>