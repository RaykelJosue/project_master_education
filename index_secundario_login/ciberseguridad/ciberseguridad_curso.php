<?php
session_start();

// Verificar si el usuario no ha iniciado sesión
if (!isset($_SESSION['sesion_exito']) || !isset($_SESSION['username'])) {
  // Redirigir al usuario al archivo de inicio de sesión
  header("Location: ../login.php");
  exit; // Detener la ejecución del script después de la redirección
}

// Incluir el archivo de conexión
include('../../con_db.php');

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
  <title>Curso de Ciberseguridad | Master Education</title>
  <link rel="stylesheet" href="../../css/style.css">
  <link rel="icon" href="../../iconos/favicon.png" type="image/x-icon">
  <script src="script.js"></script>
</head>
<body>
  <header>
  <h1 class="titulo-principal"><a href="../index2.php">Master Education</h1></a>
    <?php
    include("../informatica../menu_subcarpetas.php");
    ?>
  </header>
  <main class="contenedor">
    <section id="informacion-curso">
        <h1>Curso completo de Ciberseguridad</h1>
        <p>Este curso de Ciberseguridad, está completo en un solo video.</p>
      
        <iframe width="800" height="400" src="https://www.youtube.com/embed/gzES0MuWqHE?si=Qk11RphjxelRsP3O" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe><br></br>
        <div class="progress-container">
          <div class="progress-bar" id="myBar"></div>
        </div>
      </section>
      
  </main>
  <footer>
    <p>&copy; Master Education 2024</p>
  </footer>

</body>
</html>