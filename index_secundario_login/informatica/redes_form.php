<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cuestionario de Redes Informáticas | Master Education</title>
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
      <h2>Cuestionario de Redes Informáticas</h2>
      <form action="calificar_cuestionario_redes.php" method="post">
        <ol>
          <li>
            <p>¿Qué protocolo se utiliza para enviar correos electrónicos?</p>
            <input type="radio" id="pregunta1-a" name="pregunta1" value="a">
            <label for="pregunta1-a">HTTP</label><br>
            <input type="radio" id="pregunta1-b" name="pregunta1" value="b">
            <label for="pregunta1-b">SMTP</label><br>
            <input type="radio" id="pregunta1-c" name="pregunta1" value="c">
            <label for="pregunta1-c">FTP</label><br>
            <input type="radio" id="pregunta1-d" name="pregunta1" value="d">
            <label for="pregunta1-d">SSH</label><br>
            <br>
          </li>
          <li>
            <p>¿Cuál es el protocolo utilizado para transferir archivos de manera segura?</p>
            <input type="radio" id="pregunta2-a" name="pregunta2" value="a">
            <label for="pregunta2-a">FTP</label><br>
            <input type="radio" id="pregunta2-b" name="pregunta2" value="b">
            <label for="pregunta2-b">SMB</label><br>
            <input type="radio" id="pregunta2-c" name="pregunta2" value="c">
            <label for="pregunta2-c">SSH</label><br>
            <input type="radio" id="pregunta2-d" name="pregunta2" value="d">
            <label for="pregunta2-d">HTTP</label><br>
            <br>
          </li>
          <li>
            <p>¿Cuál de los siguientes dispositivos se utiliza para interconectar redes de área local?</p>
            <input type="radio" id="pregunta3-a" name="pregunta3" value="a">
            <label for="pregunta3-a">Switch</label><br>
            <input type="radio" id="pregunta3-b" name="pregunta3" value="b">
            <label for="pregunta3-b">Router</label><br>
            <input type="radio" id="pregunta3-c" name="pregunta3" value="c">
            <label for="pregunta3-c">Firewall</label><br>
            <input type="radio" id="pregunta3-d" name="pregunta3" value="d">
            <label for="pregunta3-d">Hub</label><br>
            <br>
          </li>
          <li>
            <p>¿Qué tipo de dirección IP se utiliza para identificar un dispositivo en la red local?</p>
            <input type="radio" id="pregunta4-a" name="pregunta4" value="a">
            <label for="pregunta4-a">Dirección IP pública</label><br>
            <input type="radio" id="pregunta4-b" name="pregunta4" value="b">
            <label for="pregunta4-b">Dirección IP estática</label><br>
            <input type="radio" id="pregunta4-c" name="pregunta4" value="c">
            <label for="pregunta4-c">Dirección IP privada</label><br>
            <input type="radio" id="pregunta4-d" name="pregunta4" value="d">
            <label for="pregunta4-d">Dirección IP dinámica</label><br>
            <br>
          </li>
          <li>
            <p>¿Qué dispositivo se utiliza para conectar redes de área local entre sí?</p>
            <input type="radio" id="pregunta5-a" name="pregunta5" value="a">
            <label for="pregunta5-a">Switch</label><br>
            <input type="radio" id="pregunta5-b" name="pregunta5" value="b">
            <label for="pregunta5-b">Router</label><br>
            <input type="radio" id="pregunta5-c" name="pregunta5" value="c">
            <label for="pregunta5-c">Bridge</label><br>
            <input type="radio" id="pregunta5-d" name="pregunta5" value="d">
            <label for="pregunta5-d">Hub</label><br>
            <br>
          </li>
          <li>
            <p>¿Cuál es el protocolo utilizado para la resolución de nombres en direcciones IP?</p>
            <input type="radio" id="pregunta6-a" name="pregunta6" value="a">
            <label for="pregunta6-a">HTTP</label><br>
            <input type="radio" id="pregunta6-b" name="pregunta6" value="b">
            <label for="pregunta6-b">SMTP</label><br>
            <input type="radio" id="pregunta6-c" name="pregunta6" value="c">
            <label for="pregunta6-c">DNS</label><br>
            <input type="radio" id="pregunta6-d" name="pregunta6" value="d">
            <label for="pregunta6-d">DHCP</label><br>
            <br>
          </li>
          <li>
            <p>¿Qué tipo de cable se utiliza comúnmente para conectar computadoras a un switch?</p>
            <input type="radio" id="pregunta7-a" name="pregunta7" value="a">
            <label for="pregunta7-a">Cable de fibra óptica</label><br>
            <input type="radio" id="pregunta7-b" name="pregunta7" value="b">
            <label for="pregunta7-b">Cable coaxial</label><br>
            <input type="radio" id="pregunta7-c" name="pregunta7" value="c">
            <label for="pregunta7-c">Cable UTP</label><br>
            <input type="radio" id="pregunta7-d" name="pregunta7" value="d">
            <label for="pregunta7-d">Cable de par trenzado</label><br>
            <br>
          </li>
          <li>
            <p>¿Qué dispositivo se utiliza para filtrar el tráfico de red basado en reglas predefinidas?</p>
            <input type="radio" id="pregunta8-a" name="pregunta8" value="a">
            <label for="pregunta8-a">Switch</label><br>
            <input type="radio" id="pregunta8-b" name="pregunta8" value="b">
            <label for="pregunta8-b">Router</label><br>
            <input type="radio" id="pregunta8-c" name="pregunta8" value="c">
            <label for="pregunta8-c">Firewall</label><br>
            <input type="radio" id="pregunta8-d" name="pregunta8" value="d">
            <label for="pregunta8-d">Hub</label><br>
            <br>
          </li>
          <li>
            <p>¿Cuál es el protocolo utilizado para la transferencia de archivos entre computadoras en una red?</p>
            <input type="radio" id="pregunta9-a" name="pregunta9" value="a">
            <label for="pregunta9-a">HTTP</label><br>
            <input type="radio" id="pregunta9-b" name="pregunta9" value="b">
            <label for="pregunta9-b">SMTP</label><br>
            <input type="radio" id="pregunta9-c" name="pregunta9" value="c">
            <label for="pregunta9-c">FTP</label><br>
            <input type="radio" id="pregunta9-d" name="pregunta9" value="d">
            <label for="pregunta9-d">SSH</label><br>
            <br>
          </li>
          <li>
            <p>¿Cuál de los siguientes no es un tipo de topología de red?</p>
            <input type="radio" id="pregunta10-a" name="pregunta10" value="a">
            <label for="pregunta10-a">Estrella</label><br>
            <input type="radio" id="pregunta10-b" name="pregunta10" value="b">
            <label for="pregunta10-b">Anillo</label><br>
            <input type="radio" id="pregunta10-c" name="pregunta10" value="c">
            <label for="pregunta10-c">Cubo</label><br>
            <input type="radio" id="pregunta10-d" name="pregunta10" value="d">
            <label for="pregunta10-d">Plano</label><br>
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
