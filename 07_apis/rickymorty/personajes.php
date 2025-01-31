<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personajes de Ricky y Morty</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
    ?>
</head>
<body>
    <?php
        $apiUrl = "https://rickandmortyapi.com/api/character";
        /* $page = isset($_GET["page"]) ? $_GET["page"] : 1; */
        
        /* $numero = isset($_GET["nCharacters"]) ? $_GET["nCharacters"] : ""; */
        $genero = isset($_GET["gender"]) ? $_GET["gender"] : "";
        $especie = isset($_GET["species"]) ? $_GET["species"] : "";
        
        
        if (isset($_GET["gender"]) && isset($_GET["species"])) { 
            $apiUrl = "https://api.jikan.moe/v4/top/anime?species=$especie&gender=$genero";
        } else if (isset($_GET["gender"])) {
            $apiUrl = "https://api.jikan.moe/v4/top/anime?gender=$genero";
        } else if (isset($_GET["species"])) {
            $apiUrl = "https://api.jikan.moe/v4/top/anime?species=$especie";
        }

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $apiUrl);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);

        $datos = json_decode($respuesta, true);
        $personajes = $datos["results"];
        /* $pagination = $datos["pagination"]; */
    ?>
    <form action="" method="get">
        <!-- <input type="text" name="nCharacters" id="nCharacters"> -->
        <select name="gender" id="gender">
            <option value="male">Masculino</option>
            <option value="female">Femenino</option>
        </select>
        <select name="species" id="species">
            <option value="human">Humano</option>
            <option value="alien">Alien</option>
        </select>
        <input type="submit" value="Mostrar">
    </form>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Género</th>
                <th>Especie</th>
                <th>Origen</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($personajes as $personaje) { ?>
                    <tr>
                        <td><?php echo $personaje["name"]?></td>
                        <td><?php echo $personaje["species"]?></td>
                        <td><?php echo $personaje["gender"]?></td>
                        <td><?php echo $personaje["origin"]["name"]?></td>
                    </tr>
                <?php } ?>
        </tbody>
    </table>
</body>
</html>
