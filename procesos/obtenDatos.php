<?php 
	require_once "../config/conexion.php";
	require_once "../config/crud.php";

	$object = new crud();

	echo json_encode($object->obtenDatos($_POST['idJuego']));
?>