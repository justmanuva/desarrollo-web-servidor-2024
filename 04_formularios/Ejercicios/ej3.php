<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio 3</title>
  <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
  ?>
</head>
<body>
  
<!-- 
EJERCICIO 3:
Realiza un formulario que reciba dos números y devuelva
todos los números primos dentro de ese rango (incluidos los extremos).
-->

<form action="" method="post">
  <label for="numero1">Introduce el primer número</label>
  <input type="number" name="numero1" id="numero1"><br><br>

  <label for="numero2">Introduce el segundo número</label>
  <input type="number" name="numero2" id="numero2"><br><br>
  
  <input type="submit" value="Mostar numeros primos">
</form>

<?php
  if($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero1 = $_POST["numero1"];
    $numero2 = $_POST["numero2"];

    $esPrimo = false;
    $primos = "";

    if ($numero1 == $numero2) echo "<h1>ERROR: números idénticos</h1>";
    else {
      $minimo = min($numero1, $numero2);
      $maximo = max($numero1, $numero2);
      
      for ($i = $minimo; $i <= $maximo; $i++) {
        for ($j = 1; $j <= $maximo; $j++) {
          if ($i%$j!=0 or $i != $i) $primos .= $i.", ";
        }
      }
    }
    echo "<h3>$primos</h3>";
  }

  // EJERCICIO A MEDIO HACER
?>

</body>
</html>