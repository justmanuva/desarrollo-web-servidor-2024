<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio 4</title>
  <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
  ?>
</head>
<body>
  
<!-- 
EJERCICIO 4: Realiza un formulario que funcione a modo de conversor de temperaturas.

Se introducirá en un campo de texto la temperatura, y luego tendremos un select para elegir

las unidades de dicha temperatura, y otro select para elegir las unidades a las que queremos convertir la temperatura.

Por ejemplo, podemos introducir "10", y seleccionar "CELSIUS", y luego "FAHRENHEIT". Se convertirán los 10 CELSIUS a su equivalente en FAHRENHEIT.

En los select se podrá elegir entre: CELSIUS, KELVIN y FAHRENHEIT. -->


<form action="" method="post">
  <label for="temperatura">Temperatura:</label>
  <input type="text" name="temperatura" id="temperatura"><br><br>

  <label for="origen">De: </label>
  <select name="unidad_old" id="unidad_old">
    <option value="celsius">Celsius</option>
    <option value="kelvin">Kelvin</option>
    <option value="fahrenheit">Fahrenheit</option>
  </select>

  <label for="destino">A: </label>
  <select name="unidad_new" id="unidad_new">
    <option value="celsius">Celsius</option>
    <option value="kelvin">Kelvin</option>
    <option value="fahrenheit">Fahrenheit</option>
  </select><br><br>
  
  <input type="submit" value="Transformar">
</form>

<?php
  if($_SERVER["REQUEST_METHOD"] == "POST") {
    $temperatura = $_POST["temperatura"];

    $unidad_old = $_POST["unidad_old"];
    $unidad_new = $_POST["unidad_new"];

    $celsius = 0;

    if ($unidad_old != $unidad_new) {
      $resultado = match($unidad_old) {
        "celsius" => $celsius = $temperatura,
        "kelvin" => $celsius = $temperatura - 273.15,
        "fahrenheit" => $celsius = ($temperatura - 32) * 5/9
      };

      $resultado = match($unidad_new) {
        "celsius" => $celsius,
        "kelvin" => $celsius + 273.15,
        "fahrenheit" => ($celsius * 9/5) + 32 
      };
      echo "<h2>$resultado</h2>";
    }
    else echo "<h2>$temperatura</h2>";
  }
?>

</body>
</html>