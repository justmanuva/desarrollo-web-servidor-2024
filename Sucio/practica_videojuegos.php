<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica de videojuegos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set("display_errors", 1 );  

        require("../05_funciones/depurar.php");
    ?>
    <style>
        .error {
            color: red
        }
    </style>
</head>
<body>
    <!--
    formulario de viedeojuegos validarlo
     titulo= 1-80 caracteres , cualquier caracter
     consola = nintendo Switch,ps5,ps4,xbox series s/x
     con radio button
     fecha de lanzamiento = el juego mas antiguo admisible sera del 1 de 1947,
     y el mas en el futuro no podrá dentro de mas de 5 años(dia actual dinamico)
     -pegi = 3,7,12,16,18 con un (select)
     -descripcion = 255 caracteres,cualquier caracter o nada  (campo opcional)
     
     -Limpiar los datos del formulario y validarlos
     Mostrar todo por pantalla si han pasado la validacion
     -->
    <?php

    ?>

    <div class="container">
        <form class="col-4" action="" method="post">
            <div class="mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="consola" value="ps4">
                    <label class="form-check-label">Playstation 4</label>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>