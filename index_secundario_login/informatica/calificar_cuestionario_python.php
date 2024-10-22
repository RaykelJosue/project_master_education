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
        "pregunta" => "¿Python es un lenguaje de programación orientado a objetos?",
        "respuestas" => array("a" => "Sí", "b" => "No"),
        "respuesta_correcta" => "a"
    ),
    "pregunta2" => array(
        "pregunta" => "¿Cuál es el operador de asignación en Python?",
        "respuestas" => array("a" => "=", "b" => "==", "c" => "+=", "d" => "-="),
        "respuesta_correcta" => "a"
    ),
    "pregunta3" => array(
        "pregunta" => "¿Qué función se utiliza para imprimir en Python 3?",
        "respuestas" => array("a" => "print()", "b" => "echo()", "c" => "printf()", "d" => "println()"),
        "respuesta_correcta" => "a"
    ),
    "pregunta4" => array(
        "pregunta" => "¿Cuál es el resultado de 2 + 2 en Python?",
        "respuestas" => array("a" => "4", "b" => "5", "c" => "6", "d" => "7"),
        "respuesta_correcta" => "a"
    ),
    "pregunta5" => array(
        "pregunta" => "¿Cuál es la función que se utiliza para obtener la longitud de una lista en Python?",
        "respuestas" => array("a" => "length()", "b" => "len()", "c" => "size()", "d" => "count()"),
        "respuesta_correcta" => "b"
    ),
    "pregunta6" => array(
        "pregunta" => "¿Qué tipo de estructura de control se utiliza para iterar sobre una secuencia de elementos en Python?",
        "respuestas" => array("a" => "if-else", "b" => "while", "c" => "for", "d" => "switch"),
        "respuesta_correcta" => "c"
    ),
    "pregunta7" => array(
        "pregunta" => "¿Cuál es el resultado de 3 * '3' en Python?",
        "respuestas" => array("a" => "6", "b" => "9", "c" => "'333'", "d" => "TypeError"),
        "respuesta_correcta" => "c"
    ),
    "pregunta8" => array(
        "pregunta" => "¿Qué tipo de dato se utiliza para almacenar una secuencia de elementos ordenados e inmutables?",
        "respuestas" => array("a" => "Listas", "b" => "Tuplas", "c" => "Conjuntos", "d" => "Diccionarios"),
        "respuesta_correcta" => "b"
    ),
    "pregunta9" => array(
        "pregunta" => "¿Cuál de las siguientes palabras es una palabra reservada en Python?",
        "respuestas" => array("a" => "define", "b" => "function", "c" => "def", "d" => "void"),
        "respuesta_correcta" => "c"
    ),
    "pregunta10" => array(
        "pregunta" => "¿Cuál es el resultado de la siguiente expresión en Python: 8 % 3?",
        "respuestas" => array("a" => "2", "b" => "3", "c" => "0", "d" => "1"),
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
    $mensaje = "<span style='color: green;'>¡Felicidades! Usted ha aprobado el curso.</span><br><br>";
    $mostrar_certificado = true;
} else {
    $mensaje = "<span style='color: red;'>Usted no ha aprobado el curso. Repita el cuestionario nuevamente.</span><br><br>";
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
      <a href="python2.php" class="btn">Regresar al Curso</a>
    </section>
  </main>
  <footer>
    <p>&copy; Master Education 2024</p>
  </footer>
</body>
</html>
