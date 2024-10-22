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
      <h2>Curso de Ciberseguridad</h2>
      <p>En la era digital, la seguridad de nuestros datos e información es más importante que nunca. 
        El curso de Ciberseguridad te brindará las herramientas y habilidades para convertirte en un protector del mundo
         digital. No importa si eres un principiante o un profesional con experiencia, 
         este curso te proporcionará los conocimientos y las habilidades que necesitas para convertirte 
         en un experto en ciberseguridad.</p>
      <p>Costo: Gratuito</p>
      <ul>
        <li>Curso completo de Ciberseguridad</li>
      </ul>
      <a href="ciberseguridad_confirmacion.php" class="btn">Inscribirme ahora</a>
    </section>
  </main>
  <footer>
    <p>&copy; Master Education 2024</p>
  </footer>
</body>
</html>