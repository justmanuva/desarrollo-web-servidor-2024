<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bucles</title>
  <<?php
      error_reporting( E_ALL );
      ini_set( "display_errors", 1 );
  ?>

</head>
<body>
  <h1>Lista con WHILE</h1>
  <?php
    $i = 1;
    
    echo "<ul>";
    while($i <= 10) {
      echo "<li>$i</li>";
      $i++;
    }
    echo "</ul>";
  ?>
  <h1>Lista con WHILE alternativa</h1>
  <?php
    $i = 1;


    echo "<ul>";

    while($i <= 10):
      echo "<li>$i</li>";
      $i++;
    endwhile;
    echo "</ul>";
  ?>


  <h1>Lista con FOR</h1>
  <?php
    echo"<ul>";
    for($i = 1; $i <= 10; $i++){
      echo "<li>$i</li>";
    }
    echo"</ul>";
  ?>
  
  <h1>Lista con FOR alternativa</h1>
  <?php
    echo"<ul>";
    for($i = 1; $i <= 10; $i++):
      echo "<li>$i</li>";
    endfor;
    echo"</ul>";
  ?>
  
  <h1>Lista con FOR con BREAK cursed</h1> <!--SOLO EN CASOS ESPECÍFICOS, NO SE RECOMIENDA NADA-->
  <?php
    #CÓDIGO OFUSCADO 
   
   /* echo "<ul>";
    for($i = 1; ; $i++){
      if ($i > 10){
        break;
      }
      echo "<li>$li</li>";
    }
    echo "</ul>"; */
    
    /* echo "<ul>";
    for($i = 1; ;){
      if ($i > 10){
        break;
      }
      echo "<li>$li</li>";
    }
    echo "</ul>"; */
  ?>


</body>
</html>