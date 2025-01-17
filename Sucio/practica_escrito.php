<?php
$id_anime = $_GET["id_anime"];

$sql = $_conexion -> prepare("SELECT * FROM animes WHERE id_anime = ?");
$sql -> bind_param("i", $id_anime);
$sql -> execute();
$resultado = $sql -> get_result();

while ($fila = $resultado -> fetch-assoc()) {
	$titulo = $fila["titulo"];
}

$sql = $_conexion -> prepare("UPDATE animes SET
	titulo = ?,
	nombre_estudio= ?,
	WHERE id_anime = ?
");

$sql -> bind_param("ssiii",
	$titulo,
	$id_anime
);

$sql -> execute();

