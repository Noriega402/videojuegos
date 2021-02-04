<?php 
	require_once "../config/conexion.php";
	require_once "../config/crud.php";
	
	$obj = new crud();

	$datos =array($nombre = $_POST['nombre'], 
					$anio = $_POST['anio'],
					$empresa = $_POST['empresa']);

	echo $obj->nuevo($datos);
?>