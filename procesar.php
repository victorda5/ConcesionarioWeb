<?php

session_start();

require_once 'functions.php';
dbcon();

$conn = dbcon();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $valor = $_POST["valor"]; // Obtener el valor enviado desde JavaScript
  $wheelSize = $_POST["wheelSize"];
  $carId = $_POST["carIdSpanValue"];
    $username = $_SESSION['username'];

  // Mostrar el valor en PHP
  $conn = dbcon();

          // Construir la consulta SQL para verificar las credenciales del usuario
          $sql = "INSERT INTO `sales`(`USER_NAME`, `VEHICLE_ID`, `COLOR`, `WHEEL_SIZE`, `EXTRAS`) VALUES ('$username', $carId ,'$valor', $wheelSize, 3)";
    
          // Ejecutar la consulta
          $result = mysqli_query($conn, $sql);
}
?>