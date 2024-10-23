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
      $tmp_iva = $_POST["iva"];

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
      if(isset($precio) and isset($iva)){
        echo calcularPVP($precio, $iva);
      }
    }
  ?>
</body>
</html>