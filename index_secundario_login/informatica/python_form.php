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
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cuestionario de Python | Master Education</title>
  <link rel="stylesheet" href="../../css/style.css">
  <link rel="icon" href="../../iconos/favicon.png" type="image/x-icon">
</head>
<body>
  <header>
    <h1 class="titulo-principal"><a href="../index2.php">Master Education</a></h1>
    <?php include("menu_subcarpetas.php"); ?>
  </header>
  <main class="contenedor">
    <section id="cuestionario">
      <h2>Cuestionario de Python</h2>
      <form action="calificar_cuestionario_python.php" method="post">
        <ol>
          <li>
            <p>¿Python es un lenguaje de programación orientado a objetos?</p>
            <input type="radio" id="pregunta1-a" name="pregunta1" value="a">
            <label for="pregunta1-a">Sí</label><br>
            <input type="radio" id="pregunta1-b" name="pregunta1" value="b">
            <label for="pregunta1-b">No</label><br>
            <br>
          </li>
          <li>
            <p>¿Cuál es el operador de asignación en Python?</p>
            <input type="radio" id="pregunta2-a" name="pregunta2" value="a">
            <label for="pregunta2-a">=</label><br>
            <input type="radio" id="pregunta2-b" name="pregunta2" value="b">
            <label for="pregunta2-b">==</label><br>
            <input type="radio" id="pregunta2-c" name="pregunta2" value="c">
            <label for="pregunta2-c">===</label><br>
            <br>
          </li>
          <li>
            <p>¿Qué función se utiliza para imprimir en Python 3?</p>
            <input type="radio" id="pregunta3-a" name="pregunta3" value="a">
            <label for="pregunta3-a">print()</label><br>
            <input type="radio" id="pregunta3-b" name="pregunta3" value="b">
            <label for="pregunta3-b">echo()</label><br>
            <input type="radio" id="pregunta3-c" name="pregunta3" value="c">
            <label for="pregunta3-c">println()</label><br>
            <input type="radio" id="pregunta3-d" name="pregunta3" value="d">
            <label for="pregunta3-d">display()</label><br>
            <br>
          </li>
          <li>
            <p>¿Cuál es el resultado de 2 + 2 en Python?</p>
            <input type="radio" id="pregunta4-a" name="pregunta4" value="a">
            <label for="pregunta4-a">2</label><br>
            <input type="radio" id="pregunta4-b" name="pregunta4" value="b">
            <label for="pregunta4-b">4</label><br>
            <input type="radio" id="pregunta4-c" name="pregunta4" value="c">
            <label for="pregunta4-c">22</label><br>
            <input type="radio" id="pregunta4-d" name="pregunta4" value="d">
            <label for="pregunta4-d">No hay resultado</label><br>
            <br>
          </li>
          <li>
            <p>¿Cuál es la función que se utiliza para obtener la longitud de una lista en Python?</p>
            <input type="radio" id="pregunta5-a" name="pregunta5" value="a">
            <label for="pregunta5-a">length()</label><br>
            <input type="radio" id="pregunta5-b" name="pregunta5" value="b">
            <label for="pregunta5-b">count()</label><br>
            <input type="radio" id="pregunta5-c" name="pregunta5" value="c">
            <label for="pregunta5-c">len()</label><br>
            <input type="radio" id="pregunta5-d" name="pregunta5" value="d">
            <label for="pregunta5-d">size()</label><br>
            <br>
          </li>
          <li>
            <p>¿Qué tipo de estructura de control se utiliza para iterar sobre una secuencia de elementos en Python?</p>
            <input type="radio" id="pregunta6-a" name="pregunta6" value="a">
            <label for="pregunta6-a">if</label><br>
            <input type="radio" id="pregunta6-b" name="pregunta6" value="b">
            <label for="pregunta6-b">while</label><br>
            <input type="radio" id="pregunta6-c" name="pregunta6" value="c">
            <label for="pregunta6-c">for</label><br>
            <input type="radio" id="pregunta6-d" name="pregunta6" value="d">
            <label for="pregunta6-d">switch</label><br>
            <br>
          </li>
          <li>
            <p>¿Cuál es el resultado de 3 * '3' en Python?</p>
            <input type="radio" id="pregunta7-a" name="pregunta7" value="a">
            <label for="pregunta7-a">'9'</label><br>
            <input type="radio" id="pregunta7-b" name="pregunta7" value="b">
            <label for="pregunta7-b">9</label><br>
            <input type="radio" id="pregunta7-c" name="pregunta7" value="c">
            <label for="pregunta7-c">333</label><br>
            <input type="radio" id="pregunta7-d" name="pregunta7" value="d">
            <label for="pregunta7-d">Error</label><br>
            <br>
          </li>
          <li>
            <p>¿Qué tipo de dato se utiliza para almacenar una secuencia de elementos ordenados e inmutables?</p>
            <input type="radio" id="pregunta8-a" name="pregunta8" value="a">
            <label for="pregunta8-a">Lista</label><br>
            <input type="radio" id="pregunta8-b" name="pregunta8" value="b">
            <label for="pregunta8-b">Tupla</label><br>
            <input type="radio" id="pregunta8-c" name="pregunta8" value="c">
            <label for="pregunta8-c">Diccionario</label><br>
            <input type="radio" id="pregunta8-d" name="pregunta8" value="d">
            <label for="pregunta8-d">Conjunto</label><br>
            <br>
          </li>
          <li>
            <p>¿Cuál de las siguientes palabras es una palabra reservada en Python?</p>
            <input type="radio" id="pregunta9-a" name="pregunta9" value="a">
            <label for="pregunta9-a">var</label><br>
            <input type="radio" id="pregunta9-b" name="pregunta9" value="b">
            <label for="pregunta9-b">let</label><br>
            <input type="radio" id="pregunta9-c" name="pregunta9" value="c">
            <label for="pregunta9-c">def</label><br>
            <input type="radio" id="pregunta9-d" name="pregunta9" value="d">
            <label for="pregunta9-d">const</label><br>
            <br>
          </li>
          <li>
            <p>¿Cuál es el resultado de la siguiente expresión en Python: 8 % 3?</p>
            <input type="radio" id="pregunta10-a" name="pregunta10" value="a">
            <label for="pregunta10-a">2</label><br>
            <input type="radio" id="pregunta10-b" name="pregunta10" value="b">
            <label for="pregunta10-b">2.666</label><br>
            <input type="radio" id="pregunta10-c" name="pregunta10" value="c">
            <label for="pregunta10-c">0</label><br>
            <input type="radio" id="pregunta10-d" name="pregunta10" value="d">
            <label for="pregunta10-d">Error</label><br>
            <br>
          </li>
        </ol>
        <button type="submit" class="btn">Enviar respuestas</button>
      </form>
    </section>
  </main>
  <footer>
    <p>&copy; Master Education 2024</p>
  </footer>
</body>
</html>
