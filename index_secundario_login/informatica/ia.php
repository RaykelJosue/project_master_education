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
  <title>Inteligencia Artificial | Master Education</title>
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
      <h2>Curso de Inteligencia Artificial</h2>
      <p>Adquiere las habilidades y conocimientos necesarios para convertirte en un profesional de la IA. Nuestros cursos te brindarán las herramientas para desarrollar sistemas inteligentes que puedan resolver problemas complejos, tomar decisiones automatizadas y mejorar la vida de las personas.</p>
    </section>
    <section id="cursos">
      <ul>
        <li>
          <a href="ia_inscripcion.php">
            <img src="icons_cursos/ia.png" alt="Curso de IA">
            <h3>Inteligencia Artificial</h3>
            <p>Adéntrate en el fascinante mundo de la Inteligencia Artificial (IA), la tecnología que está revolucionando la forma en que vivimos, trabajamos e interactuamos con el mundo. 
              Desde robots que aprenden hasta sistemas que pueden predecir el futuro, descubre los avances 
              y aplicaciones de la IA que están transformando nuestro mundo.</p>
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
