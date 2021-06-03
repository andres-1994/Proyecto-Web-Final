<?php
	include('controladores/conexion.php');

	session_start();

	if(!isset($_SESSION["usuario"])){

		header("Location:form_login");
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="refresh" content="40">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css"/>
	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css"/>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.dataTables.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;1,100&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/vista_menu.css">
	<title>Mostrar Datos Personal</title>
	<style>
		table>tbody>tr>td{
			vertical-align: middle !important;
			text-align: center !important;
		}
		table .fa-trash-alt{
			color: red;
		}
		table thead tr{
			background: blue;
			color: white;
			text-align: center;
		}
		table.dataTable thead .sorting,
		table.dataTable thead .sorting_asc,
		table.dataTable thead .sorting_desc {
			background: none;
		}
		@media screen and (max-width: 767px) {
			li.paginate_button.previous {
				display: inline;
			}

			li.paginate_button.next {
				display: inline;
			}

			li.paginate_button {
				display: none;
			}
		}
		.alert{
			position: fixed;
			width: 100%;
			top: 0;
			left: 0;
			margin: 0;
			padding: 0.8rem;
			color: white;
			text-align: center;
			z-index: 1 !important;
			transform: translateY(-100%);
		}
		.alert--online{
			background-color: rgba(0, 255, 0, 0.8);
			animation: reveal 6s ease;
		}
		.alert--offline{
			background-color: rgba(255, 0, 0, 0.8);
			animation: reveal 6s ease;
		}
		@keyframes reveal {
			0% {
				transform: translateY(-100%);
			}
			15%,
			85% {
				transform: translateY(0);
			}
		}
	</style>
</head>
<body>	
	<div class="col-md-12">
		<p id="alert" class="alert">Error de Conexion: Sin Internet!</p>
		<?php include("vistas/vista_menu.php");?>
		<h1 class="text-center mt-1">Teisa Comerciales & Soporte CAC</h1>
		<div class="card">
			<div class="card-header">
				<?php include("controladores/scripts.php") ?>
			</div>
			<div class="card-body">
				<form action="controladores/eliminar_marcado.php" method="POST">
					<div>
						<button type="button" class="mt-1 mb-1 btn btn-primary"><a class="text-white" href="form_insert_personal"><i class="fas fa-plus"></i> Agregar Nuevo</a></button>
						<button type="submit" name="eliminar-marcado" class="mt-1 mb-1 btn btn-danger" onclick="reload()"><a class="text-white"><i class="fas fa-trash-alt"></i> Eliminar Marcado</a></button>
					</div>
					<table id="mi-tabla" class="table table-striped table-bordered table-hover  border-primary display nowrap" cellspacing="0" style="width:100%">
						<thead>
							<tr>
								<th></th>
								<th></th>
								<th>Código</th>
								<th>CI/DNI</th>
								<th>Nombre</th>
								<th>Apellido</th>
								<th>Teléfono</th>
								<th>Dirección</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$query = "CALL mostrar_usuarios()";
							$resultado = mysqli_query($conexion, $query);
							while($row = mysqli_fetch_assoc($resultado)){
								?>
								<tr>
									<td></td>
									<td>
										<a href="vistas/datos_completos?id=<?php echo base64_encode($row['id']); ?>" title="Ver ficha completa" style="font-size: 25px;">
											<i class="fas fa-plus-circle"></i>
										</a>
									</td>
									<td><?php echo $row['codigo']; ?></td>
									<td><?php echo number_format($row['ci'],0,'','.'); ?></td>
									<td><?php echo $row['nombre']; ?></td>
									<td><?php echo $row['apellido']; ?></td>
									<td><?php echo $row['telefono']; ?></td>
									<td><?php echo $row['direccion']; ?></td>
									<td>
										<a title='Editar Empleado' href="form_modifica_personal?id=<?php echo base64_encode($row['id']); ?>">
											<i class="fas fa-edit"></i>
										</a><br>
										<a title='Eliminar Empleado' class="link-operacion" href="controladores/eliminar_personal?id=<?php echo $row['id']; ?>">
											<i class="fas fa-trash-alt"></i>
										</a><br>
										<input type="checkbox" name="eliminar[]" value="<?php echo $row['id'];?>">	 
									</td>
								</tr>
							<?php  } mysqli_free_result($resultado); ?>
						</tbody>	
					</table>
				</form>
			</div>
			<div class="card-footer text-primary text-center">
				<?php $identificador = getenv("HTTP_USER_AGENT"); echo $identificador; ?>
			</div>
		</div>
	</div>		
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
	<script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
	<script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
	<script src="javascript/scripts.js"></script>	
</body>
</html>


		