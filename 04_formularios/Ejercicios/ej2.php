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
EJERCICIO 2: Realiza un formulario que reciba 3 números: a, b y c. 

Se mostrarán en una lista los múltiplos de c que se encuentren entre a y b.

Por ejemplo, si a = 3, b = 10, c = 2

Los múltiplos de 2 entre 3 y 10 son: 4, 6, 8 y 10 -->

<form action="" method="post">
  <label for="numeroA">Introduce el número "a"</label>
  <input type="number" name="numeroA" id="numeroA"><br><br>

  <label for="numeroB">Introduce el número "b"</label>
  <input type="number" name="numeroB" id="numeroB"><br><br>
  
  <label for="numeroC">Introduce el número "c"</label>
  <input type="number" name="numeroC" id="numeroC"><br><br>
  
  <input type="submit" value="Mostar lista de múltiplos">
</form>

<?php
  if($_SERVER["REQUEST_METHOD"] == "POST") {
    $A = $_POST["numeroA"];
    $B = $_POST["numeroB"];
    $C = $_POST["numeroC"];

    $multiplos = "";
    
    for ($i = $C; $i <= $B; $i += $C) {
      if($i > $A){
        $multiplos .= $i.", ";
      } 
    }
    echo "<h1>Los multiplos de $C entre $A y $B son: $multiplos</h1>";
  }
?>

</body>
</html>