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
  <title>Curso de Redes Informáticas | Master Education</title>
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
        <h1>Introducción a las Redes Informáticas</h1>
        <p>En este capítulo aprenderás los fundamentos de las redes informáticas.</p>
      
        <p>Video introductorio:</p>
      
        <iframe width="800" height="400" src="https://www.youtube.com/embed/um41JAqO42g?si=JtwR1FBIdySN0Wdr&amp;controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe><br></br>
        <div class="progress-container">
          <div class="progress-bar" id="myBar"></div>
        </div>
        
        <ul id="lista-capitulos">
          <li><a href="redes0.php">Capítulo 0: Introducción al curso</a></li>
          <li><a href="redes1.php">Capítulo 1: ¿Qué es una IP Pública?</a></li>
          <li><a href="redes2.php">Capítulo 2: ¿Qué es una IP Privada, NAT y puerta de enlace?</a></li>
        </ul>

      </section>
      
  </main>
  <footer>
    <p>&copy; Master Education 2024</p>
  </footer>

</body>
</html>