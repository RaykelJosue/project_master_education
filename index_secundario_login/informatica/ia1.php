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
  <title>Curso de Inteligencia Artificial | Master Education</title>
  <link rel="stylesheet" href="../../css/style.css">
  <link rel="icon" href="../../iconos/favicon.png" type="image/x-icon">
  <script src="script.js"></script>
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
        <h1>Introducción a la Inteligencia Artificial</h1>
        <p>En este capítulo aprenderás los fundamentos de la inteligencia artificial.</p>
      
        <p>Video introductorio:</p>
      
        <iframe width="800" height="400" src="https://www.youtube.com/embed/kTejsfOU8gs?si=2APt5gKV_uhg7Nz0&amp;controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe><br></br>
        <div class="progress-container">
          <div class="progress-bar" id="myBar"></div>
        </div>
        
        <ul id="lista-capitulos">
          <li><a href="ia1.php">Capítulo 1: Introducción al curso y herramientas</a></li>
          <li><a href="ia2.php">Capítulo 2: Manejo de datos</a></li>
          <li><a href="ia3.php">Capítulo 3: Pandas</a></li>
        </ul>

      </section>
      
  </main>
  <footer>
    <p>&copy; Master Education 2024</p>
  </footer>

</body>
</html>