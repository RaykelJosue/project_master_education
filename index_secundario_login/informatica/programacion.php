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
  <title>Cursos de Programación | Master Education</title>
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
      <h2>Cursos de Programación</h2>
      <p>Descubre el apasionante mundo de la programación y aprende a crear tus propias aplicaciones, sitios web o software. Nuestros cursos te brindarán las herramientas y conocimientos necesarios para convertirte en un programador profesional.</p>
    </section>
    <section id="cursos">
      <ul>
        <li>
          <a href="python_inscripcion.php">
            <img src="icons_cursos/python.png" alt="Curso de Python">
            <h3 class="titulo-feature">Python para principiantes</h3>
            <p>Aprende los fundamentos de la programación con Python, uno de los lenguajes más populares y versátiles del mundo.</p>
          </a>
        </li>
        <li>
          <a href="pronto.php">
            <img src="icons_cursos/javascript.png" alt="Curso de JavaScript">
            <h3>JavaScript: Desarrollo web front-end</h3>
            <p>Domina el lenguaje JavaScript y crea interfaces web dinámicas e interactivas.</p>
          </a>
        </li>
        <li>
          <a href="pronto.php">
            <img src="icons_cursos/c++.png" alt="Curso de C++">
            <h3>C++</h3>
            <p>Aprende los secretos de la programación con C++.</p>
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