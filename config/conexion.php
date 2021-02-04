<?php 
	/**
	 * el archivo (sql) de la base de datosse encuentra en la carpeta config.
	 */
	class conectar{
		public function conexion(){
		 $conexion = mysqli_connect("localhost","root","");
		 mysqli_select_db($conexion,"juegos");

		 $conexion->set_charset('utf8');
		 return $conexion;
		}
	}

	$obj = new conectar();
	if ($obj->conexion()) {
		//echo "Conectado";
	}else{
		echo "Error al conectar con la base de datos";
	}
?>