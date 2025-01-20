<?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );

    header("Content-Type: application/json");
    include("conexion_pdo.php");

    $metodo = $_SERVER["REQUEST_METHOD"];
    $entrada = json_decode(file_get_contents('php://input'), true);//coje todos los imput y ya nosotros escojemos cual queremos
    /**
     * $entrada["numero"] -> <input name = "numero">
     */

    switch($metodo) {
        case "GET":
            manejarGet($_conexion);
            break;
        case "POST":
            manejarPost($_conexion, $entrada);
            break;
        case "PUT":
            echo json_encode(["mensaje" => "put"]);
            break;
        case "DELETE":
            manejarDelete($_conexion, $entrada);
            break;
        default:
            echo json_encode(["mensaje" => "otro"]);
            break;
    }

    function manejarGet($_conexion){
        if(isset($_GET["nombre_estudio"]) && ((isset($_GET["desde"]) && (isset($_GET["hasta"]))))) {
            $sql = "SELECT * FROM animes WHERE nombre_estudio = :nombre_estudio AND anno_estreno
                BETWEEN :desde AND :hasta";
            $stmt = $_conexion -> prepare($sql);
            $stmt -> execute([
                "nombre_estudio" => $_GET["nombre_estudio"],
                "desde" => $_GET["desde"],
                "hasta" => $_GET["hasta"]
            ]);
        } else if(isset($_GET["nombre_estudio"])) {
            $sql = "SELECT * FROM animes WHERE nombre_estudio = :nombre_estudio";
            $stmt = $_conexion -> prepare($sql);
            $stmt -> execute([
                "nombre_estudio" => $_GET["nombre_estudio"],
            ]);
        } else if(isset($_GET["desde"]) && (isset($_GET["hasta"]))) {
            $sql = "SELECT * FROM animes WHERE anno_estreno
                BETWEEN :desde AND :hasta";
            $stmt = $_conexion -> prepare($sql);
            $stmt -> execute([
                "desde" => $_GET["desde"],
                "hasta" => $_GET["hasta"]
            ]);
        }else {
            $sql = "SELECT * FROM animes";
            $stmt = $_conexion -> prepare($sql);
            $stmt -> execute();
        }
        $resultado = $stmt -> fetchAll(PDO::FETCH_ASSOC); //Equivalencia al getResult de mysql
        echo json_encode($resultado);
    }

    function manejarPost($_conexion, $entrada){
        $sql = "INSERT INTO animes (titulo, nombre_estudio, anno_estreno, num_temporadas) 
            VALUES (:titulo, :nombre_estudio, :anno_estreno, :num_temporadas)";
        $stmt = $_conexion -> prepare($sql);
        $stmt -> execute([
            "titulo" => $entrada["titulo"],
            "nombre_estudio" => $entrada["nombre_estudio"],
            "anno_estreno" => $entrada["anno_estreno"],
            "num_temporadas" => $entrada["num_temporadas"],
        ]);
        if ($stmt) {
            echo json_encode(["mensaje" => "El anime se ha insertado correctamente"]);
        } else{
            echo json_encode(["mensaje" => "Error al insertar el anime"]);
        }
    }

    function manejarDelete($_conexion, $entrada){
        $sql = "DELETE FROM estudios WHERE titulo = :titulo";
        $stmt = $_conexion -> prepare($sql);
        $stmt -> execute([
            "titulo" => $entrada["titulo"]
        ]);
        if ($stmt) {
            echo json_encode(["mensaje" => "El anime se ha borrado correctamente"]);
        } else{
            echo json_encode(["mensaje" => "Error al borrar el anime"]);
        }
    }
?>