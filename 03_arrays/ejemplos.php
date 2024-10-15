<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplos</title>
    <link href="estilos.css" rel="stylesheet" type="text/css">
    <?php
      error_reporting( E_ALL );
      ini_set( "display_errors", 1 );
    ?>
  </head>
  <body>
    <?php
      /**
       * TODOS LOS ARRAYS EN PHP SON ASOCIATIVOS, COMO LOS MAP DE JAVA
       * 
       * TIENEN PARES CLAVE-VALOR
       */

      $numeros = [5,10,9,6,7,4];
      $numeros = array(6,10,9,4,3);
      print_r($numeros);

      echo "<br><br>";

      /*$animales = ["Perro", "Gato", "Ornitorrinco", "Suricato", "Capibara"]; */
      
      /* $animales = [
        "A01" => "Perro",
        "A02" => "Gato",
        "A03" => "Ornitorrinco",
        "A04" => "Suricato",
        "A05" => "Capibara"
      ]; */

      $animales = array(
        "Perro",
        "Gato",
        "Ornitorrinco",
        "Suricato",
        "Capibara",
      );

      /* print_r($animales); */
      
      echo "<p>" . $animales[3] ."</p>";

      $animales[2] = "Koala"; //Añade normal
      $animales[6] = "Iguana";
      $animales["A01"] = "Elefante";
      array_push($animales, "Morsa", "Foca"); //Añade huecos (A veces sin clave)
      $animales[] = "Ganso";
      unset($animales[1]); //Elimina la posicion y se ajustan los demás con la pos borrada
      
      $animales = array_values($animales); //Te indexa el array

      echo "<h3>Lista de animales con FOR</h3>";
      echo "<ol>";
      for($i = 0; $i < count($animales); $i++){
        echo "<li>$animales[$i]</li>";
      }
      echo "</ol>";

      echo "<h3>Lista de animales con WHILE</h3>";
      echo"<ol>";
      $i = 0;
      while($i < count($animales)){
        echo "<li>$animales[$i]</li>";
        $i++;
      }
      echo "</ol>";

      $cantidad_animales = count($animales); //Te cuenta los elementos del array

      echo "<h3>Hay $cantidad_animales animales</h3>";

      // print_r($animales);

      /**
       *  "4312 TDZ" => "Audi TT"
       *  "1122 FFF" => "Mercedes CLR"
       *  
       *  CREAR EL ARRAY CON 3 COCHES
       * 
       *  AÑADIR 2 COCHES CON SUS MATRÍCULAS
       *  
       *  AÑADIR 1 COCHE SIN MATRÍCULA
       * 
       *  BORRAR EL COCHE SIN MATRÍCULA
       * 
       *  RESETEAR LAS CLAVES Y ALMACENAR EL RESULTADO EN OTRO ARRAY
       */

      $coches = array(
        "1234 GHJ" => "Audi TT",
        "4321 SDD" => "Citroen Picasso",
        "5678 BCD" => "Seat Leon",
      );

      $coches["1122 FFF"] = "Ford Fiesta";
      $coches["2211 GGG"] = "Dacia Sandero";

      // array_push($coches, "Range Rover");

      // unset($coches[0]);

      $coches_indexados = array_values($coches);

      // print_r($coches);
      // echo "<br><br>";
      // print_r($coches_indexados);

      echo "<h3>Lista de coches con FOREACH</h3>";
      echo "<ol>";
      foreach($coches as $coche){
        echo "<li>$coche</li>";
      }
      echo "</ol>";

      echo "<h3>Lista de coches con FOREACH con CLAVE</h3>";
      echo "<ol>";
      foreach($coches as $matricula => $coche){
        echo "<li>$matricula, $coche</li>";
      }
      echo "</ol>";
    ?>

    <table>
      <caption>Coches</caption>
      <thead>
        <tr>
          <th>Matrícula</th>
          <th>Coche</th>
        </tr>
      </thead>
      <tbody>
            <?php
              foreach($coches as $matricula => $coche){
                echo "<tr>";
                echo "<td>$matricula</td>";
                echo "<td>$coche</td>";
                echo "</tr>";
              }
            ?>
      </tbody>
    </table>

    <br>

    <!-- Forma enrevesada, mejor para base de datos -->
    <table>
      <caption>Coches</caption>
      <thead>
        <tr>
          <th>Matrícula</th>
          <th>Coche</th>
        </tr>
      </thead>
      <tbody>
            <?php foreach($coches as $matricula => $coche){?>
                <tr>
                  <td><?php echo $matricula?></td>
                  <td><?php echo $coche?></td>
                </tr>
              <?php } ?>
      </tbody>
    </table>

  </body>
</html>