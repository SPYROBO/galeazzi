<?php
require_once("env.php");
$error = "";
$cod_emp = 0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = $_POST["Nombre"];
    $dni = $_POST["DNI"];
    $contra1 = $_POST["Contra1"];
    $contra2 =  $_POST["Contra2"];
    $direccion = $_POST["Direccion"];
    $correo = $_POST["Correo"];
    $numero =  $_POST["Numero"];
    $puesto =  $_POST["Puesto"];

    if (!empty($contra1) && !empty($contra2) && $contra1 != $contra2) {
        $error = "Las contraseñas no coinciden";
    } elseif ($puesto != "reponedor" && $puesto != "vendedor") {
        $error = "El puesto ingresado es incorrecto";
    } else {
        try {
            if ($puesto == 'reponedor') {
                $cod_emp = 1;
                $vista = "stock";
            } elseif ($puesto == 'vendedor') {
                $cod_emp = 2;
                $vista = "ventas";
            }

            $sql = "SELECT * FROM empleados WHERE dni = :dni AND correo = :correo";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':dni', $dni);
            $stmt->bindParam(':correo', $correo);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (empty($result)) {
                $sql = "INSERT INTO empleados (nombre, dni, contrasena, contacto, direccion, correo, cod_emp) VALUES (?, ?, ?,?,?,?,? )";
                $stmt = $conn->prepare($sql);
                if ($stmt->execute([$nombre, $dni, $contra1, $numero, $direccion, $correo, $cod_emp])) {
                    if ($cod_emp == 1) {
                        header('Location: stock_direccion.php');
                    } else {
                        header('Location: ventas_direccion.php');
                    }
                    exit();
                };
            }
            else{ $error = 'La cuenta ya existe'; }
        } catch (PDOException $e) {
            die("Error al insertar datos: " . $e->getMessage());
        }
    }
}
require_once('../register.php');
