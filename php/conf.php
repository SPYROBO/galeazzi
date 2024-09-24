<?php
// Función para conectarse a la base de datos
function getConnection() {

  // Importamos el archivo env.php
  require_once ('env.php');

  // Conectamos a la base de datos
  $conn = new mysqli("localhost", "root", "", "universal_commerce");

  // Verificamos la conexión
  if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
  }

  // Devolvemos la conexión
  return $conn;

}

// Ejemplo de uso
$conn = getConnection();

// Realizamos una consulta a la base de datos
$result = $conn->query("SELECT * FROM usuarios");

// Imprimimos los resultados de la consulta
foreach ($result as $row) {
  echo $row['nombre'] . " " . $row['apellido'] . "\n";
}