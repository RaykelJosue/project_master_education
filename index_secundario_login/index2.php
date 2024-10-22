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
  <title>Master Education</title>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="icon" href="../iconos/favicon.png" type="image/x-icon">
</head>
<body>
  <header>
    <h1 class="titulo-principal"><a href="index2.php">Master Education</a></h1>
    <?php
    include("menu.php");
    ?>
  </header>
  <main>
    <section style="text-align: center;">
      <h2>Bienvenido a Master Education</h2>
      <!-- Mostrar el nombre -->
      <p>¡Hola, <?php echo $nombre; ?>!</p>
      <p>¿Con qué te gustaría empezar hoy?</p>
      <a href="cursos.php" class="btn">Presiona aquí para ver los cursos disponibles</a>
    </section>
    <section style="text-align: center;" id="features">
      <h2>Elige el tema con el cual te gustaría aprender hoy</h2>
      <div class="feature">
        <img src="../iconos/icono4.png" alt="Icono 4">
        <h3 class="titulo-feature"><a href="informatica.php">Informática</a></h3>
        <p>Descubre el mundo de la Informática y potencia tus habilidades digitales con nuestros cursos en línea. Desde programación hasta ciberseguridad, nuestra plataforma te brinda acceso a conocimientos actualizados y herramientas prácticas para impulsar tu carrera en el ámbito tecnológico.</p>
      </div>
      <div class="feature">
        <img src="../iconos/icono5.png" alt="Icono 5">
        <h3 class="titulo-feature"><a href="marketing.php">Marketing Digital</a></h3>
        <p>Comienza en el apasionante mundo del Marketing Digital y domina las estrategias clave para destacarte en el entorno digital actual. Nuestros cursos en línea te proporcionan las herramientas y conocimientos necesarios para impulsar la presencia de tu marca en internet, desde SEO y redes sociales hasta publicidad digital y análisis de datos.</p>
      </div>
      <div class="feature">
        <img src="../iconos/icono6.png" alt="Icono 6">
        <h3 class="titulo-feature"><a href="trading.php">Trading</a></h3>
        <p>El trading es la actividad de comprar y vender activos financieros en mercados como acciones, divisas, materias primas y criptomonedas. Con el conocimiento adecuado, puedes convertirte en un trader capaz de generar ingresos adicionales, diversificar tu cartera e incluso convertirlo en tu profesión principal.</p>
      </div>
    </section>
  </main>
  <footer>
    <p>&copy; Master Education 2024</p>
  </footer>
</body>
</html>
