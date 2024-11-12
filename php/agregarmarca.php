<?php 
    session_start(); 
    require_once("env.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST['nombre'];
        $msj = '';
        try{
            $sql = "SELECT * FROM marcas WHERE nombre = :nombre";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if(empty($result)){
                $sql = "INSERT INTO marcas(nombre) VALUES (?)";
                $stmt = $conn->prepare($sql);
                if($stmt->execute([$nombre])){
                    $msj = 'La marca se añadió con éxito.';
                }
                else{
                    $msj = "Error al añadir marca";
                }
            }
            else{
                $msj = 'La marca ya existe.';
            }
        }
        catch (PDOException $e) {
            die("Error al insertar datos: " . $e->getMessage());
        }
    }
    $_SESSION['msj'] = $msj;
    header('Location: stock_direccion.php');