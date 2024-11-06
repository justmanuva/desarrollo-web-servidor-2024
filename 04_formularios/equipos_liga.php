<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipos de la liga</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set("display_errors", 1 );

        require("../05_funciones/depurar.php");
    ?>
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $tmp_nombre = depurar($_POST["nombre"]);
            $tmp_inicial = depurar($_POST["inicial"]);

            $tmp_ciudad = depurar($_POST["ciudad"]);

            $tmp_fecha_fundacion = depurar($_POST["fecha_fundacion"]);
            $tmp_numero_jugadores = depurar($_POST["numero_jugadores"]);

            if ($tmp_nombre == "") {
                $err_nombre = "El nombre es obligatorio";
            } else {
                if (strlen($tmp_nombre) < 3 || strlen($tmp_nombre) > 20) {
                    $err_nombre = "El nombre debe contener de 3 a 20 dígitos";
                } else {
                    $patron = "/^[a-zA-Z áéióúÁÉÍÓÚñÑüÜ.]+$/";
                    if (!preg_match($patron, $tmp_nombre)) {
                        $err_nombre = "El nombre solo puede contener letras, espacios y puntos";
                    } else {
                        $nombre = ucwords(strtolower($tmp_nombre));
                    }
                }
            }

            if ($tmp_inicial == "") {
                $err_inicial = "La inicial es obligatoria";
            } else {
                if (strlen($tmp_inicial) != 3) {
                    $err_inicial = "Las iniciales deben ser de 3 letras";
                } else {
                    $inicial = strtoupper($tmp_incial);
                }
            }

            if ($tmp_ciudad == "") {
                $err_ciudad = "La ciudad es obligatoria";
            } else {
                $patron = "/^[a-zA-Z áéióúÁÉÍÓÚñÑüÜçÇ]+$/";
                if (!preg_match($patron, $tmp_ciudad)) {
                    $err_ciudad = "La ciudad solo puede contener letras y espacios";
                } else {
                    $ciudad = ucwords(strtolower($tmp_ciudad));
                }
            }

            //FALTA FECHA DE FUNDACIÓN Y NUMERO DE JUGADORES





            if (isset($_POST["liga"])) {
                $tmp_liga = $_POST["liga"];
            } else {
                $tmp_liga = "";
            }
            if ($tmp_liga == "") {
                $err_liga = "La liga es obligatoria";
            } else {
                $ligas_validas = ["ea_sports", "hypermotion", "rfef"];
                if (!in_array($tmp_liga, $ligas_validas)) {
                    $err_liga = "La liga no es válida";
                } else {
                    $liga = $tmp_liga;
                }
            }

            if (isset($_POST["titulos"])) {
                $tmp_titulo = $_POST["titulos"];
            } else {
                $tmp_titulo = "";
            }
            if ($tmp_titulo == "") {
                $err_titulo = "La opción titulos es obligatoria";
            } else {
                $titulos_validos = ["si", "no"];
                if (!in_array($tmp_titulo, $titulos_validos)) {
                    $err_titulo = "La opción no es válida";
                } else {
                    $titulo = $tmp_titulo;
                }
            }



        }
    ?>

    <div class="container">
        <h1>Formulario de equipos de la liga</h1>
        <form class="col-3" action="" method="post">
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input class="form-control" type="text" name="nombre">
                <?php if (isset($err_nombre)) echo "<span class='error'>$err_nombre</span>"; ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Inicial</label>
                <input class="form-control" type="text" name="inicial">
                <?php if (isset($err_inicial)) echo "<span class='error'>$err_inicial</span>"; ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Liga</label>
                <select class="form-select" name="liga" id="liga">
                    <option value="ea_sports">Liga EA Sports</option>
                    <option value="hypermotion">Liga Hypermotion</option>
                    <option value="rfef">Liga Primer RFEF</option>
                </select>
                <?php if (isset($err_liga)) echo "<span class='error'>$err_liga</span>"; ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Ciudad</label>
                <input class="form-control" type="text" name="ciudad">
                <?php if (isset($err_ciudad)) echo "<span class='error'>$err_ciudad</span>"; ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Liga con títulos</label>
                <select class="form-select" name="titulos" id="titulos">
                    <option value="si">Sí</option>
                    <option value="no">No</option>
                </select>
                <?php if (isset($err_titulos)) echo "<span class='error'>$err_titulos</span>"; ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Fecha de fundación</label>
                <input class="form-control" type="date" name="fecha_fundacion">
                <?php if (isset($err_fecha_fundacion)) echo "<span class='error'>$err_fecha_fundacion</span>"; ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Número de jugadores</label>
                <input class="form-control" type="text" name="numero_jugadores">
                <?php if (isset($err_numero_jugadores)) echo "<span class='error'>$err_numero_jugadores</span>"; ?>
            </div>
            <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="Enviar">
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>