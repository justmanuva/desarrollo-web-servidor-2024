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
        $sql = "SELECT * FROM consolas";
        $stmt = $_conexion -> prepare($sql);
        $stmt -> execute();
        $resultado = $stmt -> fetchAll(PDO::FETCH_ASSOC); //Equivalencia al getResult de mysql
        echo json_encode($resultado);
    }

    function manejarPost($_conexion, $entrada){
        $sql = "INSERT INTO consolas (nombre, fabricante, generacion, unidades_vendidas) 
            VALUES (:nombre, :fabricante, :generacion, :unidades_vendidas)";
        $stmt = $_conexion -> prepare($sql);
        $stmt -> execute([
            "id_consola" => $entrada["id_consola"],
            "nombre" => $entrada["nombre"],
            "fabricante" => $entrada["fabricante"],
            "generacion" => $entrada["generacion"],
            "unidades_vendidas" => $entrada["unidades_vendidas"]
        ]);
        if ($stmt) {
            echo json_encode(["mensaje" => "La consola se ha insertado correctamente"]);
        } else{
            echo json_encode(["mensaje" => "Error al insertar la consola"]);
        }
    }

    function manejarDelete($_conexion, $entrada){
        $sql = "DELETE FROM estudios WHERE nombre = :nombre";
        $stmt = $_conexion -> prepare($sql);
        $stmt -> execute([
            "nombre" => $entrada["nombre"]
        ]);
        if ($stmt) {
            echo json_encode(["mensaje" => "La consola se ha borrado correctamente"]);
        } else{
            echo json_encode(["mensaje" => "Error al borrar la consola"]);
        }
    }
?>