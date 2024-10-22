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
  <title>Redes | Master Education</title>
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
  <main>
    <section style="text-align: center;">
      <h2>Cursos de Redes</h2>
      <p>Explora el fascinante universo de las redes informáticas y adquiere las habilidades necesarias para diseñar, 
        implementar y gestionar redes de datos eficientes y seguras. 
        Nuestros cursos te proporcionarán las herramientas y conocimientos esenciales para convertirte en un profesional
        en redes informáticas.</p>
    </section>
    <section id="cursos">
      <ul>
        <li>
          <a href="redes_inscripcion.php">
            <img src="icons_cursos/red.png" alt="Curso de Redes">
            <h3>Redes Informáticas</h3>
            <p>Aprende los fundamentos de las redes informáticas, desde la arquitectura básica hasta los protocolos de comunicación y la seguridad. Explora conceptos como 
              TCP/IP, DNS, firewalls y enrutamiento, y adquiere las habilidades necesarias para configurar, 
              administrar y solucionar problemas en redes de todo tipo.</p>
          </a>
        </li>
      </ul>
    </section>
  </main>
  <footer>
    <p>&copy; Master Education 2024</p>
  </footer>
</body>
</html>
