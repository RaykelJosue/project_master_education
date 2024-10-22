<?php
session_start();

// Verificar si el usuario no ha iniciado sesión
if (!isset($_SESSION['sesion_exito']) || !isset($_SESSION['username'])) {
  // Redirigir al usuario al archivo de inicio de sesión
  header("Location: ../login.php");
  exit; // Detener la ejecución del script después de la redirección
}

// Incluir el archivo de conexión
include("../../con_db.php");

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
  <title>Curso no disponible | Master Education</title>
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
      <h2>Curso no disponible</h2>
      <p>
        Lo sentimos, este curso no está disponible en este momento. 
        Pero no te preocupes. Próximamente lo estaremos colocando para que te puedas educar con nosotros.
      </p>
      <section style="text-align: center;">
        <a href="programacion.php" class="btn">Presiona aquí para ver los cursos de informática que están disponibles</a>
      </section>
    </section>
  </main>
  <footer>
    <p>&copy; Master Education 2024</p>
  </footer>
</body>
</html>
