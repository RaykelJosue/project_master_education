<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro</title>
  <link rel="icon" href="iconos/favicon.png" type="image/x-icon">
  <link rel="stylesheet" href="./css/login.css">
</head>
<body>
  <div class="container">
    <img src="iconos/line_tech.png" alt="Foto de fondo" class="background-image">
    <div class="login-box">
      <h2>Registro</h2>
      <?php
      include("con_db.php");
      include("validacion.php");
      ?>
      <form action="register.php" method="POST">
        <div class="form-group">
          <label for="name">Nombre</label>
          <input type="text" id="name" name="name" placeholder="Escribe tu nombre real">
        </div>
        <div class="form-group">
          <label for="ape">Apellido</label>
          <input type="text" id="apellido" name="ape" placeholder="Escribe tu apellido real">
        </div>
        <div class="form-group">
          <label for="username">Usuario</label>
          <input type="text" id="user" name="username" placeholder="Escribe el nombre de usuario">
        </div>
        <div class="form-group">
          <label for="password">Contrasena</label>
          <input type="password" id="pass" name="pass" placeholder="Escribe tu contraseña">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="text" id="email" name="email" placeholder="Escribe el correo electrónico">
        </div>
        <button type="submit" class="login-button"  name="registrar">Registrar</button> <br></br>
        <button type="submit" class="login-button"><a href="index.html">Volver al inicio</a></button>
      </form>
      <p class="sign-up-text">¿Ya estás registrado? <a href="login.php">Presiona click aquí para ingresar</a></p>
    </div>
  </div>
</body>
</html>