<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tabla multiplicar</title>
  <link rel="stylesheet" type="text/css" href="./estilos.css">
  <?php
      error_reporting( E_ALL );
      ini_set( "display_errors", 1 );
  ?>
</head>
<body>
  
  <!-- 
    CREAR UN FORMULARIO QUE RECIBA UN NÚMERO

    SE MOSTRARÁ LA TABLA DE MULTIPLICAR DE ESE NÚMERO EN UNA TABLA HTML

    2 x 1 = 2
    2 x 2 = 4
    ...
  -->

  <form action="" method="post">
    <label for="numero">Numero</label>
    <input type="text" name="numero" id="numero" placeholder="introduzca un numero"><br><br>
    <input type="submit" value="Mostrar tabla"><br><br>
  </form>

  <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
      $numero = $_POST["numero"];
  ?>
  <table>
      <thead>
        <tr>
          <th>Multiplicación</th>
          <th>Resultado</th>
        </tr>
      </thead>
      <tbody>
        <?php
            for($i = 0; $i < 10; $i++) {
              ?>
              <tr>
                  <td><?php echo "$numero x ".($i+1)?></td>
                  <td><?php echo ($numero * ($i+1)) ?></td> 
              </tr>
          <?php } ?>
      </tbody>
    </table>
    <?php } ?>
</body>
</html>