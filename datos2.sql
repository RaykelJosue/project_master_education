<?php
session_start();

// Verificar si el usuario no ha iniciado sesión
if (!isset($_SESSION['sesion_exito'])) {
  // Redirigir al usuario al archivo de inicio de sesión
  header("Location: ../login.php");
  exit; // Detener la ejecución del script después de la redirección
}

// Si el usuario ha iniciado sesión, puedes continuar con el contenido de la página

// Incluir el archivo de conexión a la base de datos
include("con_db.php");

// Obtener el nombre de usuario que ha iniciado sesión
$nombre_usuario = $_SESSION['username'];

// Realizar una consulta SQL para obtener el nombre del usuario
$consulta_usuario = "SELECT Nombre FROM usuarios WHERE Usuario = '$nombre_usuario'";
$resultado_usuario = mysqli_query($conn, $consulta_usuario);

// Verificar si se obtuvo un resultado y obtener el nombre del usuario
if ($resultado_usuario && mysqli_num_rows($resultado_usuario) > 0) {
  $fila_usuario = mysqli_fetch_assoc($resultado_usuario);
  $nombre = $fila_usuario['Nombre'];
} else {
  // Si no se pudo obtener el nombre del usuario, mostrar un mensaje de error
  $nombre = "Error al obtener el nombre del usuario";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mi Perfil</title>
  <link rel="stylesheet" href="./style.css">
  <link rel="icon" href="../iconos/favicon.png" type="image/x-icon">
</head>
<body>
  <header>
    <h1 class="titulo-principal"><a href="index2.php">Master Education</h1></a>
    <nav>
      <ul>
        <li class="active"><a href="index2.php">Inicio</a></li>
        <li class="active"><a href="about.php">Sobre nosotros</a></li>
        <li class="active"><a href="perfil.php">Mi perfil</a></li>
        <li class="active"><a href="../cerrar_sesion.php">Cerrar sesión</a></li>
        <li class="active"><a href="cursos.php">Cursos</a>
          <ul class="lista-cursos">
            <li><a href="informatica.php">Informática</a></li>
            <li><a href="marketing.php">Marketing Digital</a></li>
            <li><a href="trading.php">Trading</a></li>
            <li><a href="ciberseguridad.php">Ciberseguridad</a></li>
          </ul>
        </li>
      </ul>
    </nav>
  </header>
  <main>
    <section>
      <h2>Mi Perfil</h2>
      <!-- Mostrar el nombre del usuario -->
      <p>Bienvenido a tu perfil, <?php echo $nombre; ?>!</p>
      <p>Aquí puedes ver y editar tu información personal.</p>
    </section>
  </main>
  <footer>
    <p>&copy; Master Education 2024</p>
  </footer>
</body>
</html>
