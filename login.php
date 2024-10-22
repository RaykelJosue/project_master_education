<?php
session_start();

$username = ""; // Inicializa variables vacías para evitar errores
$pass = "";     // (opcional, para un mejor manejo de errores)
$mensajeError = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') { // Comprueba si el formulario se envió con POST
  $username = $_POST['username'];
  $pass = $_POST['pass'];

  if (empty($username) OR empty($pass)) {
    $mensajeError = "Campos vacíos. Por favor, ingrese los datos.";
  } else {
    // Incluir el archivo de conexión
    include("con_db.php");

    // Conectar a la base de datos
    $conn = conectar();

    // Realizar la consulta utilizando la conexión
    $resultado = mysqli_query($conn, "SELECT * FROM $tabla_db WHERE Usuario = '$username' AND Contrasena = '$pass'");
    if (mysqli_num_rows($resultado) > 0) {
      $_SESSION['sesion_exito'] = true;
      $_SESSION['username'] = $username; // Establecer el nombre de usuario en la sesión
      header('Location:index_secundario_login/index2.php');
      exit; // Detener la ejecución del script después de la redirección
    } else {
      $mensajeError = "Los datos ingresados son incorrectos. Por favor, ingrese los datos de manera correcta.";
    }
  }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio de sesión</title>
  <link rel="icon" href="iconos/favicon.png" type="image/x-icon">
  <link rel="stylesheet" href="./css/login.css">
</head>
<body>
  <div class="container">
    <img src="iconos/line_tech.png" alt="Foto de fondo" class="background-image">
    <div class="login-box">
      <h2>Inicio de sesión</h2>
      <?php if ($mensajeError != "") { ?>
        <div class="alerta"><?php echo $mensajeError; ?></div>
      <?php } ?>
      <form method="POST" action="login.php">
        <div class="form-group">
          <label for="username">Nombre de usuario</label>
          <input type="text" id="username" name="username" value="<?php echo $username; ?>"> </div>
        <div class="form-group">
          <label for="password">Contraseña</label>
          <input type="password" id="pass" name="pass">
        </div>
        <button type="submit" class="login-button">Iniciar sesión</button> <br></br>
        <button type="submit" class="login-button"><a href="index.html">Volver al inicio</a></button>
      </form>
      <p class="sign-up-text">¿No tienes una cuenta? <a href="register.php">Presiona click aquí para registrarte</a></p>
    </div>
  </div>
</body>
</html>
