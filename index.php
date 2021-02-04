<?php require_once "mod/header.php"; ?>
<?php require_once "librerias/scripts.php"; ?>
	
	<!-- Comienzo de contenedor de la tabla -->
	<div class="container" style="margin-top: 30px;" >
		<div class="row">
			<div class="col-sm-12">
				<div class="card text-left">
					<div class="card-header">
						<h2>Tablas Dinamicas</h2>
					</div>
					<div class="card-body">
						<span class="btn btn-primary" data-toggle="modal" data-target="#agregar">
							Agregar Nuevo <span class="fas fa-plus-circle"></span>
						</span>
						<hr>
						<div id="datatable"></div>
					</div>
					<div class="card-footer">
						By Daniel Noriega
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Fin de contenedor de la tabla -->


	<!--Comienzo de modal para para nuevo articulo -->
	<div class="modal fade" id="agregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Agregar nuevo articulo</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="frmNuevo">
						<label>Nombre:</label>
							<input type="text" name="nombre" class="form-control input-sm" id="nombre">
						<label for="anio">Año</label>
							<input type="text" name="anio" class="form-control input-sm" id="anio">
						
						<label for="empresa">Empresa</label>
							<input type="text" name="empresa" class="form-control input-sm" id="empresa">
						
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
					<button type="button" id="btnNuevo" class="btn btn-primary">Agregar</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Fin de modal para para nuevo articulo -->

	<!--Comienzo de modal para para editar articulo -->
	<div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Editar Articulo</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="frmEditar">
						<input type="text" hidden="yes" id="idJuegoU" name="idJuegoU">
						<label>Nombre:</label>
							<input type="text" name="nombreU" class="form-control input-sm" id="nombreU">
						<label for="anio">Año</label>
							<input type="text" name="anioU" class="form-control input-sm" id="anioU">
						
						<label for="empresa">Empresa</label>
							<input type="text" name="empresaU" class="form-control input-sm" id="empresaU">
						
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
					<button type="button" id="btnActualizar" class="btn btn-primary">Actualizar</button>
				</div>
			</div>
		</div>
	</div>
	<!--Fin de modal para para nuevo articulo -->

<?php require_once "mod/footer.php" ?>

<script type="text/javascript">
	//funcion que toma el modal del nuevo articulo.
	$(document).ready(function(){
		$('#btnNuevo').click(function(){// .click es para cuando den click en el span de Agregar nuevo
			datos=$('#frmNuevo').serialize();//serialize sirve para validar los datos del formulario.

			//comienzo de la funcion de ajax para insertar los datos a la db.
			$.ajax({
				type:"POST",//tipo de envio
				data:datos, //cuales datos son los que vamos a enviar.
				url:"procesos/nuevo.php", //a donde los enviara (los datos).
				success:function(accion){//si resulta con exito la operacion.
					if (accion==1){
						$('#frmNuevo')[0].reset(); //linea opcional
						$('#datatable').load('tabla.php');// .load carag de nuevo el archivo de tabla.php
						alertify.success("Agregado con exito");
					}else{//si la opreacion fracasa.
						alertify.error("Error de ingreso de datos.");
					}
				}
			});
		});

		$('#btnActualizar').click(function(){
			datos=$('#frmEditar').serialize();//serialize sirve para validar los datos del formulario.

			//comienzo de la funcion de ajax para insertar los datos a la db.
			$.ajax({
				type:"POST",//tipo de envio
				data:datos, //cuales datos son los que vamos a enviar.
				url:"procesos/actualizar.php", //a donde los enviara (los datos).
				success:function(accion){//si resulta con exito la operacion.
					if (accion==1){
						$('#datatable').load('tabla.php');// .load carag de nuevo el archivo de tabla.php
						alertify.success("Actualizado con exito");
					}else{//si la opreacion fracasa.
						alertify.error("Error al actuzalizar registro");
					}
				}
			});
		});
	});
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$('#datatable').load('tabla.php');
		// datatable se encuentra en un div en la linea 17 y alla carga la tabla.
	});
</script>

<script type="text/javascript">

	//esta funcion sirve para obtener los datos de un articulo para actualizar. 
	//Los datos los obtiene del archivo tabla.php en la linea 35.
	function obtenerDatos(idJuego){
		$.ajax({
			type:"POST",
			data:"idJuego="+idJuego,
			url:"procesos/obtenDatos.php",
			success:function(accion){
				datos=jQuery.parseJSON(accion);

				$('#idJuegoU').val(datos['id_juego']);
				$('#nombreU').val(datos['nombre']);
				$('#anioU').val(datos['anio']);
				$('#empresaU').val(datos['empresa']);
			}
		});
	}

	function eliminarDatos(idJuego){
		alertify.confirm('Eliminar', '¿Deseas eliminar este juego?', function(){
			//alertify.success('Ok')
			$.ajax({
			type:"POST",
			data:"idJuego="+idJuego,
			url:"procesos/eliminar.php",
			success:function(accion){
				if (accion==1){
					$('#datatable').load('tabla.php');
					alertify.success("Registro eliminado");
				}else{
					alertify.error("Error al eliminar");
				}
			}
		});
		}, function(){
			//alertify.error('Cancel')
		});
	}
</script>