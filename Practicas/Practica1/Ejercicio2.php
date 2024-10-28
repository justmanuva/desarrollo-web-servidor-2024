<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
    <?php
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
    ?>
</head>
<body>
    <?php
        $array1 = [];

        $array2 = [];
        $array3 = [];

        for ($i = 0; $i < 5; $i++) {
            array_push($array1, rand(1, 10));
            array_push($array2, rand(10, 100));
        }
        array_push($array3, $array1, $array2);
    ?>

    <?php
        $resultado = "";
        foreach ($array1 as $elemento) {
            $resultado .= "$elemento,";
        }
    ?>
    <p><?php echo $resultado;?></p>
    <?php
        $resultado = "";
        foreach ($array2 as $elemento) {
            $resultado .= "$elemento,";
        }
    ?>
    <p><?php echo $resultado; ?></p>

    <?php
        $media1 = 0;
        $maximo1 = 0;
        $minimo1 = 101;
        $media2 = 0;
        $maximo2 = 0;
        $minimo2 = 101;

        for ($i = 0; $i < count($array1); $i++) {
            $media1 += $array1[$i];
            if ($array1[$i] > $maximo1) $maximo1 = $array1[$i];
            if ($array1[$i] < $minimo1) $minimo1 = $array1[$i];
        }
        $media1 = $media1 / count($array1);

        for ($i = 0; $i < count($array2); $i++) {
            $media2 += $array2[$i];
            if ($array2[$i] > $maximo2) $maximo2 = $array2[$i];
            if ($array2[$i] < $minimo2) $minimo2 = $array2[$i];
        }
        $media2 = $media2 / count($array2);
    ?>
    
    <table>
        <caption>Resultados</caption>
        <thead>
            <tr>
                <th>Maximo</th>
                <th>Minimo</th>
                <th>Media</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $maximo1; ?></td>
                <td><?php echo $minimo1; ?></td>
                <td><?php echo $media1; ?></td>
            </tr>
            <tr>
                <td><?php echo $maximo2; ?></td>
                <td><?php echo $minimo2; ?></td>
                <td><?php echo $media2; ?></td>
            </tr>
        </tbody>
    </table>
</body>
</html>