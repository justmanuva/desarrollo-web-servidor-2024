<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios</title>
    <link href="./estilos.css" rel="stylesheet" type="text/css">
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
        </tr>
      </thead>
      <tbody>
            <?php
              foreach($notas as $alumno => $nota){
                echo "<tr>";
                echo "<td>$alumno</td>";
                echo "<td>$nota</td>";
                if ($nota < 5) echo '<td class="suspenso">SUSPENSO</td>';
                else {
                  if ($nota == 5) echo '<td class="aprobado">SUFICIENTE</td>';
                  if ($nota == 6) echo '<td class="aprobado">BIEN</td>';
                  if ($nota > 6 && $nota <9) echo '<td class="aprobado">NOTABLE</td>';
                  if ($nota > 8) echo '<td class="aprobado">SOBRESALIENTE</td>';
                }
                echo "</tr>";
              }
            ?>
      </tbody>
    </table>

    <table>
      <caption>Notas</caption>
      <thead>
        <tr>
          <th>Alumnos</th>
          <th>Notas</th>
        </tr>
      </thead>
      <tbody>
            <?php
              foreach($notas as $alumno => $nota){
                echo "<tr>";
                echo "<td>$alumno</td>";
                echo "<td>$nota</td>";
                if ($nota < 5) echo '<td class="suspenso">SUSPENSO</td>';
                else {
                  if ($nota == 5) echo '<td class="aprobado">SUFICIENTE</td>';
                  if ($nota == 6) echo '<td class="aprobado">BIEN</td>';
                  if ($nota > 6 && $nota <9) echo '<td class="aprobado">NOTABLE</td>';
                  if ($nota > 8) echo '<td class="aprobado">SOBRESALIENTE</td>';
                }
                echo "</tr>";
              }
            ?>
      </tbody>
    </table>

    <!-- APLICAR COLOR A TODA lA FILA -->


  </body>
</html>