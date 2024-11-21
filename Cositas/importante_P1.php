<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Importante_P1</title>
  <?php
    //NOTIFICAR ERRORES
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
  ?>
</head>
<body>
  <?php
    //Declarar constantes
    define("GENERAL", 1.21);
    //EJEMPLO SWITCH
    switch($dia){
      case "Monday":
        echo "<p>Hoy tenemos clase</p>";
        break;
      case "Wednesday":
        echo "<p>Hoy tenemos clase</p>";
        break;
      case "Friday":
        echo "<p>Hoy tenemos clase</p>";
        break;
      default:
        echo "<p>Hoy NO tenemos clase</p>";
    }

    //EJEMPLO MATCH FÁCIL
    $dia_espanhol = match ($dia){
      "Monday" => "Lunes",
      "Tuesday" => "Martes",
      "Wednesday" => "Miércoles",
      "Thursday" => "Jueves",
      "Friday" => "Viernes",
      "Saturday" => "Sábado",
      "Sunday" => "Domingo"
    };
    //EJEMPLOS MATCH NO FÁCILES
    $resultado = match(true) {
      $numero_aleatorio >= 1 && $numero_aleatorio <= 0 => 1,
      $numero_aleatorio >= 10 && $numero_aleatorio <= 99 => 2,
      $numero_aleatorio >= 100 && $numero_aleatorio <= 999 => 3,
      default => "ERROR"
    };
    $resultado = match(true) {
      $edad < 18 => "es menor de edad",
      $edad >= 18 and $edad < 65 => "es mayor de edad",
      $edad >= 65 => "se ha jubilado"
    };
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

    //EJEMPLOS ARRAY/MATRICES
    $videojuegos = [
      ["Disco Elysium", "RPG", 24.99],
      ["Dragon Ball Z Kakarot", "Acción", 59.99],
      ["Persona 3", "RPG", 24.99],
      ["Commando 2", "Estrategia", 4.99],
      ["Hollow Knight", "Metroidvania", 9.99],
      ["Stardew Valley", "Gestión de recursos", 7.99]
    ];
    array_push($videojuegos, ["Ender Lilies", "Metroidvania", 9.95]);

    //¡Puede caer en el examen!
    for($i = 0; $i < count($videojuegos); $i++) {
      if ($videojuegos[$i][2] == 0) $videojuegos[$i][3] = "GRATIS";
      else $videojuegos[$i][3] = "PAGO";
    }

    //Los que sean de la misma categorian se ordenan por precio  
    $_titulo = array_column($videojuegos, 0);
    $_categoria = array_column($videojuegos, 1);
    $_precio = array_column($videojuegos, 2);
    array_multisort($_categoria, SORT_ASC,
                    $_precio, SORT_DESC,
                    $_titulo, SORT_DESC,
                    $videojuegos);

  ?>
    <!-- INSERTANDO ARRAY CLAVE VALOR EN TABLA SIMPLE -->
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
    
    <!-- INSERTANDO MATRIZ EN TABLA CHUNGA -->
    <table>
      <thead>
        <tr>
          <th>Videojuego</th>
          <th>Categoría</th>
          <th>Precio</th>
          <th>Tipo</th>
        </tr>
      </thead>
      <tbody>
        <?php
          foreach($videojuegos as $videojuego){
            //echo $videojuego[0]; para mostrar alguna columna
            
            list($titulo, $categoria, $precio, $tipo) = $videojuego; ?>
            <tr>
                <td><?php echo $titulo ?></td>
                <td><?php echo $categoria ?></td>
                <td><?php echo $precio ?></td> 
                <td><?php echo $tipo ?></td>
            </tr>
        <?php }  ?>
      </tbody>
    </table>

    <!-- TABLA MÁS COMPLICADA QUE HICIMOS (TOCANDO CSS) -->
    <table>
      <caption>Notas</caption>
      <thead>
        <tr>
          <th>Alumnos</th>
          <th>Notas</th>
          <th>Estado</th>
        </tr>
      </thead>
      <tbody>
            <?php
              foreach($notas as $alumno => $nota){ ?>
                <tr class="<?php if($nota < 5) echo "suspenso"; else echo "aprobado";?>">
                  <td><?php echo $alumno?></td>
                  <td><?php echo $nota?></td>
                  <td>
                    <?php
                      if($nota < 5) echo "SUSPENSO";
                      else {
                        if ($nota == 5) echo 'SUFICIENTE';
                        if ($nota == 6) echo 'BIEN';
                        if ($nota > 6 && $nota <9) echo 'NOTABLE';
                        if ($nota > 8) echo 'SOBRESALIENTE';
                      }
                    ?>
                  </td>
                </tr>
              <?php }?>
      </tbody>
    </table>

    <?php
      //Elimina la posicion y se ajustan los demás con la pos borrada
      unset($animales[1]); 
      //Te indexa array
      $animales = array_values($animales);


      //ARRAY CON CLAVE VALOR (TODOS LO TIENEN)
      $coches = array(
        "1234 GHJ" => "Audi TT",
        "4321 SDD" => "Citroen Picasso",
        "5678 BCD" => "Seat Leon",
      );
      $coches["1122 FFF"] = "Ford Fiesta";
      
      //LISTA FOR
      echo "<ol>";
      for($i = 0; $i < count($animales); $i++){
        echo "<li>$animales[$i]</li>";
      }
      echo "</ol>";

      //LISTA CON FOREACH
      echo "<ol>";
      foreach($coches as $coche){
        echo "<li>$coche</li>";
      }
      echo "</ol>";

      //LISTA CON FOREACH CON CLAVE
      echo "<ol>";
      foreach($coches as $matricula => $coche){
        echo "<li>$matricula, $coche</li>";
      }
      echo "</ol>";
      
      sort($asignaturas); //Ordena con números las claves
      rsort($asignaturas); //Reverse sort
      asort($asignaturas); //Lo ordena por los valores pero mostrando las verdaderas claves
      arsort($asignaturas); //Reverse asort
      ksort($asignaturas); //Lo ordena por las keys
      krsort($asignaturas); //Reverse ksort

      //Inserta números random entre 0 y 10
      $notas["Paula"] = rand(0,10);
    ?>
  
    <!-- EJEMPLOS DE FORMULARIOS CON PHP -->
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