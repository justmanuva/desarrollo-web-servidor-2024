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
            echo json_encode(["mensaje" => "delete"]);
            break;
        default:
            echo json_encode(["mensaje" => "otro"]);
            break;
    }

    function manejarGet($_conexion){
        $sql = "SELECT * FROM fabricantes";
        $stmt = $_conexion -> prepare($sql);
        $stmt -> execute();
        $resultado = $stmt -> fetchAll(PDO::FETCH_ASSOC); //Equivalencia al getResult de mysql
        echo json_encode($resultado);
    }

    function manejarPost($_conexion, $entrada){
        $sql = "INSERT INTO fabricantes (fabricante, pais) 
            VALUES (:fabricante, :pais)";
        $stmt = $_conexion -> prepare($sql);
        $stmt -> execute([
            "fabricante" => $entrada["fabricante"],
            "pais" => $entrada["pais"]
        ]);
        if ($stmt) {
            echo json_encode(["mensaje" => "El fabricante se ha insertado correctamente"]);
        } else{
            echo json_encode(["mensaje" => "Error al insertar el fabricante"]);
        }
    }
?>