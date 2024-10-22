<?php
include_once("con_db.php");

// Conectar a la base de datos
$conn = conectar();

if (isset($_POST["registrar"])) {
    $name = $_POST["name"];
    $ape = $_POST["ape"];
    $username = $_POST["username"];
    $pass = $_POST["pass"];
    $email = $_POST["email"];

    // Validar la longitud de todas las variables
    if (strlen($name) < 3 || strlen($ape) < 3 || strlen($username) < 3 || strlen($email) < 5) {
        echo '<div class="alerta">Todos los campos deben tener al menos 3 caracteres. </div>';
    }
    if (strlen($pass) < 8) {
      echo '<div class="alerta">La contraseña debe tener al menos 8 caracteres. </div>';
    }
     else { 
        // Insertar los datos en la base de datos
        $sql = $conn->query("INSERT INTO $tabla_db(Nombre, Apellido, Usuario, Contrasena, Email) VALUES ('$name', '$ape', '$username', '$pass', '$email')");
        if ($sql === TRUE) {
            echo '<div class="success">Te has registrado exitosamente</div>';
        } else {
            echo '<div class="alerta">El registro no fue exitoso. Inténtelo nuevamente.</div>';
            echo "Error: " . $conn->error;
        }
    }
  }
?>

