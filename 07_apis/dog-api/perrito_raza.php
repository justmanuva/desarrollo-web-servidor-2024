<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perro al azar | Raza</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
    ?>
</head>
<body>
    <?php
        $apiUrl = "https://dog.ceo/api/breeds/list/all";

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $apiUrl);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);

        $datos = json_decode($respuesta, true);
        $razas = $datos["message"];
    ?>
    <div class="container">
        <form nethod="get" class="col-4">
            <label for="breed" class="form-label">Raza:</label>
            <select name="breed" id="breed" class="form-select">
                <?php
                    foreach($razas as $raza => $subRazas) {
                        if (empty($subRazas)) { ?>
                            <option value="<?php echo $raza ?>">
                                <?php echo $raza ?>
                            </option>
                    <?php } else {
                            foreach($subRazas as $subRaza) {
                                $mostrar_subRaza = $raza . " " . $subRaza;
                                $api_subRaza = $raza . "/" . $subRaza; ?>
                                <option value="<?php echo $api_subRaza ?>">
                                    <?php echo $mostrar_subRaza ?>
                                </option>
                        <?php }
                        }   
                    }   
                ?>
            </select><br>
            <input type="submit" value="Generar" class="btn btn-primary"><br><br>
        </form>
    </div>
</body>
</html>
