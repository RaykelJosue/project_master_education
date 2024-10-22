<?php
// Inicia la sesión
session_start();

// Elimina la variable de sesión que indica el inicio de sesión exitoso
unset($_SESSION['sesion_exito']);

// Destruye todas las variables de sesión
session_destroy();

// Redirige al usuario a la página de inicio
header('Location: index.html');
?>