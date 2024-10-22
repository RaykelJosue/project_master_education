<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['sesion_exito']) || !isset($_SESSION['username'])) {
  // Redirigir al usuario al archivo de inicio de sesión
  header("Location: ../login.php");
  exit; // Detener la ejecución del script después de la redirección
}

// Incluir el archivo de conexión
include("../../con_db.php");

// Conectar a la base de datos
$conn = conectar();

// Obtener el nombre de usuario
$nombre_usuario = $_SESSION['username'];

// Realizar consulta para obtener los datos del usuario
$query = "SELECT * FROM $tabla_db WHERE Usuario = '$nombre_usuario'";
$resultado = mysqli_query($conn, $query);

if (!$resultado) {
  die("Error al obtener los datos del usuario: " . mysqli_error($conn));
}

// Obtener los datos del usuario
$datos_usuario = mysqli_fetch_assoc($resultado);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Curso de Redes Informáticas básico | Master Education</title>
  <link rel="stylesheet" href="../../css/style.css">
  <link rel="icon" href="../../iconos/favicon.png" type="image/x-icon">
</head>
<body>
<header>
    <h1 class="titulo-principal"><a href="../index2.php">Master Education</h1></a>
    <?php
    include("menu_subcarpetas.php");
    ?>
  </header>
  <main class="contenedor">
    <section id="informacion-curso">
      <h2>Curso de Redes Informáticas básico</h2>
      <p>Descubre el emocionante campo de las redes informáticas y adquiere las habilidades necesarias para diseñar, 
        implementar y mantener redes de datos eficientes y seguras. 
        Nuestros cursos te proporcionarán los conocimientos fundamentales, 
        desde la configuración de routers y switches hasta la seguridad de redes, 
        para que puedas convertirte en un experto en la materia.</p>
      <p>Costo: Gratuito</p>
      <ul>
        <li>Capítulo 0: Introducción al curso</li>
        <li>Capítulo 1: ¿Qué es una IP Pública?</li>
        <li>Capítulo 2: ¿Qué es una IP Privada, NAT y puerta de enlace?</li>
      </ul>
      <a href="redes_confirmacion.php" class="btn">Inscribirme ahora</a>
    </section>
  </main>
  <footer>
    <p>&copy; Master Education 2024</p>
  </footer>
</body>
</html>