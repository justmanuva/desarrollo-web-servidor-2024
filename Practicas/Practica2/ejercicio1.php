<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set("display_errors", 1 );
    ?>
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <?php
        function depurar(string $entrada) : string {
            $salida = htmlspecialchars($entrada);
            $salida = trim($salida);
            $salida = stripslashes($salida);
            $salida = preg_replace('!\s+!', ' ', $salida);
            return $salida;
        }
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $tmp_titulo = depurar($_POST["titulo"]);
            $tmp_paginas = depurar($_POST["paginas"]);
            if(isset($_POST["genero"])) {
                $tmp_genero = $_POST["genero"];
            } else {
                $tmp_genero = "";
            }
            $tmp_secuela = depurar($_POST["secuela"]);
            $tmp_fecha_publicacion = depurar($_POST["fecha_publicacion"]);
            $tmp_sinopsis = depurar($_POST["sinopsis"]);

            // TITULO
            if ($tmp_titulo == "") {
                $err_titulo = "El título es obligatorio";
            } else {
                if (strlen($tmp_titulo) < 1 or strlen($tmp_titulo) > 40) {
                    $err_titulo = "El título debe contener entre 1 y 40 caracteres";
                } else {
                    $patron = "/^[a-zA-ZáéíóúÁÉÍÓÚñÑ]{1}[0-9a-zA-Z áéíóúÁÉÍÓÚñÑ.,;]+$/";
                    if (!preg_match($patron, $tmp_titulo)) {
                        $err_titulo = "El nombre solo puede contener letras, espacios y puntos";
                    } else {
                        $titulo = ucwords(strtolower($tmp_titulo));
                    }
                }
            }

            // PÁGINAS
            if ($tmp_paginas == "") {
                $err_paginas = "Las páginas son obligatorias";
            } else {
                $patron = "/^[0-9]+$/";
                if (!preg_match($patron, $tmp_paginas)) {
                    $err_paginas = "Las páginas deben contener solo números";
                } else {
                    if ($tmp_paginas < 10 or $tmp_paginas > 9999) {
                        $err_paginas = "Las páginas deben ser números entre 10 y 9999";
                    }
                    else {
                        $paginas = $tmp_paginas;
                    }
                }
            }

            // GÉNERO
            if ($tmp_genero == "") {
                $err_genero = "El género es obligatorio";
            } else {
                $generos_validos = ["fantasia", "ciencia_ficcion", "romance", "drama"];
                if (!in_array($tmp_genero, $generos_validos)) {
                    $err_genero = "Género no válido";
                } else {
                    $genero = ucwords(strtolower($tmp_genero));
                }
            }

            // SECUELA
            if ($tmp_secuela == "") {
                $secuela = "no";
            } else {
                $respuestas_validas = ["si", "no"];
                if (!in_array($tmp_secuela, $respuestas_validas)) {
                    $err_secuela = "Valores no válidos";
                } else {
                    $secuela = strtolower($tmp_secuela);
                }
            }
            
            // FECHA DE PUBLICACIÓN
            $patron = "/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/";
            if (!preg_match($patron, $tmp_fecha_publicacion)) {
                $err_fecha_publicacion = "Formato de fecha incorrecto";
            } else {
                $fecha_actual = date("Y-m-d");
                $fecha_maxima = date("Y-m-d", strtotime("+3 years"));

                list($anno_maximo, $mes_maximo, $dia_maximo) = explode("-", $fecha_maxima);
                list($anno_actual, $mes_actual, $dia_actual) = explode("-", $fecha_actual);
                list($anno, $mes, $dia) = explode("-", $tmp_fecha_publicacion);

                if ($anno_actual - $anno > 224) {
                    $err_fecha_publicacion = "La fecha no puede ser de antes de 1800";
                } elseif ($anno_actual - $anno == 225) {
                    if($mes_actual - $mes > 0) {
                        $err_fecha_publicacion = "La fecha no puede ser de antes de 1800";
                    } elseif($mes_actual - $mes == 0) {
                        if($dia_actual - $dia > 0) {
                            $err_fecha_publicacion = "La fecha no puede ser de antes de 1800";
                        } else {
                            $fecha_publicacion = $tmp_fecha_publicacion;
                        }
                    } elseif($mes_actual - $mes <= 0) {
                        $fecha_publicacion = $tmp_fecha_publicacion;
                    } 
                } elseif($anno - $anno_actual < 3){
                    $fecha_publicacion = $tmp_fecha_publicacion;
                } elseif($anno - $anno_actual > 3) {
                    $err_fecha_publicacion = "No puedes poner una fecha de más de 3 años";
                } elseif ($anno - $anno_actual == 3) {
                    if ($mes - $mes_actual < 0) {
                        $fecha_publicacion = $tmp_fecha_publicacion;
                    } elseif ($mes - $mes_actual > 0) {
                        $err_fecha_publicacion = "No puedes poner una fecha de más de 3 años";
                    } elseif ($mes - $mes_actual == 0) {
                        if ($dia - $dia_actual <= 0) {
                            $fecha_publicacion = $tmp_fecha_publicacion;
                        } elseif ($dia - $dia_actual > 0) {
                            $err_fecha_publicacion = "No puedes poner una fecha de más de 3 años";
                        }
                    }
                } elseif ($anno_actual - $anno <= 225) {
                    $fecha_publicacion = $tmp_fecha_publicacion;
                }
            }

            // SINOPSIS
            $patron = "/^[a-zA-Z áéióúÁÉÍÓÚñÑ]*$/";
            if (!preg_match($patron, $tmp_sinopsis)) {
                $err_sinopsis = "La sinopsis deben ser letras o espacios en blanco";
            } else {
                if (strlen($tmp_sinopsis) > 200) {
                    $err_sinopsis = "La sinopsis debe tener máximo 200 caracteres";
                } else {
                    $sinopsis = $tmp_sinopsis;
                }
            }
        }
    ?>

    <div class="container">
        <h1>Formulario de libros</h1>
        <form class="col-3" action="" method="post">
            <div clsas="mb-3">
                <label class="form-label">Título</label>
                <input class="form-control" type="text" name="titulo">
                <?php if (isset($err_titulo)) echo "<span class='error'>$err_titulo</span>"; ?>
            </div>
            <div clsas="mb-3">
                <label class="form-label">Páginas</label>
                <input class="form-control" type="number" name="paginas">
                <?php if (isset($err_paginas)) echo "<span class='error'>$err_paginas</span>"; ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Género</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="genero" value="fantasia">
                    <label class="form-check-label">Fantasia</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="genero" value="ciencia_ficcion">
                    <label class="form-check-label">Ciencia Ficción</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="genero" value="romance">
                    <label class="form-check-label">Romance</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="genero" value="drama">
                    <label class="form-check-label">Drama</label>
                </div>
                <?php if (isset($err_genero)) echo "<span class='error'>$err_genero</span>" ?>
            </div>
            <div clsas="mb-3">
                <label class="form-label">Secuela</label>
                <select class="form-select" name="secuela" id="secuela">
                    <option value="si">Sí</option>
                    <option value="no">No</option>
                    <option value="no"></option>
                </select>
                <?php if (isset($err_secuela)) echo "<span class='error'>$err_secuela</span>"; ?>
            </div>
            <div clsas="mb-3">
                <label class="form-label">Fecha de publicación</label>
                <input class="form-control" type="date" name="fecha_publicacion">
                <?php if (isset($err_fecha_publicacion)) echo "<span class='error'>$err_fecha_publicacion</span>"; ?>
            </div>
            <div clsas="mb-3">
                <label class="form-label">Sinopsis</label>
                <input class="form-control" type="textarea" name="sinopsis">
                <?php if (isset($err_sinopsis)) echo "<span class='error'>$err_sinopsis</span>"; ?>
            </div>
            <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="Enviar">
            </div>
        </form>
        <?php
            if (isset($titulo) && isset($paginas) && isset($genero) && isset($secuela) && isset($fecha_publicacion) && isset($sinopsis)) { ?>
                <p><?php echo $titulo; ?></p>
                <p><?php echo $paginas; ?></p>
                <p><?php echo $genero; ?></p>
                <p><?php echo $secuela; ?></p>
                <p><?php echo $fecha_publicacion; ?></p>
                <p><?php echo $sinopsis; ?></p>
            <?php } ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>