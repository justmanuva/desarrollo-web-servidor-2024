<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios</title>
    <link href="./estilos.css" rel="stylesheet" type="text/css">
    <?php
      error_reporting( E_ALL );
      ini_set( "display_errors", 1 );
    ?>
  </head>
  <body>
    <!-- RECORDATORIO!!! EL VIERNES VEMOS CÓMO ORDENAR TABLAS -->  

    <!--  EJERCICIO 1

          Desarrollo web en entorno servidor => Alejandra
          Desarrollo web en entorno cliente => José Miguel
          Diseño de interfaces web => José Miguel
          Despliegue de aplicaciones web => Jaime
          Empresa e iniciativa emprendedora => Andrea
          Inglés => Virginia

          MOSTRARLO TODO EN UNA TABLA
    -->

    <?php
      $asignaturas = array(
        "Desarrollo de web en entorno servidor" => "Alejandra",
        "Desarrollo de web en entorno cliente" => "José Miguel",
        "Diseño de interfaces web" => "José Miguel",
        "Despligue de aplicaciones web" => "Jaime",
        "Empresa e iniciativa emprendedora" => "Andrea",
        "Inglés" => "Virginia",
      );
    ?>

    <table>
      <caption>Asignación de profesorado</caption>
      <thead>
        <tr>
          <th>Asignatura</th>
          <th>Profesor</th>
        </tr>
      </thead>
      <tbody>
            <?php
              // sort($asignaturas); Ordena con números las claves
              // rsort($asignaturas); Reverse sort
              // asort($asignaturas); Lo ordena por los valores pero mostrando las verdaderas claves
              // arsort($asignaturas); Reverse asort
              // ksort($asignaturas); Lo ordena por las keys
              // krsort($asignaturas); Reverse ksort
              foreach($asignaturas as $asignatura => $profesor){
                echo "<tr>";
                echo "<td>$asignatura</td>";
                echo "<td>$profesor</td>";
                echo "</tr>";
              }
            ?>
      </tbody>
    </table>

    <!--  EJERCICIO 2

          Francisco => 3
          Daniel => 5
          Aurora => 10
          Luis => 7
          Samuel => 9

          MOSTRAR EN UNA TABLA CON 3 COLUMNAS
          - COLUMNA 1: ALUMNO
          - COLUMNA 2: NOTA
          - COLUMNA 3: SI NOTA < 5, SUSPENSO, ELSE, APROBADO
    -->

    <br>

    <?php
      $notas = array(
        "Francisco" => 3,
        "Daniel" => 5,
        "Aurora" => 10,
        "Luis" => 7,
        "Samuel" => 9,
      )
    ?>

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
              foreach($notas as $alumno => $nota){
                if ($nota < 5) echo '<tr class="suspenso">';
                else echo '<tr class="aprobado">';

                echo "<td>$alumno</td>";
                echo "<td>$nota</td>";

                if ($nota < 5){
                  echo '<td>SUSPENSO</td>';
                } 
                else {
                  if ($nota == 5) echo '<td>SUFICIENTE</td>';
                  if ($nota == 6) echo '<td>BIEN</td>';
                  if ($nota > 6 && $nota <9) echo '<td>NOTABLE</td>';
                  if ($nota > 8) echo '<td>SOBRESALIENTE</td>';
                }
                echo "</tr>";
              }
            ?>
      </tbody>
    </table>
    
    <br>

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

    <br>

    <?php
      /**
       * Insertar dos nuevos estudiantes, con notas aleatorias entre 0 y 10
       * 
       * Borrar un estudiante (el que peor os caiga) por la clave
       * 
       * Mostrar en una nueva tabla todo ordenado por los nombres en orden alfabéticamente
       * inverso
       * 
       * Mostrar en una nueva tabla todo ordenado por la nota de 10 a 0 (orden inverso)
       * 
       */

      $notas["Paula"] = rand(0,10);
      $notas["Waluis"] = rand(0,10);

      unset($notas["Samuel"]);

      krsort($notas);
    ?>

    <table>
      <caption>Estudiantes ordenados de menor a mayor nota</caption>
      <thead>
        <tr>
          <th>Estudiante</th>
          <th>Nota</th>
          <th>Resultado</th>
        </tr>
      </thead>
      <tbody>
            <?php
              arsort($notas);
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

  </body>
</html>