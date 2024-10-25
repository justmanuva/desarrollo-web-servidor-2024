<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Calculadora de IVA</title>
  <?php
    //  Activamos los errores de PHP
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );

    require("../05_funciones/economia.php");
  ?>
</head>
<body>
  <form action="" method="post">
    <label for="precio">Precio</label>
    <input type="number" name="precio" id="precio"><br><br>
    <label for="iva">IVA</label>
    <select name="iva" id="iva">
      <option value="general">General</option>
      <option value="reducido">Reducido</option>
      <option value="SUPERREDUCIDO">SUPERREDUCIDO</option>
    </select><br><br>
    <input type="submit" value="Calcular PVP">
  </form>

  <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
      $tmp_precio = $_POST["precio"];
      // Comprobamos esto para que tenga que meterte algo si o si y si no lo manda vacio
      if (isset($_POST["iva"])) $tmp_iva = $_POST["iva"];
      else $tmp_iva = "";

      if ($tmp_precio == "") echo "<p>El precio es obligatorio</p>";
      else {
        if (filter_var($tmp_precio, FILTER_VALIDATE_FLOAT) === FALSE) {
          echo "<p>El precio debe ser un número</p>";
        }
        else {
          if ($tmp_precio < 0) echo "<p>El precio debe ser mayor a 0</p>";
          else $precio = $tmp_precio;
        }
      }

      if ($tmp_iva == "") echo "<p>El IVA es obligatorio</p>";
      else {
        // Para comprobar valores de forma más eficiente (in_array)
        $valores_validos_iva = ["general", "reducido", "superreducido"];
        if (!in_array($tmp_iva, $valores_validos_iva)) {
          echo "<p>El IVA solo puede ser: GENERAL, REDUCIDO, SUPERREDUCIDO</p>";
        } else $iva = $tmp_iva;
      }
    }
  ?>
  <!--
    Ponemos el php arriba porque si no la variable err_precio no existiria, siemor ese recomienda ponerlo arriba
    Aparte no influye porque la pagina cuando la abres entra por get, y cuando mandas el formulario se reinicia la pagina
    y sale el post y ya ahi se ejecuta el codigo php.
-->
  <form action="" method="post">
    <input type="text" name="Precio">
    <?php if(isset($err_precio)) echo "<span class = 'error'>$err_precio</span>";?><!--si se ha producido algun error sale por pantalla-->
    <br>
    <select name="iva" id="iva">
        <option disabled selected hidden>--- Elige un tipo de IVA ---</option><!-- Esto le pone un enunciado a lo de las opciones -->
        <option value="General">General</option>
        <option value="Reducido">Reducido</option>
        <option value="Superreducido">Superreducido</option>
    </select>
    <?php if(isset($err_iva)) echo "<span class = 'error'>$err_iva</span>";?>
    <br>
    <input type="submit" value="Calcular">
  </form>

    <!-- Ponemos esto aqui para que nos salga el precio abajo y no arriba -->
    <?php 
        if(isset($tmp_precio) && isset($tmp_iva)) {
            echo "<h1>El PVP es " . iva($tmp_precio, $tmp_iva) . "</h1>";
        }
    ?>
</body>
</html>