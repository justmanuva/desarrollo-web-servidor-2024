<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$id_anime = $_POST["id_anime"];

		// DELETE
		$sql = $_conexion -> prepare("DELETE FROM animes WHERE id_anime = ?");
		$sql -> bind_param("i", $id_anime);
		$sql -> execute();

		// INSERT
		$sql = $_conexion -> prepare("INSERT INTO animes (titulo, nombre_estudio, anno_estreno,
			num_temporadas, imagen)
			VALUES (?,?,?,?,?)");
		$sql -> bind_param("ssiis",
			$titulo,
			$nombre_estudio,
			$anno_estreno,
			$num_temporadas,
			$ubicacion_final
		);
		$sql -> execute();

		// SELECT (Con parámetros)
		$sql = $_conexion -> prepare("SELECT * FROM animes WHERE id_animes = ?");
		$sql -> bind_param("i", $id_anime);
		$sql -> execute();
		$resultado = $sql -> get_result();

		// UPDATE
		$sql = $_conexion -> prepare("UPDATE animes SET
			titulo = ?,
			nombre_estudio = ?,
			anno_estreno = ?,
			num_temporadas = ?,
			WHERE id_anime = ?
		");
		$sql -> bind_param("ssiii",
			$titulo,
			$nombre_estudio,
			$anno_estreno,
			$num_temporadas,
			$id_anime
		);
		$sql -> execute();

		// SELECT (Order by)
		$sql = $_conexion -> prepare("SELECT * FROM animes ORDER BY ?");
		$sql -> bind_param("i", $id_anime);
		$sql -> execute();
		$resultado = $sql -> get_result();
	}


	// SELECT (Sin parámetros)
	$sql = "SELECT * FROM animes";
	$resultado = $_conexion -> query($sql);

	$_conexion -> close();
?>
<h1>Tabla de animes</h1>
<table>
	<thead>
		<tr>
			<td>Título</td>
			<td>Estudio</td>
			<td>Año</td>
			<td>Número de temporadas</td>
			<td>Imagen</td>
			<td></td>
			<td></td>
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
					<img width=100 height=200 src="<?php echo $fila["imagen"] ?>">
				</td>
				<td>
					<a href="ver_anime.php?id_anime=<?php echo $fila["id_anime"] ?>">Editar</a> 
				</td>
				<td>
					<form action="" method="post">
						<input type="hidden" name=id_anime value="<?php echo $fila["id_anime"] ?>">
						<input type="submit" value="Borrar">
					</form>
				</td>
				<?php
				echo "</tr>";
			}
			?>
	</tbody>
</table>
