<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['sesion_exito']) || !isset($_SESSION['username'])) {
  // Redirigir al usuario al archivo de inicio de sesión
  header("Location: ../login.php");
  exit; // Detener la ejecución del script después de la redirección
}

// Incluir el archivo de conexión
include("../../con_db.php");

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

// Asignar el nombre y apellido del usuario a variables
$name = $datos_usuario['Nombre'];
$ape = $datos_usuario['Apellido'];



require('../../lib/fpdf/fpdf.php');

// Nombre y apellido del usuario (puedes obtenerlo desde la sesión o desde algún otro lugar)
$datos_usuario['Nombre'];
$datos_usuario['Apellido'];

// Ruta del certificado diseñado en Canva
$certificado_path = "../../iconos/certificado.png";

// Crear una instancia de FPDF
$pdf = new FPDF('L'); // 'L' para orientación horizontal
$pdf->AddPage();

// Agregar el certificado al PDF
$pdf->Image($certificado_path, 0, 0, 297, 210); // Ajusta el tamaño según sea necesario para orientación horizontal

// Agregar nombre y apellido del usuario
$pdf->SetFont('Arial', 'B', 16);
$pdf->SetXY(100, 115); // Posición donde se agregará el nombre
$pdf->Cell(100, 10, $name . " " . $ape, 0, 1, 'C');

// Nombre del archivo PDF que se descargará
$filename = "certificado_" . $name . "_" . $ape . ".pdf";

// Salida del PDF (descargar)
$pdf->Output('D', $filename);
?>
