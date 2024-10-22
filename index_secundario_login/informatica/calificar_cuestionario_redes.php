<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['sesion_exito']) || !isset($_SESSION['username'])) {
  // Redirigir al usuario al archivo de inicio de sesión
  header("Location: ../login.php");
  exit; // Detener la ejecución del script después de la redirección
}

// Definir las preguntas y respuestas correctas
$preguntas = array(
    "pregunta1" => array(
        "pregunta" => "¿Qué protocolo se utiliza para enviar correos electrónicos?",
        "respuestas" => array("a" => "HTTP", "b" => "SMTP", "c" => "FTP", "d" => "SSH"),
        "respuesta_correcta" => "b"
    ),
    "pregunta2" => array(
        "pregunta" => "¿Cuál es el protocolo utilizado para transferir archivos de manera segura?",
        "respuestas" => array("a" => "FTP", "b" => "SMB", "c" => "SSH", "d" => "HTTP"),
        "respuesta_correcta" => "c"
    ),
    "pregunta3" => array(
        "pregunta" => "¿Cuál de los siguientes dispositivos se utiliza para interconectar redes de área local?",
        "respuestas" => array("a" => "Switch", "b" => "Router", "c" => "Firewall", "d" => "Hub"),
        "respuesta_correcta" => "a"
    ),
    "pregunta4" => array(
        "pregunta" => "¿Qué tipo de dirección IP se utiliza para identificar un dispositivo en la red local?",
        "respuestas" => array("a" => "Dirección IP pública", "b" => "Dirección IP estática", "c" => "Dirección IP privada", "d" => "Dirección IP dinámica"),
        "respuesta_correcta" => "c"
    ),
    "pregunta5" => array(
        "pregunta" => "¿Qué dispositivo se utiliza para conectar redes de área local entre sí?",
        "respuestas" => array("a" => "Switch", "b" => "Router", "c" => "Bridge", "d" => "Hub"),
        "respuesta_correcta" => "b"
    ),
    "pregunta6" => array(
        "pregunta" => "¿Cuál es el protocolo utilizado para la resolución de nombres en direcciones IP?",
        "respuestas" => array("a" => "HTTP", "b" => "SMTP", "c" => "DNS", "d" => "DHCP"),
        "respuesta_correcta" => "c"
    ),
    "pregunta7" => array(
        "pregunta" => "¿Qué tipo de cable se utiliza comúnmente para conectar computadoras a un switch?",
        "respuestas" => array("a" => "Cable de fibra óptica", "b" => "Cable coaxial", "c" => "Cable UTP", "d" => "Cable de par trenzado"),
        "respuesta_correcta" => "c"
    ),
    "pregunta8" => array(
        "pregunta" => "¿Qué dispositivo se utiliza para filtrar el tráfico de red basado en reglas predefinidas?",
        "respuestas" => array("a" => "Switch", "b" => "Router", "c" => "Firewall", "d" => "Hub"),
        "respuesta_correcta" => "c"
    ),
    "pregunta9" => array(
        "pregunta" => "¿Cuál es el protocolo utilizado para la transferencia de archivos entre computadoras en una red?",
        "respuestas" => array("a" => "HTTP", "b" => "SMTP", "c" => "FTP", "d" => "SSH"),
        "respuesta_correcta" => "c"
    ),
    "pregunta10" => array(
        "pregunta" => "¿Cuál de los siguientes no es un tipo de topología de red?",
        "respuestas" => array("a" => "Estrella", "b" => "Anillo", "c" => "Cubo", "d" => "Plano"),
        "respuesta_correcta" => "d"
    )
);

// Obtener las respuestas del usuario
$respuestas_usuario = $_POST;

// Calcular el puntaje
$puntaje = 0;
foreach ($preguntas as $nombre_pregunta => $pregunta) {
    $respuesta_correcta = $pregunta["respuesta_correcta"];
    if (isset($respuestas_usuario[$nombre_pregunta]) && $respuestas_usuario[$nombre_pregunta] == $respuesta_correcta) {
        $puntaje++;
    }
}

// Calcular el porcentaje de respuestas correctas
$porcentaje_correctas = ($puntaje / count($preguntas)) * 100;

// Mostrar resultados
$mensaje = "";
if ($porcentaje_correctas >= 50) {
    $mensaje = "<span style='color: green;'>¡Felicidades! Usted ha aprobado el cuestionario.</span><br><br>";
    $mostrar_certificado = true;
} else {
    $mensaje = "<span style='color: red;'>Usted no ha aprobado el cuestionario. Repita el cuestionario nuevamente.</span><br><br>";
    $mostrar_certificado = false;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resultados del Cuestionario | Master Education</title>
  <link rel="stylesheet" href="../../css/style.css">
  <link rel="icon" href="../../iconos/favicon.png" type="image/x-icon">
</head>
<body>
  <header>
    <h1 class="titulo-principal"><a href="../index2.php">Master Education</a></h1>
    <?php include("menu_subcarpetas.php"); ?>
  </header>
  <main class="contenedor">
    <section id="resultados-cuestionario">
      <h2>Resultados del Cuestionario</h2>
      <p>Tu puntaje: <?php echo $puntaje; ?>/<?php echo count($preguntas); ?></p>
      <p><?php echo $mensaje; ?></p>
      <ul>
      <?php foreach ($preguntas as $nombre_pregunta => $pregunta) : ?>
    <li>
        <p><?php echo $pregunta["pregunta"]; ?></p>
        <p>Respuesta Correcta: <?php echo $pregunta["respuestas"][$pregunta["respuesta_correcta"]]; ?></p>
        <?php if (isset($respuestas_usuario[$nombre_pregunta])) : ?>
            <p>Tu Respuesta: <?php echo $pregunta["respuestas"][$respuestas_usuario[$nombre_pregunta]]; ?></p>
            <?php if ($respuestas_usuario[$nombre_pregunta] != $pregunta["respuesta_correcta"]) : ?>
                <p class="incorrecta">Incorrecta</p>
            <?php endif; ?>
        <?php else : ?>
            <p>Tu Respuesta: No respondida</p>
        <?php endif; ?>
        <br>
    </li>
<?php endforeach; ?>
      </ul>
      <?php if ($mostrar_certificado) : ?>
      <a href="descargar_certificado.php" class="btn">Descargar certificado</a> <br><br>
      <?php endif; ?>
      <a href="redes_form.php" class="btn">Regresar al Cuestionario</a>
    </section>
  </main>
  <footer>
    <p>&copy; Master Education 2024</p>
  </footer>
</body>
</html>
