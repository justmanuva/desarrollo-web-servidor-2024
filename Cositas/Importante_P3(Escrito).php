<?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_anime = $_POST["id_anime"];
    $titulo = $_POST["titulo"];
    $nombre_estudio = $_POST["nombre_estudio"];
    $anno_estreno = $_POST["anno_estreno"];
    $num_temporadas = $_POST["num_temporadas"];


    // DELETE

    $sql = $_conexion -> prepare("DELETE FROM animes WHERE id_anime = ?");

    $sql -> bind_param("i", $id_anime);

    $sql -> execute();


    // INSERT

    $sql = $_conexion -> prepare("INSERT INTO animes (titulo, nombre_estudio, anno_estreno, num_temporadas, imagen)
      VALUES (?,?,?,?,?)");

    $sql -> bind_param("ssiis",
      $titulo,
      $nombre_estudio,
      $anno_estreno,
      $num_temporadas,
      $ubicacion_final
    );

    $sql -> execute();

	  // SELECT

    $sql = $_conexion -> prepare("SELECT * FROM animes WHERE id_anime = ?");

    $sql -> bind_param("i", $id_anime);

    $sql -> execute();

    $resultado = $sql -> get_result();

    // UPDATE

    $sql = $_conexion ->prepare("UPDATE animes SET
      titulo = ?,
      nombre_estudio = ?,
      anno_estreno = ?,
      num_temporadas = ?,
      WHERE id_anime = ?,
    ");

    $sql -> bind_param("ssiii",
      $titulo,
      $nombre_estudio,
      $anno_estreno,
      $num_temporadas,
      $id_anime
    );

    $sql -> execute();

    }
    
    $sql = "SELECT * FROM animes";
    $resultado = $_conexion -> query($sql);

    $_conexion -> close();
?>
    <table>
      <thead>
        <tr>
          <th>Título</th>
          <th>Estudio</th>
          <th>Año</th>
          <th>Número de temporadas</th>
          <th>Imagen</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php
          while($fila = $resultado -> fetch_assoc()) {
	    	    echo "<tr>";
	    	    echo "<td>" . $fila["titulo"] . "</td>";
            echo "<td>" . $fila["nombre_estudio"] . "</td>";
            echo "<td>" . $fila["anno_estreno"] . "</td>";
            echo "<td>" . $fila["num_temporadas"] . "</td>";
	          ?>
            <td>
              <img width="100" height="200" src="<?php echo $fila["imagen"]?>">
            </td>
            <td>
              <a href="ver_anime.php?id_anime=<?php echo $fila["id_anime"] ?>">Editar</a>
            </td>
            <td>
              <form action="" method="post">
                <input type="hidden" name="id_anime" value="<?php echo $fila["id_anime"] ?>">
                <input type="submit" value="Borrar">
              </form>
            </td>
            <?php
            echo "</tr>";
	        }
        ?>
      </tbody>
    </table>
