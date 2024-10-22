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
  <title>Cursos disponibles | Master Education</title>
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
      <h2>Cursos disponibles</h2>
    </section>
    <section style="text-align: center;" id="features">
      <h2>Elige el tema con el cual te gustaría aprender hoy</h2>
      <div class="feature">
        <img src="../iconos/icono4.png" alt="Icono 4">
        <h3 class="titulo-feature"><a href="informatica.php">Informática</a></h3>
      </div>
      <div class="feature">
        <img src="../iconos/icono5.png" alt="Icono 5">
        <h3 class="titulo-feature"><a href="marketing.php">Marketing Digital</a></h3>
      </div>
      <div class="feature">
        <img src="../iconos/icono6.png" alt="Icono 6">
        <h3 class="titulo-feature"><a href="trading.php">Trading</a></h3>
      </div>
      <div class="feature">
        <img src="../iconos/icono12.png" alt="Icono 12">
        <h3 class="titulo-feature"><a href="ciberseguridad.php">Ciberseguridad</a></h3>
      </div>
    </section>
  </main>
  <footer>
    <p>&copy; Master Education 2024</p>
  </footer>
</body>
</html>
