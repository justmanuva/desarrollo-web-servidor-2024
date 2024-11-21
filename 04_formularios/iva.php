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
  <style>
    .error {
      color: red;
      font-style: italic;
    }
  </style>
</head>
<body>

  <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
      $tmp_precio = $_POST["precio"];
      // Solo lo mete si existe, si no, lo manda vacío.
      if (isset($_POST["iva"])) $tmp_iva = $_POST["iva"];
      else $tmp_iva = "";

      if ($tmp_precio == "") {
        echo "<p>El precio es obligatorio</p>";
        $err_precio = "<p>El precio es obligatorio</p>";
      }
      else {
        if (filter_var($tmp_precio, FILTER_VALIDATE_FLOAT) === FALSE) {
          echo "<p>El precio debe ser un número</p>";
          $err_precio = "<p>El precio debe ser un número</p>";
        }
        else {
          if ($tmp_precio < 0) {
            echo "<p>El precio debe ser mayor o igual a 0</p>";
            $err_precio = "<p>El precio debe ser mayor o igual a 0</p>";
          } 
          else $precio = $tmp_precio;
        }
      }

      if ($tmp_iva == "") {
        echo "<p>El IVA es obligatorio</p>";
        $err_iva = "<p>El IVA es obligatorio</p>";
      }
      else {
        // Para comprobar valores de forma más eficiente (in_array)
        $valores_validos_iva = ["general", "reducido", "superreducido"];
        if (!in_array($tmp_iva, $valores_validos_iva)) {
          echo "<p>El IVA solo puede ser: GENERAL, REDUCIDO, SUPERREDUCIDO</p>";
          $err_iva = "<p>El IVA solo puede ser: GENERAL, REDUCIDO, SUPERREDUCIDO</p>";
        } else $iva = $tmp_iva;
      }
    }
  ?>

  <!--Siempre recomendable poner el php arriba, antes del formulario-->

  <form action="" method="post">
    <input type="text" name="precio">

    <!-- Sale por pantalla el error -->
    <?php if(isset($err_precio)) echo "<span class = 'error'>$err_precio</span>";?>
    <br><br>
    <select name="iva" id="iva">

        <!-- Esto le pone un enunciado a lo de las opciones -->
        <option disabled selected hidden>--- Elige un tipo de IVA ---</option>
        <option value="general">General</option>
        <option value="reducido">Reducido</option>
        <option value="superreducido">Superreducido</option>
    </select>
    <?php if(isset($err_iva)) echo "<span class = 'error'>$err_iva</span>";?>
    <br><br>
    <input type="submit" value="Calcular">
  </form>

    <!-- Para que el precio salga abajo -->
    <?php 
        if(isset($tmp_precio) && isset($tmp_iva)) {
            echo "<h1>El PVP es " . calcularPVP($tmp_precio, $tmp_iva) . "</h1>";
        }
    ?>
</body>
</html>