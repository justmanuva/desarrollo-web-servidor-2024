<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Números</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
    ?>
</head>
<body>
    <?php
    $numero = 0;    
    /*
    //Forma 1
    if($numero > 0){
        echo "<p>1 El número $numero es mayor que cero</p>";
    } elseif ($numero == 0){
        echo "<p>1 El número $numero es cero</p>";
    } else {
        echo "<p>1 El número $numero es menor que cero</p>";
    }

    //Forma 2
    if($numero > 0) echo "<p>2 El número $numero es mayor que cero</p>";
    elseif ($numero == 0) echo "<p>2 El número $numero es cero</p>";
    else echo "<p>2 El número $numero es menor que cero";

    //Forma 3
    if($numero > 0):
        echo "<p>3 El número $numero es mayor que cero</p>";
    elseif($numero == 0):
        echo "<p>3 El número $numero es cero";
    else:
        echo "<p>3 El número $numero es menor que cero";
    endif;
    */
    ?>

    <?php
    # Rangos [-10,0),[0,10],(10,20]

    $num = -7;

    # and o && para la conjunción

    if($num >= -10 and $num <= 10) echo "<p>El número $num está en el rango [-10,0)";
    if ($num >= -10 && $num < 0) echo "<p>1 El número $num está en el rango [";
    
    /*
        COMPROBAR DE TRES FORMAS DIFERENTES, CON LA ESTRUCTURA IF, SI EL NÚMERO ALEATORIO
        TIENE 1, 2 O R DÍGITOS
    */
    
    
    $numero_aleatorio = rand(1,200);
    $digitos = null;

    

    //Forma 1
    if ($numero_aleatorio < 10) echo "<p>$numero_aleatorio tiene 1 digito</p>";
    elseif ($numero_aleatorio > 9 and $numero_aleatorio <100) echo "<p>$numero_aleatorio tiene 2 digitos</p>";
    else echo "<p>$numero_aleatorio tiene 3 digitos</p>";

    //Forma 2
    if ($numero_aleatorio < 10):
        echo "<p>$numero_aleatorio tiene 1 digito</p>";
    elseif ($numero_aleatorio > 9 and $numero_aleatorio <100):
        echo "<p>$numero_aleatorio tiene 2 digitos</p>";
    else:
        echo "<p>$numero_aleatorio tiene 3 digitos</p>";
    endif;

    //Forma 3 (Corregida)
    if ($numero_aleatorio >= 1 and $numero_aleatorio < 10){
        $digitos = 1;
    } elseif ($numero_aleatorio > 9 and $numero_aleatorio <100){
        $digitos = 2;
    } elseif ($numero_aleatorio >= 100 and $numero_aleatorio <= 200) {
        $digitos = 3;
    } else {
        $digitos = "ERROR";
    }

    $digitos_texto = "dígitos";
    if($digitos == 1) $digitos_texto = "dígito";
    echo "<p>El número $numero_aleatorio tiene $digitos dígitos</p>";

    //VERSIÓN CON MATCH
    $resultado = match(true) {
        $numero_aleatorio >= 1 && $numero_aleatorio <= 0 => 1,
        $numero_aleatorio >= 10 && $numero_aleatorio <= 99 => 2,
        $numero_aleatorio >= 100 && $numero_aleatorio <= 999 => 3,
        default => "ERROR"
    };

    echo "<h1>El número tiene $digitos dígitos </h1>";

    $precioConIVA = match($iva){
        "GENERAL" => $precio + $precio * (GENERAL/100),
        "REDUCIDO" => $precio + $precio * (REDUCIDO/100),
        "SUPERREDUCIDO" => $precio + $precio * (SUPERREDUCIDO/100),
        "SIN IVA" => $precio
    };
    
    
    
    // $numero_aleatorio_decimales = rand(10,100)/10;
    
    $n = rand(1,3);

    switch($n) {
        case 1:
            echo "El número es 1";
            break;
        case 2:
            echo "El número es 2";
            break;
        default:
            echo "El número es 3";
            break;
    }

    $resultado = match($n){
        1 => "El número es 1",
        2 => "El número es 2",
        3 => "El número es 3"
    };

    echo "<h3>$resultado</h3>";

    ?>

</body>
</html>