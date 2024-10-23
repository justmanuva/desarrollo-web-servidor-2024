<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Potencias</title>
  <?php
      error_reporting( E_ALL );
      ini_set( "display_errors", 1 );

      require("../05_funciones/potencias.php");
  ?>
</head>
<body>
    <form action="" method="post">
      
      <!-- for= "base" lo enlaza con el input Base para que al pinchar se seleccione el texto -->
      <label for="base">Base</label>
      <input type="text" name="base" id="base" placeholder="introduzca la base"><br><br>
      <label for="exponente">Exponente</label>
      <input type="text" name="exponente" id="exponente" placeholder="introduzca el exponente"><br><br>
      <input type="submit" value="Calcular">
    </form>
  
    <?php
      /**
       * CREAR UN FORMULARIO QUE RECIBA DOS PARÁMETROS: BASE Y EXPONENTE
       * 
       * CUANDO SE ENVÍE EL FORMULARIO, SE CALCULARÁ EL RESULTADO DE ELEVAR
       * LA BASE AL EXPONENTE
       * 
       * EJEMPLOS:
       * 
       * 2 ELEVADO A 3 = 8 => 2X2X2 = 8
       * 3 ELEVADO A 2 = 9 => 3X3 = 9
       * 2 ELEVADO A 1 = 2
       * 3 ELEVADO A 0 = 1
       */

      if($_SERVER["REQUEST_METHOD"] == "POST") {
        $tmp_base = $_POST["base"];
        $tmp_exponente = $_POST["exponente"];

        // Primero las condiciones de errores para más limpieza
        if ($tmp_base == "") echo "<p>La base es obligatoria</p>";
        else {
          //Para validar que sea un número (0 da falso, por eso: !==)
          if (filter_var($tmp_base, FILTER_VALIDATE_INT) === FALSE) {
            echo "<p>La base debe ser un número</p>";
          } 
          else $base = $tmp_base;
        }

        if ($tmp_exponente == "") echo "<p>El exponente es obligatorio</p>";
        else {
          //Para validar que sea un número (0 da falso, por eso: !==)
          if (filter_var($tmp_exponente, FILTER_VALIDATE_INT) === FALSE) {
            echo "<p>La base debe ser un número</p>";
          } else {
            if ($tmp_exponente < 0) echo "<p>El exponente debe ser mayor o igual que cero</p>";
            else $exponente = $tmp_exponente;
          }
        }

        if (isset($base) and isset($exponente)) {
          $resultado = potencia($base, $exponente);
          echo "<h1>El resultado es $resultado</h1>";
        }
      }
    ?>
</body>
</html>