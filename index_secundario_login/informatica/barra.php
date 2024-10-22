<?php
session_start();

// Verificar si el usuario no ha iniciado sesión
if (!isset($_SESSION['sesion_exito']) || !isset($_SESSION['username'])) {
  // Redirigir al usuario al archivo de inicio de sesión
  header("Location: ../login.php");
  exit; // Detener la ejecución del script después de la redirección
}

// Incluir el archivo de conexión
include("../con_db.php");

// Conectar a la base de datos
$conn = conectar();

// Obtener el nombre de usuario que ha iniciado sesión
$nombre_usuario = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style.css">
    <script src="script.js"></script>
</head>
<body>
    <div class="progress-container">
        <div class="progress-bar" id="myBar"></div>
      </div>
</body>
</html>