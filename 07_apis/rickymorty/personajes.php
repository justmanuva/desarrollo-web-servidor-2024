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
        
        $pagina_actual = isset($_GET["page"]) ? $_GET["page"] : "";
        $cantidad = isset($_GET["quantity"]) ? $_GET["quantity"] : "";
        $genero = isset($_GET["gender"]) ? $_GET["gender"] : "";
        $especie = isset($_GET["species"]) ? $_GET["species"] : "";
        
        if (isset($_GET["gender"]) && isset($_GET["species"]) && isset($_GET["quantity"]) && isset($_GET["page"])) { 
            $apiUrl = "https://rickandmortyapi.com/api/character?page=$pagina_actual&species=$especie&gender=$genero";
        }

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $apiUrl);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);

        $datos = json_decode($respuesta, true);
        $personajes = $datos["results"];
        $paginas = $datos["info"]["pages"];
    ?>
    <form action="" method="get" class="col-3">
        <label for="page" class="form-label">Página:</label>
        <select name="page" id="page" class="form-select">
            <?php
                for($j = 0; $j < $paginas; $j++) { ?>
                    <option value="<?php echo $j+1 ?>"><?php echo $j+1 ?></option>
                <?php } ?>
        </select><br>
        
        <label for="quantity" class="form-label">Cantidad de personajes:</label>
        <input type="text" name="quantity" id="quantity" class="form-control"><br>

        <label for="gender" class="form-label">Género:</label>
        <select name="gender" id="gender" class="form-select">
            <option value="">Ambos</option>
            <option value="male">Masculino</option>
            <option value="female">Femenino</option>
        </select><br>

        <label for="species" class="form-label">Especie:</label>
        <select name="species" id="species" class="form-select">
            <option value="">Ambos</option>
            <option value="human">Humano</option>
            <option value="alien">Alien</option>
        </select><br>

        <input type="submit" value="Buscar" class="btn btn-info">
    </form>
    <br><br>
    <table class="table table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Género</th>
                <th scope="col">Especie</th>
                <th scope="col">Origen</th>
                <th scope="col">Imagen</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if ($cantidad > count($personajes)) $cantidad = count($personajes);
                for($i = 0; $i < $cantidad; $i++) { ?>
                    <tr>
                        <td><?php echo $personajes[$i]["name"]?></td>
                        <td><?php echo $personajes[$i]["species"]?></td>
                        <td><?php echo $personajes[$i]["gender"]?></td>
                        <td><?php echo $personajes[$i]["origin"]["name"]?></td>
                        <td>
                            <img width="100px" src="<?php echo $personajes[$i]["image"]?>">
                        </td>
                    </tr>
                <?php } ?>
        </tbody>
    </table>
</body>
</html>
