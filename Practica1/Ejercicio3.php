<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
    <?php
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
    ?>
</head>
<body>
    <form action="" method="post">
        <label for="numero">Introduce un número:</label>
        <input type="text" name="numero" id="numero"><br><br>

        <select name="opcion" id="opciones">
            <option value="sumatorio">Sumatorio</option>
            <option value="factorial">Factorial</option>
        </select><br><br>
        <input type="submit" value="Calcular">
    </form>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $numero = $_POST["numero"];
            $opcion = $_POST["opcion"];

            $resultado = 0;
            if ($opcion == "sumatorio") {
                for ($i = 1; $i <= $numero; $i++) {
                    $resultado += $i;
                }
            }
            else {
                $resultado = 1;
                if ($numero == 0) $resultado = 1;
                else{
                    for ($i = 1; $i <= $numero; $i++) {
                        $resultado *= $i;
                    }
                }
                
            }
    ?>
    <h3>
    <?php 
        if ($opcion == "sumatorio") echo "Sumatorio: $resultado";
        else echo "Factorial: $resultado";
    ?>
    </h3>
    <?php } ?>
    
</body>
</html>