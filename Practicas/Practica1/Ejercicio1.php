<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
    <?php
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
    ?>
</head>
<body>
    <?php
        $animes = [
            ["Steins gate", "Ciencia ficción"],
            ["Vinland saga", "Acción"],
            ["Blue lock", "Deportes"]
        ];

        array_push($animes, ["Hajime no Ippo", "Deportes"]);
        array_push($animes, ["Monster", "Misterio"]);

        unset($animes[0]);
        $animes = array_values($animes);

        for ($i = 0; $i < count($animes); $i++) {
            $animes[$i][2] = rand(1990, 2030);
            $animes[$i][3] = rand(1, 99);
            
            if ($animes[$i][2] <= 2024) $animes[$i][4] = "Ya disponible";
            else $animes[$i][4] = "Próximamente";
        }

        $_titulo = array_column($animes, 0);
        $_genero = array_column($animes, 1);
        $_anio = array_column($animes, 2);

        array_multisort($_genero, SORT_ASC, $_anio, SORT_ASC, $_titulo, SORT_ASC, $animes);
    ?>

    <table>
        <caption>Animes</caption>
        <thead>
            <tr>
                <td>Título</td>
                <td>Género</td>
                <td>Año</td>
                <td>Episodios</td>
                <td>Disponibilidad</td>
            </tr>
        </thead>
        <tbody>
        <?php
          foreach($animes as $anime){
            list($titulo, $genero, $anio, $episodios, $disponibilidad) = $anime; ?>
            <tr>
                <td><?php echo $titulo ?></td>
                <td><?php echo $genero ?></td>
                <td><?php echo $anio ?></td> 
                <td><?php echo $episodios ?></td>
                <td><?php echo $disponibilidad ?></td>
            </tr>
        <?php }  ?>
        </tbody>
    </table>
</body>
</html>