<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio 2</title>
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
  <select name="unidad-old" id="unidad-old">
    <option value="celsius-new">Celsius</option>
    <option value="kelvin-new">Kelvin</option>
    <option value="fahrenheit-new">Fahrenheit</option>
  </select>

  <label for="destino">A: </label>
  <select name="unidad-new" id="unidad-new">
    <option value="celsius-old">Celsius</option>
    <option value="kelvin-old">Kelvin</option>
    <option value="fahrenheit-old">Fahrenheit</option>
  </select><br><br>
  
  <input type="submit" value="Transformar">
</form>

<!-- 
EJERCICIO 4: Realiza un formulario que funcione a modo de conversor de temperaturas.

Se introducirá en un campo de texto la temperatura, y luego tendremos un select para elegir

las unidades de dicha temperatura, y otro select para elegir las unidades a las que queremos convertir la temperatura.

Por ejemplo, podemos introducir "10", y seleccionar "CELSIUS", y luego "FAHRENHEIT". Se convertirán los 10 CELSIUS

a su equivalente en FAHRENHEIT.

En los select se podrá elegir entre: CELSIUS, KELVIN y FAHRENHEIT. -->

<?php
  if($_SERVER["REQUEST_METHOD"] == "POST") {
    // $A = $_POST["numeroA"];
    // $B = $_POST["numeroB"];
    // $C = $_POST["numeroC"];
  }

  // EJERCICIO A MEDIO HACER

?>

</body>
</html>