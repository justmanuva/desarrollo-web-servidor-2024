<?php
while ($fila = $resultado -> fetch_assoc()) {
	
?>
<td>
	<a href="ver_anime.php?id_anime=<?php echo $fila["id_anime"] ?>">Editar</a>
</td>
<td>
	<form>
		<input type="hidden" value="<?php echo $fila["id_anime"] ?>">
		<input type="submit" value="Borrar">
	</form>
</td>

<form>
	<input type="text" name="titulo" value="<?php echo $titulo ?>">
	<select name="nombre_estudio">
		<option value="<?php echo $nombre_estudio?>" selected hidden><?php echo $nombre_estudio ?></option>
		<?php
		foreach ($estudios as $estudio) { ?>
			<option value="<?php echo $estudio?>">
				<?php echo $estudio ?>
			</option>
	</select>
</form
