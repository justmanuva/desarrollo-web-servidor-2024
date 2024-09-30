<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicios</title>
  <<?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
  ?>
</head>
<body>
  <!--
    EJERCICIO 1: MOSTRAR LA FECHA ACTUAL CON EL SIGUIENTE FORMATO:
      Viernes 27 de Septiembre de 2024
    UTILIZAR LAS ESTRUCTURAS DE CONTROL NECESARIAS
  -->

  <?php
    $dia = date("l");

    $dia = match ($dia){
      "Monday" => "Lunes",
      "Tuesday" => "Martes",
      "Wednesday" => "Miércoles",
      "Thursday" => "Jueves",
      "Friday" => "Viernes",
      "Saturday" => "Sábado",
      "Sunday" => "Domingo",
    };

    $mes = date("n");
    /* $mes = match($mes) {
      1 => "Enero",
      2 => "Febrero",
      3 => "Marzo",
      4 => "Abril",
      5 => "Mayo",
      6 => "Junio",
      7 => "Julio",
      8 => "Agosto",
      9 => "Septiembre",
      10 => "Octubre",
      11 => "Noviembre",
      12 => "Diciembre"
    }; */
  ?>

  <h3>EJERCICIO 2:</h3> 
  <p>MOSTRAR EN UNA LISTA LOS NUMEROS MULTIPLOS DE 3 USANDO WHILE E IF</p>
    <ul>
      <?php
        $i = 1;
        echo "<ul>";
        while ($i <= 100){
          if($i <= 100){
            echo "<li>$i</li>";
          }
          $i++;
        }
      ?>
    </ul>

  <h3>EJERCICIO 3:</h3> 
  <p>CALCULAR LA SUMA DE LOS NUMEROS PARES ENTRE 1 Y 20</p>
    <ul>
      <?php
        $i = 1;
        $suma = 0;
        while ($i <= 20){
          if($i %2 == 0){
            $suma += $i;
          }
          $i++;
        }
        echo "<p>SOLUCIÓN: LA SUMA ES $suma</p>";
      ?>
    </ul>
     
    
  <h3>EJERCICIO 4:</h3> 
  <p>CALCULAR EL FACTORIAL DE 6 CON WHILE</p>
  <?php
  // 3! = 1x2x3 = 6
  // 4! = 1x2x3x4 = 24

  $factorial = 6;
  $resultado = 1;
  $i = 1;
  while($i <= $factorial){
    $resultado *= $i; # $resultado = $resultado * $i
    $i++;
  }
  echo "<p>SOLUCIÓN: EL FACTORIAL DE $factorial ES $resultado</p>";
  ?>

  <h3>EJERCICIO 5</h3>
  <p>MUESTRA POR PANTALLA LOS 50 PRIMEROS NÚMEROS PRIMOS</p>

  <?php
    /**
     * 4 %2 = 0   4 NO ES PRIMO
     * 4 %3 = 1
     * 
     * 5 % 2 = 1  5 SI ES PRIMO
     * 5 % 3 = 2
     * 5 % 4 = 1
     * 
     * BUCLE DE 2 A N-1
     * 
     * $n = 7
     * DESDE 2 HASTA $n-1
     *  COMPROBAR SI 7 TIENE DIVISORES QUE DEN DE RESTO 0
     *    SI EXISTE ENTONCES DEVOLVER FALSO
     *    ELSE DEVOLVER TRUE
     * FIN
     */

    // BUCLE DESDE 2 HASTA EL INFINITO Y MÁS ALLÁ
    
    $numero = 2;
    $numerosPrimos = 0;

    echo "<ol>";
    while($numerosPrimos < 50){
      $esPrimo = true;
      for($i = 2; $i < $numero; $i++){
        if($numero % $i == 0){
          $esPrimo = false;
          break;
        }
      }
      if($esPrimo){
        $numerosPrimos++;
        echo "<li>$numero</li>";
      } 
      $numero++;
    }
    echo "</ol>";

    // N+N -> 0(N²)   Algoritmos de computación que te dice si renta hacer Nº bucles
    
    // var_dump($esPrimo);
  ?>


</body>
</html>