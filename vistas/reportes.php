<?php
include('../controladores/conexion.php');

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
	<!-- BOOTSTRAP 5 -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- DATATABLES SU CSS -->
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
	<!-- FONT AWESOME CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/>
	<!-- FUENTE MONSERRAT CSS -->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;1,100&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="../css/vista_menu.css">
	<title>Reportes Completos</title>
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
<div class="container">
	<h1 class="text-center text-primary mt-1">Teisa Comerciales & Soporte CAC</h1>
	<div class="card mt-5">
		<div class="card-header">
			Reportes de Empleados
		</div>
		<div class="card-body">
			<table id="tabla_reporte" class="display" cellspacing="0" style="width:100%">
				<thead>
					<tr>
						<th>Código</th>
						<th>CI/DNI</th>
						<th>Nombre</th>
						<th>Apellido</th>
						<th>Teléfono</th>
						<th>Dirección</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$query = "CALL mostrar_usuarios()";
					$resultado = mysqli_query($conexion, $query);
					while($row = mysqli_fetch_assoc($resultado)){
						?>
						<tr>
							<td><?php echo $row['codigo']; ?></td>
							<td><?php echo number_format($row['ci'],0,'','.'); ?></td>
							<td><?php echo $row['nombre']; ?></td>
							<td><?php echo $row['apellido']; ?></td>
							<td><?php echo $row['telefono']; ?></td>
							<td><?php echo $row['direccion']; ?></td>
						</tr>
					<?php  } mysqli_free_result($resultado); ?>
				</tbody>	
			</table>
		</div>
		<div class="card-footer text-primary text-center">
			<?php $identificador = getenv("HTTP_USER_AGENT"); echo $identificador; ?>
		</div>
	</div>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script>
/*=============================================
  SCRIPT DE DATATABLE
=============================================*/
$(document).ready(function() {

	var t = $('#tabla_reporte').DataTable({
		"ordering": false, 
		"order": [[2, "asc"]],
		"responsive":true,
		/*"dom": 'Blp',*/
		"buttons":[
			{
				extend:    'excelHtml5',
				text:      '<i class="fas fa-file-excel" style="color: green;"></i> ',
				titleAttr: 'Exportar a Excel',
				className: 'btn btn-success'
			},
			{
				extend:    'pdfHtml5',
				text:      '<i class="fas fa-file-pdf" style="color: red;"></i> ',
				titleAttr: 'Exportar a PDF',
				className: 'btn btn-danger'	
			},
			{
				extend:    'print',
				text:      '<i class="fa fa-print" style="color: blue;"></i> ',
				titleAttr: 'Imprimir',
				className: 'btn btn-info'
			}
		],

		"language": {
			"search": "Buscar:",
			"lengthMenu": "Mostrar _MENU_ registros por página",
			"zeroRecords": "No se encontraron resultados",
			"info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
			"infoFiltered": "(filtrado de un total de _MAX_ registros)",
			"infoEmpty": "No hay registros con esos datos",
			"emptyTable": "No existe registros en la tabla",
			"paginate": {
			"first":      "Primero",
			"last":       "Ultimo",
			"next":       "Siguiente",
			"previous":   "Anterior"
			}
		},

		"lengthMenu": [[10, 20, 30, 50, -1], [10, 20, 30, 50, "Todo"]],
		"pagingType": "full_numbers"

		});
	});
/*=====  SCRIPT DE DATATABLES ======*/
</script>
</html>

