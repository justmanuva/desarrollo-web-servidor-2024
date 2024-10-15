<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Fechas</title>
        <<?php
            error_reporting( E_ALL );
            ini_set( "display_errors", 1 );
        ?>
    </head>
    <body>
        <?php
        $numero = "2";
        $numero = (int) $numero;

        if($numero === 2){
            echo "EXITO";
        } else {
            echo "NO EXITO";
        }

        /*
            "2" == 2    "2" es igual a 2
            "2" !== 2   "2" no es idéntico a 2
            2 === 2     2 sí es idéntico a 2
            2 !== 2.0   2 no es idéntico a 2.0
        */

        $hora = (int)date("G");
        var_dump($hora);
        
        /*
            SI $hora ENTRE 6 y 11, es MAÑANA
            SI $hora ENTRE 12 y 14, es MEDIODÍA
            SI $hora ENTRE 15 y 20, es TARDE
            SI $hora ENTRE 20 y 0, es NOCHE
            SI $hora ENTRE 1 y 5, es MADRUGADA
        */

        if ($hora >= 6 and $hora <= 11) echo "es MAÑANA";
        elseif ($hora >= 12 and $hora <= 14) echo "es MEDIODÍA";
        elseif ($hora >= 15 and $hora <= 20) echo "es TARDE";
        elseif ($hora >= 20 and $hora <= 0) echo "es NOCHE";
        elseif ($hora >= 1 and $hora <= 5) echo "es MADRUGADA";

        $hora_exacta = date("H:i:s");

        echo "<h1>$hora_exacta</h1>";

        $dia = date("l");
        echo "<h2>Hoy es $dia</h2>";

        /*
            TENEMOS CLASE LUNES, MIÉRCOLES Y VIERNES
            NO TENEMOS CLASE EL RESTO

            HACER UN SWITCH QUE DIGA SI HOY TENEMOS CLASE
        */

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

        /**
         * CON UNA ESTRUCTURA SWITCH CAMBIAR LA VARIABLE DIA A ESPAÑOL
         * 
         * REESCRIBIR EL SWITCH DE LOS DIAS DE CLASE CON LA VARIABLE EN ESPAÑOL
         */

        //Estructura match
        $dia_espanhol = match ($dia){
            "Monday" => "Lunes",
            "Tuesday" => "Martes",
            "Wednesday" => "Miércoles",
            "Thursday" => "Jueves",
            "Friday" => "Viernes",
            "Saturday" => "Sábado",
            "Sunday" => "Domingo"
        };

        ?>
    </body>
</html>