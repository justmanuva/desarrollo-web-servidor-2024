<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Varios formularios</title>
    <?php
      error_reporting( E_ALL );
      ini_set( "display_errors", 1 );

      //Para utilizar la función dentro de 05_funciones/...
      require("../05_funciones/temperaturas.php");
      require("../05_funciones/edades.php");
    ?>
</head>
<body>    
    <h1>Formulario temperaturas</h1>

    <form action="" method="post">
        <label for="temperatura">Temperatura:</label>
        <input type="text" name="temperatura" id="temperatura"><br><br>

        <label for="origen">De: </label>
        <select name="inicial" id="inicial">
            <option value="C">Celsius</option>
            <option value="K">Kelvin</option>
            <option value="F">Fahrenheit</option>
        </select>

        <label for="destino">A: </label>
        <select name="final" id="final">
            <option value="C">Celsius</option>
            <option value="K">Kelvin</option>
            <option value="F">Fahrenheit</option>
        </select><br><br>
        <input type="hidden" name="accion" value="formulario_temperaturas">
        <input type="submit" value="Convertir"><br><br>
    </form>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Formulario de temperaturas
            if($_POST["accion"] == "formulario_temperaturas") {
                $temperatura = $_POST["temperatura"];
                $inicial = $_POST["inicial"];
                $final = $_POST["final"];
    
                //Control de errores
                if ($temperatura != "") {
                    if (is_numeric($temperatura)) {
                        if ($inicial == "C" and $temperatura >= -273.15) {
                            echo convertirTemperatura($temperatura, $inicial, $final);
                        } elseif ($inicial == "C" and $temperatura < -273.15) {
                            echo "<p>La temperatura no puede ser inferior a -273.15 C</p>";
                        }
                        if ($inicial == "K" and $temperatura >= 0) {
                            echo convertirTemperatura($temperatura, $inicial, $final);
                        } elseif ($inicial == "K" and $temperatura < 0) {
                            echo "<p>La temperatura no puede ser inferior a 0 K</p>";
                        }
                        if ($inicial == "F" and $temperatura >= -459.67) {
                            echo convertirTemperatura($temperatura, $inicial, $final);
                        } elseif ($inicial == "F" and $temperatura < -459.67) {
                            echo "<p>La temperatura no puede ser inferior a -459.67 F</p>";
                        }
                    } else "<p>La temperatura debe ser un número</p>";
                } else echo "<p>Falta la temperatura</p>";
            }
        }
        // En otro fichero nuevo, poner todos los demás formularios
        // y hacerlo con funciones (Por lo menos con 5 formularios)
    ?>
    
    <h1>Formulario de edades</h1>

    <form action="" method="post">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" placeholder="introduzca su nombre"><br><br>
        <label for="edad">Edad</label>
        <input type="text" name="edad" id="edad" placeholder="introduzca su edad"><br><br>
        <input type="hidden" name="accion" value="formulario_edades">
        <input type="submit" value="Enviar">
    </form>

    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            // Formulario de edades
            if($_POST["accion"] == "formulario_edades") {
                $nombre = $_POST["nombre"];
                $edad = $_POST["edad"];

                if($nombre != "" && $edad != "") {
                    comprobarEdad($nombre, $edad);
                } else echo "<p>Faltan datos</p>";
            }
        }
    ?>

    

    

</body>
</html>