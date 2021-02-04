<?php 
	require_once "../config/conexion.php";
	require_once "../config/crud.php";
	
	$obj = new crud();

	$datos =array(	$idJuego = $_POST['idJuegoU'],
					$nombre = $_POST['nombreU'], 
					$anio = $_POST['anioU'],
					$empresa = $_POST['empresaU']);

	echo $obj->actualizar($datos);
?>