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
  <title>Ciberseguridad</title>
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
        <h2>Ciberseguridad</h2>
      </section>
      <section style="text-align: center;" id="features">
        <h2>¿Qué es la Ciberseguridad?</h2>
        <div class="feature">
          <p>La ciberseguridad es el conjunto de procedimientos y herramientas que se implementan para proteger la información que se genera y procesa a través de computadoras, servidores, dispositivos móviles, redes y sistemas electrónicos. En un mundo hiperconectado, donde la mayoría de nuestras actividades se realizan a través de la red y dispositivos electrónicos, garantizar la seguridad de las operaciones es una necesidad imperante.
          </p>
        </div>
        <h3>Elige algunos de nuestros cursos</h3>
        <div class="feature">
            <img src="../iconos/icono12.png" alt="Icono 12">
            <h3 class="titulo-feature"><a href="ciberseguridad/ciberseguridad_inscripcion.php">Ciberseguridad</h3></a>
            <p>¿Te preocupa la seguridad de tu información personal y profesional en el mundo digital? En la actualidad, es fundamental conocer las principales amenazas y las medidas básicas para protegerte de los ciberataques. El curso de Ciberseguridad básica de Master Education te proporcionará las herramientas y conocimientos necesarios para navegar por internet de forma segura.
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