<?php
    header("Content-type: application/json");
    include("conexion_pdo.php");

    $metodo = $_SERVER["REQUEST_METHOD"];

    // Coge todos los input y ya nosotros escogemos cual queremos
    $entrada = json_decode(file_get_contents('php://input'), true);
    /**
     * $entrada["numero"] -> <input name="numero">
     */

    switch($metodo) {
    case "GET":
        manejarGet($_conexion);
        break;
    case "POST":
        manejarPost($_conexion, $entrada);
        break;
    case "PUT":
        manejarPut($_conexion, $entrada);
        break;
    case "DELETE";
        manejarDelete($_conexion, $entrada);
        break;
    default:
        echo json_encode(["metodo" => "otro"]);
        break;
    }
    
    function manejarGet($_conexion){
        if(isset($_GET["ciudad"]) && isset($_GET["anno_fundacion"])) {
            $sql = "SELECT * FROM estudios WHERE ciudad = :ciudad AND anno_fundacion = :anno_fundacion";
            $stmt = $_conexion -> prepare($sql);
            $stmt -> execute([
                "ciudad" => $_GET["ciudad"],
                "anno_fundacion" => $_GET["anno_fundacion"]
            ]);
        } else if(isset($_GET["ciudad"])) {
            $sql = "SELECT * FROM estudios WHERE ciudad = :ciudad";
            $stmt = $_conexion -> prepare($sql);
            $stmt -> execute([
                "ciudad" => $_GET["ciudad"]
            ]);
        } else if(isset($_GET["anno_fundacion"])) {
            $sql = "SELECT * FROM estudios WHERE anno_fundacion = :anno_fundacion";
            $stmt = $_conexion -> prepare($sql);
            $stmt -> execute([
                "anno_fundacion" => $_GET["anno_fundacion"]
            ]);
        } else {
            $sql = "SELECT * FROM estudios";
            $stmt = $_conexion -> prepare($sql);
            $stmt -> execute();
        }
        $resultado = $stmt -> fetchAll(PDO::FETCH_ASSOC); //Equivalencia al getResult de mysql
        echo json_encode($resultado);
    }

    function manejarPost($_conexion, $entrada) {
        
        // Lo mimo que CRUD, pero con la libreria PDO
        $sql = "INSERT INTO estudios (nombre_estudio, ciudad, anno_fundacion)
            VALUES (:nombre_estudio, :ciudad, :anno_fundacion)";

        $stmt = $_conexion -> prepare($sql);
        $stmt -> execute([
            "nombre_estudio" => $entrada["nombre_estudio"],
            "ciudad" => $entrada["ciudad"],
            "anno_fundacion" => $entrada["anno_fundacion"]
        ]);
        if ($stmt) {
            echo json_encode(["mensaje" => "el estudio se ha insertado correctamente"]);
        } else {
            echo json_encode(["mensaje" => "error al insertar el estudio"]);
        }
     }

     function manejarPut($_conexion, $entrada) {
        $sql = "UPDATE estudios SET
            ciudad = :ciudad,
            anno_fundacion = :anno_fundacion
            WHERE nombre_estudio = :nombre_estudio";
        $stmt = $_conexion -> prepare($sql);
        $stmt -> execute([
            "ciudad" => $entrada["ciudad"],
            "anno_fundacion" => $entrada["anno_fundacion"],
            "nombre_estudio" => $entrada["nombre_estudio"]
        ]);
        if ($stmt) {
            echo json_encode(["mensaje" => "el estudio se ha modificado correctamente"]);
        } else {
            echo json_encode(["mensaje" => "error al modificar el estudio"]);
        }
     }


    function manejarDelete($_conexion, $entrada){
        $sql = "DELETE FROM estudios WHERE nombre_estudio = :nombre_estudio";
        $stmt = $_conexion -> prepare($sql);
        $stmt -> execute([
            "nombre_estudio" => $entrada["nombre_estudio"]
        ]);
        if ($stmt) {
            echo json_encode(["mensaje" => "El estudio se ha borrado correctamente"]);
        } else{
            echo json_encode(["mensaje" => "Error al borrar el estudio"]);
        }
    }
?>