<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio 1</title>
  <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
  ?>
</head>
<body>
  
<!-- EJERCICIO 1: Realiza un formulario que reciba 3 números y devuelva el mayor de ellos. -->

<form action="" method="post">
  <label for="numero1">Introduce el primer número</label>
  <input type="number" name="numero1" id="numero1"><br><br>

  <label for="numero2">Introduce el segundo número</label>
  <input type="number" name="numero2" id="numero2"><br><br>
  
  <label for="numero3">Introduce el tercer número</label>
  <input type="number" name="numero3" id="numero3"><br><br>
  
  <input type="submit" value="Comprobar número más alto">
</form>

<?php
  if($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero1 = $_POST["numero1"];
    $numero2 = $_POST["numero2"];
    $numero3 = $_POST["numero3"];

    echo "<h1>Numero más alto: " . max($numero1, $numero2, $numero3) . "</h1>";
  }
?>

</body>
</html>