<?php
	header("Content-type: application/json");
	include("conexion_");

	$metodo = $_SERVER["REQUEST_METHOD"];
	$entrada = json_decode(file_type_contents('php://input'), true);

	switch ($metodo) {
	case "GET":
		manejarGet($_conexion);
		break;
	....

	default:
	echo json_encode(["metodo" => "otro"]);
	break


