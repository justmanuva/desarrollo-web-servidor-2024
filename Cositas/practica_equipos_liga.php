<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica de equipos liga</title>
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
            $tmp_liga = depurar($_POST["liga"]);
            $tmp_femenino = depurar($_POST["femenino"]);
            $tmp_ciudad = depurar($_POST["ciudad"]);
            $tmp_fecha_fundacion = depurar($_POST["fecha_fundacion"]);
            $tmp_numero_jugadores = depurar($_POST["numero_jugadores"]);

            // NOMBRE
            if ($tmp_nombre == "") {
                $err_nombre = "El nombre es obligatorio";
            } else {
                if (strlen($tmp_nombre) < 3 or strlen($tmp_nombre) > 20) {
                    $err_nombre = "El nombre debe contener entre 3 y 20 caracteres";
                } else {
                    $patron = "/^[a-zA-Z áéíóúÁÉÍÓÚñÑüÜ.]+$/";
                    if (!preg_match($patron, $tmp_nombre)) {
                        $err_nombre = "El nombre solo puede contener letras, espacios y puntos";
                    } else {
                        $nombre = ucwords(strtolower($tmp_nombre));
                    }
                }
            }

            // INICIAL
            if ($tmp_inicial == "") {
                $err_inicial = "Las iniciales son obligatorias";
            } else {
                if (strlen($tmp_inicial) != 3) {
                    $err_inicial = "Las iniciales deben ser de 3 letras";
                } else {
                    $inicial = strtoupper($tmp_inicial);
                }
            }

            // LIGA
            if ($tmp_liga == "") {
                $err_liga = "La liga es obligatoria";
            } else {
                $ligas_validas = ["ea_sports", "hypermotion", "rfef"];
                if (!in_array($tmp_liga, $ligas_validas)) {
                    $err_liga = "Liga no válida";
                } else {
                    $liga = strtolower($tmp_liga);
                }
            }

            // FEMENINO
            if ($tmp_femenino == "") {
                $err_femenino = "El equipo tiene que ser masculino o femenino";
            } else {
                $respuestas_validas = ["si", "no"];
                if (!in_array($tmp_femenino, $respuestas_validas)) {
                    $err_femenino = "Valores no válidos";
                } else {
                    $femenino = strtolower($tmp_femenino);
                }
            }

            // CIUDAD
            if ($tmp_ciudad == "") {
                $err_ciudad = "La ciudad es obligatoria";
            } else {
                $patron = "/^[a-zA-Z áéíóúÁÉÍÓÚñÑüÜçÇ]+$/";
                if (!preg_match($patron, $tmp_ciudad)) {
                    $err_ciudad = "La ciudad solo puede contener letras y espacios";
                } else {
                    $ciudad = ucwords(strtolower($tmp_ciudad));
                }
            }

            /* Málafa C.F
                Equipos de la liga
                -Nombre (letras con tilde,ñ,espacios en blanco y punto), entre 3 y 20 caracteres
                -Inicial (3 letras)
                -Liga ("select" con opciones: LIga EA Sports, Liga Hypermotion, Liga Primera RFEF)
                -Equipo femenino ("select" si o no)
                -Ciudad (letras con tilde, ñ, ç y con espacios en blanco)
                -Fecha de fundación (entre hoy y el 18 de diciembre de 1889) 
                -Numero de jugadore entre (19 y 32)
            */
            
            // FECHA DE FUNDACIÓN
            if ($tmp_fecha_fundacion == "") {
                $err_fecha_fundacion = "La fecha de fundación es obligatoria";
            } else {
                $patron = "/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/";
                if (!preg_match($patron, $tmp_fecha_fundacion)) {
                    $err_fecha_fundacion = "Formato de fecha incorrecto";
                } else {
                    $fecha_actual = date("Y-m-d");
                    $fecha_limite = "1889-12-18";

                    if ($tmp_fecha_fundacion >= $fecha_actual) {
                        $err_fecha_fundacion = "La fecha debe ser menor al día de hoy";
                    } elseif ($tmp_fecha_fundacion < $fecha_limite) {
                        $err_fecha_fundacion = "La fecha debe ser igual o mayor al 18-12-1889";
                    } else {
                        $fecha_fundacion = $tmp_fecha_fundacion;
                    }
                }
            }

            // NÚMERO DE JUGADORES
            if ($tmp_numero_jugadores == "") {
                $err_numero_jugadores = "El número de jugadores es obligatorio";
            } else {
                if ($tmp_numero_jugadores < 19 or $tmp_numero_jugadores > 32) {
                    $err_numero_jugadores = "El número de jugadores debe ser de 19 a 32";
                } else {
                    $numero_jugadores = $tmp_numero_jugadores;
                }
            }
        }
    ?>

    <div class="container">
        <h1>Formulario de equipos de la liga</h1>
        <form class="col-3" action="" method="post">
            <div clsas="mb-3">
                <label class="form-label">Nombre</label>
                <input class="form-control" type="text" name="nombre">
                <?php if (isset($err_nombre)) echo "<span class='error'>$err_nombre</span>"; ?>
            </div>
            <div clsas="mb-3">
                <label class="form-label">Inicial</label>
                <input class="form-control" type="text" name="inicial">
                <?php if (isset($err_inicial)) echo "<span class='error'>$err_inicial</span>"; ?>
            </div>
            <div clsas="mb-3">
                <label class="form-label">Liga</label>
                <select class="form-select" name="liga" id="liga">
                    <option value="ea_sports">Liga EA Sports</option>
                    <option value="hypermotion">Liga Hypermotion</option>
                    <option value="rfef">Liga Primer RFEF</option>
                </select>
                <?php if (isset($err_liga)) echo "<span class='error'>$err_liga</span>"; ?>
            </div>
            <div clsas="mb-3">
                <label class="form-label">Equipo femenino</label>
                <select class="form-select" name="femenino" id="femenino">
                    <option value="si">Sí</option>
                    <option value="no">No</option>
                </select>
                <?php if (isset($err_femenino)) echo "<span class='error'>$err_femenino</span>"; ?>
            </div>
            <div clsas="mb-3">
                <label class="form-label">Ciudad</label>
                <input class="form-control" type="text" name="ciudad">
                <?php if (isset($err_ciudad)) echo "<span class='error'>$err_ciudad</span>"; ?>
            </div>
            <div clsas="mb-3">
                <label class="form-label">Liga con títulos</label>
                <select class="form-select" name="titulos" id="titulos">
                    <option value="si">Sí</option>
                    <option value="no">No</option>
                </select>
                <?php if (isset($err_titulo)) echo "<span class='error'>$err_titulo</span>"; ?>
            </div>
            <div clsas="mb-3">
                <label class="form-label">Fecha de fundación</label>
                <input class="form-control" type="date" name="fecha_fundacion">
                <?php if (isset($err_fecha_fundacion)) echo "<span class='error'>$err_fecha_fundacion</span>"; ?>
            </div>
            <div clsas="mb-3">
                <label class="form-label">Número de jugadores</label>
                <input class="form-control" type="text" name="numero_jugadores">
                <?php if (isset($err_numero_jugadores)) echo "<span class='error'>$err_numero_jugadores</span>"; ?>
            </div>
            <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="Enviar">
            </div>
        </form>
        <?php
            if (isset($nombre) && isset($inicial) && isset($liga) && isset($femenino) && isset($ciudad) && isset($fecha_fundacion) && isset($numero_jugadores)) { ?>
                <p><?php echo $nombre; ?></p>
                <p><?php echo $inicial; ?></p>
                <p><?php echo $liga; ?></p>
                <p><?php echo $femenino; ?></p>
                <p><?php echo $ciudad; ?></p>
                <p><?php echo $fecha_fundacion; ?></p>
                <p><?php echo $numero_jugadores; ?></p>
            <?php } ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>