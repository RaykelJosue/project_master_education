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
  <title>Trading</title>
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
        <h2>Trading</h2>
      </section>
      <section style="text-align: center;" id="features">
        <h2>¿Qué es el Trading?</h2>
        <div class="feature">
          <p>El Trading es el arte de negociar y especular en los mercados financieros con el objetivo de generar rentabilidad en el tiempo. En nuestra página, te ofrecemos una variedad de programas de formación en Trading para ayudarte a adquirir los conocimientos y habilidades necesarios para operar en los mercados financieros de manera efectiva.</p>
        </div>
        <h3>Elige algunos de nuestros cursos</h3>
        <div class="feature">
            <img src="../iconos/icono11.png" alt="Icono 11">
            <h3 class="titulo-feature"><a href="trading/trading_inscripcion.php">Trading básico</h3></a>
            <p>A través de nuestros cursos en línea de Trading, podrás adquirir las herramientas esenciales para desarrollar tu carrera como trader, ya sea como inversor individual o profesional del sector financiero. Desde conceptos básicos hasta estrategias avanzadas, nuestros cursos te prepararán para enfrentar los desafíos de los mercados financieros globales y maximizar tus oportunidades de inversión.
              
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