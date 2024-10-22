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

// Realizar consulta para obtener el nombre del usuario
$query = "SELECT Nombre FROM $tabla_db WHERE Usuario = '$nombre_usuario'";
$resultado = mysqli_query($conn, $query);

if (!$resultado) {
  die("Error al obtener el nombre del usuario: " . mysqli_error($conn));
}

// Obtener el nombre del usuario
$datos_usuario = mysqli_fetch_assoc($resultado);
$nombre = $datos_usuario['Nombre'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>¿Quiénes somos?</title>
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
    <section style="text-align: center;">
        <h2>¿Quiénes somos?</h2>
      </section>
      <section style="text-align: center;" id="features">
        <h2>Master Education es la plataforma de cursos online que te ofrece una amplia variedad de cursos para que puedas adquirir las habilidades y conocimientos que necesitas para alcanzar tus metas.</h2>
        <div class="feature">
          <p>Te ofrecemos la flexibilidad de estudiar a tu propio ritmo y en tu propio horario. Nuestros cursos en línea están diseñados para adaptarse a tu estilo de vida ocupado, permitiéndote acceder a materiales de estudio de alta calidad, interactuar con profesores expertos y conectarte con una comunidad global de estudiantes.</p>
          <p>Nuestra plataforma intuitiva y fácil de usar te brinda una experiencia de aprendizaje en línea sin complicaciones. Con recursos de aprendizaje interactivos, evaluaciones prácticas y retroalimentación personalizada, te garantizamos una experiencia educativa enriquecedora y gratificante.</p>
        </div>
      </section>
    </main>
  <footer>
    <p>&copy; Master Education 2024</p>
  </footer>
</body>
</html>