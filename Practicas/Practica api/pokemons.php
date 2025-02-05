<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokemons</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->
    <?php
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
    ?>
</head>
<body>
    <?php
        $apiUrl = "https://pokeapi.co/api/v2/pokemon/?offset=0&limit=5";
        
        $offset = 0;
        if (isset($_GET["offset"])) {
            $offset = $_GET["offset"];
        }

        $limit = 5;
        if (isset($_GET["limit"])) {
            $limit = $_GET["limit"];
        }

        if (isset($_GET["offset"]) && isset($_GET["limit"])) {
            $apiUrl = "https://pokeapi.co/api/v2/pokemon/?offset=$offset&limit=$limit";
        } else if (isset($_GET["offset"])) {
            $apiUrl = "https://pokeapi.co/api/v2/pokemon/?offset=$offset&limit=5";
        } else if (isset($_GET["limit"])) {
            $apiUrl = "https://pokeapi.co/api/v2/pokemon/?offset=5&limit=$limit";
        }


        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $apiUrl);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);

        $datos = json_decode($respuesta, true);
        $pokemons = $datos["results"];
    ?>

    <form method="get">
        <label for="limit">¿Cuántos pokémons quieres mostrar?</label>
        <input type="number" name="limit" id="limit">
        <input type="submit" value="Mostrar">
    </form>
    <br>
    <table>
        <thead>
            <tr>
                <th>Pokémon</th>
                <th>Imagen</th>
                <th>Tipos</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $limite = $offset + 5;
                $posicionPokemon = 0;
                for($i = $offset; $i < $limite; $i++) {
                    $mostrarTipo = "";
                    $numero = $i+1;
                    $apiUrlPokemon = "https://pokeapi.co/api/v2/pokemon/$numero/";
        
                    $curlPokemon = curl_init();
                    curl_setopt($curlPokemon, CURLOPT_URL, $apiUrlPokemon);
                    curl_setopt($curlPokemon, CURLOPT_RETURNTRANSFER, true);
                    $respuestaPokemon = curl_exec($curlPokemon);
                    curl_close($curlPokemon);
            
                    $datosPokemon = json_decode($respuestaPokemon, true);
                    $sprite = $datosPokemon["sprites"]["front_default"];
                    $types = $datosPokemon["types"];
                    
                    foreach ($types as $type) {
                        $mostrarTipo .= $type["type"]["name"] . " ";
                    } ?>
                    <tr>
                        <td><?php echo ucwords($pokemons[$posicionPokemon]["name"])?></td>
                        <td>
                            <img src="<?php echo $sprite ?>">
                        </td>
                        <td><?php echo ucwords($mostrarTipo) ?></td>
                    </tr>
                    <?php
                    $posicionPokemon++;
                } ?>
        </tbody>
    </table>
    <?php
        if ($offset > 0) { ?>
            <a href="?offset=<?php echo $offset-5 ?>&limit=<?php echo $limit ?>">Anterior</a>
        <?php }
        if ($offset < 1300) { ?>
            <a href="?offset=<?php echo $offset+5 ?>&limit=<?php echo $limit ?>">Siguiente</a>
        <?php } ?>
</body>
</html>