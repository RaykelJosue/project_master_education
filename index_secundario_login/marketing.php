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
  <title>Marketing Digital</title>
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
        <h2>Marketing Digital</h2>
      </section>
      <section style="text-align: center;" id="features">
        <h2>¿Qué es el Marketing Digital?</h2>
        <div class="feature">
          <p>Marketing Digital es el conjunto de estrategias volcadas hacia la promoción de una marca en el internet. Se diferencia del marketing tradicional por incluir el uso de canales y métodos que permiten el análisis de los resultados en tiempo real.</p>
        </div>
        <h3>Elige algunos de nuestros cursos</h3>
        <div class="feature">
            <img src="../iconos/icono10.png" alt="Icono 10">
            <h3 class="titulo-feature"><a href="marketing/marketing_inscripcion.php">Marketing Digital básico</h3></a>
            <p>En nuestro curso online de Marketing Digital Básico, aprenderás los conceptos clave del marketing digital y explorarás las diferentes posibilidades a las que tu negocio puede acceder para posicionarse en el mundo digital. Conocerás las herramientas básicas a las que puedes acceder para tus fines comerciales y para generar una nueva atención al cliente centrada en sus necesidades.
            </p>
          </div>
          <h3>Próximamente, habrán más cursos de ésta rama</h3>
      </section>
    </main>
  <footer>
    <p>&copy; Master Education 2024</p>
  </footer>
</body>
</html>