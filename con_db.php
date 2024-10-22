<?php

function conectar() {
    $dbhost = "localhost";
    $dbname = "cursos_usuarios";
    $dbuser = "root";
    $dbpass = "";

    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

    // Comprobar la conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Establecer la codificación de caracteres (opcional)
    $conn->set_charset("utf8");

    return $conn;
}

// Lista de tabla
$tabla_db = "usuarios";  // Tabla de usuarios
?>