<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['sesion_exito']) || !isset($_SESSION['username'])) {
  // Redirigir al usuario al archivo de inicio de sesión
  header("Location: ../../../login.php");
  exit; // Detener la ejecución del script después de la redirección
}

// Incluir el archivo de conexión
include("../../con_db.php");

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
  <title>Curso de Trading | Master Education</title>
  <link rel="stylesheet" href="../../css/style.css">
  <link rel="icon" href="../../iconos/favicon.png" type="image/x-icon">
</head>
<body>
  <header>
  <h1 class="titulo-principal"><a href="../index2.php">Master Education</h1></a>
    <?php
    include("../informatica../menu_subcarpetas.php");
    ?>
  </header>
  <main class="contenedor">
    <section id="informacion-curso">
      <h2>Curso de Trading desde Cero</h2>
      <p>Explora el ámbito del Trading y descubre las estrategias esenciales para operar en los mercados financieros de forma eficaz. Aprende a analizar gráficos, interpretar indicadores y gestionar riesgos para tomar decisiones fundamentadas al invertir en acciones, divisas, criptomonedas y otros activos.</p>
      <p>Costo: Gratuito</p>
      <ul>
        <li>Curso completo de Trading desde Cero</li>
      </ul>
      <a href="trading_confirmacion.php" class="btn">Inscribirme ahora</a>
    </section>
  </main>
  <footer>
    <p>&copy; Master Education 2024</p>
  </footer>
</body>
</html>