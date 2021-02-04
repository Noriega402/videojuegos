<?php 
	require_once "../config/conexion.php";
	require_once "../config/crud.php";

	$object = new crud();

	echo $object->eliminar($_POST['idJuego']);




?>
