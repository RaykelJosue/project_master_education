<?php
// Inicia la sesión
session_start();

// Verifica si el usuario está autenticado
if (!isset($_SESSION['usuario'])) {
    // Si el usuario no está autenticado, redirige al formulario de inicio de sesión
    header("Location: login.php");
    exit();
}
?>
