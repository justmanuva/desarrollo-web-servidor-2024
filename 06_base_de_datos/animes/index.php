<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index de Animes</title>
    <link rel="stylesheet" type="text/css" href="../estilos.css">
    <?php
        error_reporting(E_ALL);
        ini_set("display_errors", 1);

        require('conexion1.php');
    ?>
</head>
<body>
    <h1>Tabla de animes</h1>
    <?php
        $sql = "SELECT * FROM animes";
        // Asignarle a _conexion la funcion query (consulta)
        $resultado = $_conexion -> query($sql);
        /**
         * Aplicamos la función query a la conexión, donde se ejecuta la sentencia SQL hecha
         * 
         * El resultado se almacena $resultado, que es un objeto con una estructura parecida
         * a los arrays
         */
    ?>
    <table>
        <thead>
            <tr>
                <th>Título</th>
                <th>Estudio</th>
                <th>Año</th>
                <th>Número de temporadas</th>
            </tr>
        </thead>
        <tbody>
            <?php
                while($fila = $resultado -> fetch_assoc()) { //Trata el resultado como un array asociativo
                    echo "<tr>";
                    echo "<td>" . $fila["titulo"] . "</td>";
                    echo "<td>" . $fila["nombre_estudio"] . "</td>";
                    echo "<td>" . $fila["anno_estreno"] . "</td>";
                    echo "<td>" . $fila["num_temporadas"] . "</td>";
                }
            ?>
        </tbody>
    </table>
</body>
</html>