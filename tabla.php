<?php 
	require_once "config/conexion.php";
	require_once "config/constantes.php";  
 
	$con = new conectar();
	$conexion = $con->conexion();
	$sql = "SELECT* FROM t_juegos";
	$resultado = mysqli_query($conexion, $sql);
?>

<div>
	<table class="table table-hover table-condensed table-bordered" id="tabla1">
		<thead style="background-color: #dc3545; color: white; font-weight: bold;">
			<?php foreach (const_juego as $key => $value):?>
			<th><?php echo $value ?></th>
			<?php endforeach; ?>
		</thead>
		<tfoot style="background-color: #ccc; color: white; font-weight: bold;">
			<tr>
				<?php foreach (const_juego as $key => $value):?>
				<td><?php echo $value ?></td>
				<?php endforeach; ?>
			</tr>
		</tfoot>
		<tbody>
			<?php
				while ($fila = mysqli_fetch_array($resultado)) {
			?>
			<tr>
				<td><?php echo $fila[1] ?></td>
				<td><?php echo $fila[2] ?></td>
				<td><?php echo $fila[3] ?></td>
				<td align="center">
					<span class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editar"  
						onclick="obtenerDatos('<?php echo $fila[0] ?>')">
						<span class="fas fa-edit"></span>
					</span>
				</td>
				<td align="center">
					<span class="btn btn-danger btn-sm" onclick="eliminarDatos('<?php echo $fila[0] ?>')">
						<span class="fas fa-trash"></span>
					</span>
				</td>
			</tr>
		<?php } ?>
		</tbody>
	</table>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('#tabla1').DataTable();
	});
</script>