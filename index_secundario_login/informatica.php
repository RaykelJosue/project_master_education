<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['sesion_exito']) || !isset($_SESSION['username'])) {
  // Redirigir al usuario al archivo de inicio de sesión
  header("Location: ../login.php");
  exit; // Detener la ejecución del script después de la redirección
}

// Incluir el archivo de conexión
include("../con_db.php");

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
  <title>Informática | Master Education</title>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="icon" href="../iconos/favicon.png" type="image/x-icon">
</head>
<body>
  <header>
    <h1 class="titulo-principal"><a href="index2.php">Master Education</h1></a>
    <?php
    include("menu.php");
    ?>
  </header>
  <main>
    <section style="text-align: center;" id="features">
      <h2>¿Qué es la informática?</h2>
      <div class="feature">
        <p>La informática es una disciplina fundamental en la era digital en la que vivimos. En nuestra página de cursos online, te ofrecemos una amplia variedad de programas de formación en informática para ayudarte a adquirir conocimientos y habilidades en este emocionante campo.</p>
      </div>
      <h3>Elige algunos de nuestros cursos de informática</h3>
      <div class="feature">
        <img src="../iconos/icono7.png" alt="Icono 7">
        <h3 class="titulo-feature"><a href="../index_secundario_login/informatica/programacion.php">Programación</a></h3>
        <p>¿Quieres aprender a crear tus propias aplicaciones, sitios web o software? Si es así, los cursos de programación de Master Education son para ti. La programación es una habilidad fundamental en el mundo digital actual. Nuestros cursos de programación abarcan desde conceptos básicos hasta temas avanzados, y están diseñados para adaptarse a diferentes niveles de experiencia.</p>
      </div>
      <div class="feature">
        <img src="../iconos/icono8.png" alt="Icono 8">
        <h3 class="titulo-feature"><a href="../index_secundario_login/informatica/redes.php">Redes</a></h3>
        <p>Las redes son fundamentales en el mundo digital actual, conectando dispositivos y permitiendo la transferencia de información de manera eficiente. En nuestra página de cursos online, te ofrecemos una amplia selección de programas de formación en redes para ayudarte a adquirir conocimientos y habilidades en este campo en constante evolución.</p>
      </div>
      <div class="feature">
        <img src="../iconos/icono9.png" alt="Icono 9">
        <h3 class="titulo-feature"><a href="../index_secundario_login/informatica/ia.php">Inteligencia Artificial</a></h3>
        <p>Descubre el fascinante mundo de la Inteligencia Artificial a través de nuestro curso en línea especializado. La Inteligencia Artificial es una de las tecnologías más disruptivas y transformadoras del siglo XXI, que abarca el desarrollo de sistemas y algoritmos capaces de simular procesos inteligentes y aprender de la experiencia.</p>
      </div>
    </section>
  </main>
  <footer>
    <p>&copy; Master Education 2024</p>
  </footer>
</body>
</html>
