<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
    ?>
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        
        <?php
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $tmp_usuario = $_POST["usuario"];
                $tmp_nombre = $_POST["nombre"];
                $tmp_apellidos = $_POST["apellidos"];
                $tmp_dni = $_POST["dni"];
                $tmp_correo = $_POST["correo"];
                $tmp_fecha_nacimiento = $_POST["fecha_nacimiento"];

                if($tmp_dni == "") {
                    $err_dni = "El DNI es obligatorio";
                } else {
                    // Lo convierto a mayúscula para comprobarlo una vez sea mayúscula
                    $tmp_dni = strtoupper($tmp_dni);
                    $patron = "/^[0-9]{8}[A-Z]$/";
                    if (!preg_match($patron, $tmp_dni)) {
                        $err_dni = "El DNI debe tener 8 dígitos y una letra";
                    } else {
                        // Cogemos los 8 números con substr (también vale 0, -1);
                        $numero_dni = (int)substr($tmp_dni, 0, 8);
                        $letra_dni = substr($tmp_dni, 8, 1);

                        $resto_dni = $numero_dni % 23;

                        //Opción menos optimizada (más facil de pensar);
                        /* $letra_correcta = match($resto_dni) {
                            0 => "T",
                            1 => "R",
                            2 => "W",
                            3 => "A",
                            4 => "G",
                            5 => "M",
                            6 => "Y",
                            7 => "F",
                            8 => "P",
                            9 => "D",
                            10 => "X",
                            11 => "B",
                            12 => "N",
                            13 => "J",
                            14 => "Z",
                            15 => "S",
                            16 => "Q",
                            17 => "V",
                            18 => "H",
                            19 => "L",
                            20 => "C",
                            21 => "K",
                            22 => "E"
                        }; */

                        // Opción optimizada (algo más complicada de pensar);
                        $letras_dni = "TRWAGMYFPDXBNJZSQVHLCKE";
                        //Coge $letras_dni, va a la posicion $resto_dni y extrae ese char
                        $letra_correcta = substr($letras_dni, $resto_dni, 1);

                        if ($letra_dni != $letra_correcta) {
                            $err_dni = "La letra del DNI no es correcta";
                        } else $dni = $tmp_dni;
                    }
                }
    
                if($tmp_correo == '') {
                    $err_correo = "El correo electrónico es obligatSorio";
                } else {
                    // Formato de correo electrónico
                    $patron = "/^[a-zA-Z0-9_\-.+]+@([a-zA-Z0-9-]+.)+[a-zA-Z]+$/";
                    if (!preg_match($patron, $tmp_correo)) {
                        $err_correo = "El correo no es válido";
                    } else {
                        $palabras_baneadas = ["caca", "peo", "recorcholis", "repampanos", "caracoles"];

                        $palabras_encontradas = "";
                        foreach ($palabras_baneadas as $palabra_baneada) {
                            if (str_contains($tmp_correo, $palabra_baneada)) {
                                $palabras_encontradas .= "$palabra_baneada, "; 
                            }
                            if ($palabras_encontradas != "") {
                                $err_correo = "No se permiten las palabras: $palabras_encontradas";
                            } else {
                                $correo = $tmp_correo;
                            }
                        }
                    }
                }

                if($tmp_usuario == '') {
                    $err_usuario = "El usuario es obligatorio";
                } else {
                    // A-Z (mayus o minus), numeros, barrabaja (4-12 chars)
                    // Tiene que ir entre /^ $/
                    $patron = "/^[a-zA-Z0-9_]{4,12}$/";
                    // Comprueba si existe el patron en $tmp_usuario
                    if (!preg_match($patron, $tmp_usuario)) {
                        $err_usuario = "El usuario debe contener de 4 a 12 letras, números o barrabaja";
                    } else {
                        $usuario = $tmp_usuario;
                    }
                }

                if ($tmp_nombre == '') {
                    $err_nombre = "El nombre es obligatorio";
                } else {
                    // Mejor separar los errores para mejor exp del usuario
                    if (strlen($tmp_nombre) < 2 or strlen($tmp_nombre) > 40) {
                        $err_nombre = "El nombre debe tener entre 2 y 40 caracteres";
                    } else {
                        // Letras, espacios en blanco y tildes
                        $patron = "/^[a-zA-Z àèìòùÀÈÌÒÙñÑüÜ]+$/";
                        if (!preg_match($patron, $tmp_nombre)) {
                            $err_nombre = "El nombre solo puede contener letras y espacios en blanco";
                        } else {
                            $nombre = $tmp_nombre;
                        }
                    }
                }

                if ($tmp_apellidos == '') {
                    $err_apellidos = "Los apellidos son obligatorios";
                } else {
                    // Mejor separar los errores para mejor exp del usuario
                    if (strlen($tmp_apellidos) < 2 or strlen($tmp_apellidos) > 40) {
                        $err_apellidos = "Los apellidos deben tener entre 2 y 40 caracteres";
                    } else {
                        // Letras, espacios en blanco y tildes
                        $patron = "/^[a-zA-Z àèìòùÀÈÌÒÙñÑüÜ]+$/";
                        if (!preg_match($patron, $tmp_apellidos)) {
                            $err_apellidos = "Los apellidos solo pueden contener letras y espacios en blanco";
                        } else {
                            $apellidos = $tmp_apellidos;
                        }
                    }
                }
                
                if ($tmp_correo == '') {
                    $err_correo = "El correo es obligatorio";
                } else {
                    // Mejor separar los errores para mejor exp del usuario
                    if (strlen($tmp_correo) < 2 or strlen($tmp_correo) > 40) {
                        $err_apellidos = "Los apellidos deben tener entre 2 y 40 caracteres";
                    } else {
                        // Letras, espacios en blanco y tildes
                        $patron = "/^[a-zA-Z àèìòùÀÈÌÒÙñÑüÜ]+$/";
                        if (!preg_match($patron, $tmp_apellidos)) {
                            $err_apellidos = "Los apellidos solo pueden contener letras y espacios en blanco";
                        } else {
                            $apellidos = $tmp_apellidos;
                        }
                    }
                }

                if($tmp_fecha_nacimiento == '') {
                    $err_fecha_nacimiento = "La fecha de nacimiento es obligatoria";
                } else {
                    $patron = "/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/";
                    if(!preg_match($patron,$tmp_fecha_nacimiento)) {
                        $err_fecha_nacimiento = "El formato de la fecha es incorrecto";
                    } else {
                        $fecha_actual = date("Y-m-d"); // 2024 25 10

                        // Asigna variables a los 3 campos del explode (explode == split)
                        list($anno_actual,$mes_actual,$dia_actual) = 
                            explode('-',$fecha_actual);
                        list($anno_nacimiento,$mes_nacimiento,$dia_nacimiento) = 
                            explode('-',$tmp_fecha_nacimiento);
                        
                        if($anno_actual - $anno_nacimiento <= 120 
                                and $anno_actual - $anno_nacimiento > 0) {
                            //  la persona tiene menos de 120 años  VALIDA
                            $fecha_nacimiento = $tmp_fecha_nacimiento;
                        } elseif($anno_actual - $anno_nacimiento > 120) {
                            //  la persona tiene mas de 120 años    NO VALIDA
                            $err_fecha_nacimiento = "No puedes tener más de 120 años";
                            echo "<h1>AAAAA</h1>";
                        } elseif($anno_actual - $anno_nacimiento < 0) {
                            $err_fecha_nacimiento = "No puedes tener menos de 0 años";
                            echo "<h1>DDDDD</h1>";
                        } elseif($anno_actual - $anno_nacimiento == 121) {
                            if($mes_actual - $mes_nacimiento < 0) {
                                //  la persona aun no ha cumplido 121
                                $fecha_nacimiento = $tmp_fecha_nacimiento;
                            } elseif($mes_actual - $mes_nacimiento > 0) {
                                //  la persona ya ha cumplido 121
                                $err_fecha_nacimiento = "No puedes tener más de 120 años";
                                echo "<h1>BBBBB</h1>";
                            } elseif($mes_actual - $mes_nacimiento == 0) {
                                if($dia_actual - $dia_nacimiento < 0) {
                                    //  la persona aun no ha cumplido 121
                                    $fecha_nacimiento = $tmp_fecha_nacimiento;
                                } elseif($dia_actual - $dia_nacimiento >= 0) {
                                    //  la persona ya ha cumplido 121
                                    $err_fecha_nacimiento = "No puedes tener más de 120 años";
                                    echo "<h1>CCCCC</h1>";
                                }
                            }
                        } elseif($anno_actual - $anno_nacimiento == 0) {
                            if($mes_actual - $mes_nacimiento < 0) {
                                //  la persona aun no nacido
                                $err_fecha_nacimiento = "La persona aún no ha nacido";
                                echo "<h1>AAAAA</h1>";
                            } elseif($mes_actual - $mes_nacimiento < 0) {
                                //  la persona ya ha nacido
                                $fecha_nacimiento = $tmp_fecha_nacimiento;
                            } elseif($mes_actual - $mes_nacimiento == 0) {
                                if($dia_actual - $dia_nacimiento < 0) {
                                    //  la persona ya ha nacido
                                    $err_fecha_nacimiento = "La persona aún no ha nacido";
                                    echo "<h1>BBBBB</h1>";
                                } elseif($dia_actual - $dia_nacimiento >= 0) {
                                    //  la persona ya ha cumplido 121
                                    $fecha_nacimiento = $tmp_fecha_nacimiento;
                                }
                            }
                        }
                    }
                }
            }
        ?>

        <h1>Formulario usuario</h1>

        <form class="col-4" action="" method="post">
            <div class="mb-3">
                <label class="form-label">DNI</label>
                <input class="form-control" type="text" name="dni">
                <?php if(isset($err_dni)) echo "<span class='error'>$err_dni</span>" ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Correo electrónico</label>
                <input class="form-control" type="text" name="correo">
                <?php if(isset($err_correo)) echo "<span class='error'>$err_correo</span>" ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Usuario</label>
                <input class="form-control" type="text" name="usuario">
                <?php if(isset($err_usuario)) echo "<span class='error'>$err_usuario</span>" ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input class="form-control" type="text" name="nombre">
                <?php if(isset($err_nombre)) echo "<span class='error'>$err_nombre</span>"; ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Apellidos</label>
                <input class="form-control" type="text" name="apellidos">
                <?php if(isset($err_apellidos)) echo "<span class='error'>$err_apellidos</span>" ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Fecha de nacimiento</label>
                <input class="form-control" type="text" name="fecha_nacimiento">
                <?php if(isset($err_fecha_nacimiento)) echo "<span class='error'>$err_fecha_nacimiento</span>" ?>
            </div>
            <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="Enviar">
            </div>
        </form>
        <?php
            if (isset($dni) and isset($correo) and isset($usuario) and isset($nombre) and isset($apellidos)) { ?>
                <h1><?php echo $dni ?></h1>
                <h1><?php echo $usuario ?></h1>
                <h1><?php echo $correo ?></h1>
                <h1><?php echo $nombre ?></h1>
                <h1><?php echo $apellidos ?></h1>
                <h1><?php echo $fecha_nacimiento ?></h1>
            <?php } ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>