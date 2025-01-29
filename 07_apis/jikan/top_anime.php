<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Anime</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
    ?>
</head>
<body>
    <!-- 
        Radiobutton con tres opciones:
        - Serie
        - Película
        - Todos 

        Por defecto salen todos. Si type=(cadena vacia), salen todos

        Hacerlo TODO con método GET

        $tipo = $_GET["tipo"];
        https://api.jikan.moe/v4/top/anime?type=$tipo

        ----------------------------------------------

        - Abajo de la página dos botones o enlaces "Anterior" y "Siguiente".

        - Si se hace con enlaces (a href), añadimos detrás de la URL ?page=$loquesea
        - Al principio del código preguntamos cuál es la página que nos da la URL, y la añadimos a la URL de la API

        $page = $_GET["page"];
        https://api.jikan.moe/v4/top/anime=page=$page
    -->
    
    
    <?php
        $apiUrl = "https://api.jikan.moe/v4/top/anime";
        $page = isset($_GET["page"]) ? $_GET["page"] : 1;
        $tipo = isset($_GET["type"]) ? $_GET["type"] : "";
        
        
        if (isset($_GET["page"]) && isset($_GET["type"])) { 
            $apiUrl = "https://api.jikan.moe/v4/top/anime?page=$page&type=$tipo";
        } else if (isset($_GET["page"])) {
            $apiUrl = "https://api.jikan.moe/v4/top/anime?page=$page";
        } else if (isset($_GET["type"])) {
            $apiUrl = "https://api.jikan.moe/v4/top/anime?type=$tipo";
        }

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $apiUrl);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);

        $datos = json_decode($respuesta, true);
        $animes = $datos["data"];
        $pagination = $datos["pagination"];
    ?>

    <h2>Filtrar por:</h2>
    <form action="" method="get">
        <input class="form-check-input" type="radio" name="type" id="tv" value="tv">
        <label class="form-check-label" for="tv">Serie</label><br>
        <input class="form-check-input" type="radio" name="type" id="movie" value="movie">
        <label class="form-check-label" for="movie">Película</label><br>
        <input class="form-check-input" type="radio" name="type" id="" value="">
        <label class="form-check-label" for="all">Todos</label><br><br>
        <input class="btn btn-info" type="submit" value="Aplicar">
    </form>
    <br>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Posición</th>
                <th scope="col">Título</th>
                <th scope="col">Nota</th>
                <th scope="col">Imagen</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($animes as $anime) { ?>
                    <tr>
                        <td scope="row"><?php echo $anime["rank"]?></td>
                        <td>
                            <a href="anime.php?id=<?php echo $anime["mal_id"]?>">
                                <?php echo $anime["title"]?>
                            </a>
                        </td scope="row">
                        <td scope="row"><?php echo $anime["score"]?></td>
                        <td scope="row">
                            <img width="100px" src="<?php echo $anime["images"]["jpg"]["image_url"]?>">
                        </td>
                    </tr>
                <?php } ?>
        </tbody>
    </table>
    <?php
        if ($pagination["current_page"] > 1) { ?>
            <a href="?page=<?php echo $page-1 ?>&type=<?php echo $tipo ?>">Anterior</a>
        <?php }
        if ($pagination["has_next_page"]) { ?>
            <a href="?page=<?php echo $page+1 ?>&type=<?php echo $tipo ?>">Siguiente</a>
        <?php } ?>
</body>
</html>