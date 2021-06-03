<?php 

	session_start();

	include ('../controladores/conexion.php');

	if(!isset($_SESSION['usuario'])){

		header("Location:../form_login.php");
	}

	$id = base64_decode($_GET['id']);

	/*$query = "SELECT * FROM datos_usuarios WHERE id = '$id' ";*/

	/*$query = "Call mostrar_usuarios_completos()";*/

	$query = "SELECT CONCAT(codigo,id) codigo, id, ci, nombre, apellido, telefono, correo, direccion, fecha_nacimiento, TIMESTAMPDIFF(YEAR,fecha_nacimiento,CURDATE()) AS edad, fecha_ingreso, estado, archivo FROM datos_usuarios ORDER BY id = '$id' DESC";

	$resultado = mysqli_query($conexion, $query);

	$row = mysqli_fetch_assoc($resultado);
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css"/>
	<link rel="stylesheet" href="../css/vista_menu.css">
	<title>Mostrando datos completos</title>
	<style>
		table>tbody>tr>td{
			vertical-align: middle !important;
			text-align: center !important;
		}
		table>thead>tr{
			background: blue;
			color: white;
			text-align: center;
		}
		table td{
			font-size: 15px !important;
		}

		table tr{
			font-size: 14px !important;
		}
		table .fa-trash-alt{
			color: red;
		}
	</style>
</head>
<body>
	<div class="col-md-12">
		<?php include("vista_menu-2.php"); ?>
		<div class="card mt-5">
			<div class="card-header">
				<p>Ficha Completa Empleado.</p>
			</div>
			<div class="card-body">
				<table id="mi-tabla" class="table table-striped table-bordered display">
			<thead>
				<tr>
					<th>Codigo</th>
					<th>Id</th>
					<th>CI / DNI</th>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Direccion</th>
					<th>Teléfono</th>
					<th>Correo</th>
					<th>Fecha Nto</th>
					<th>Edad</th>
					<th>Fecha de Ingreso</th>
					<th>Estado</th>
					<th>Archivo</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><?php echo $row['codigo']; ?></td>
					<td><?php echo $row['id']; ?></td>
					<td><?php echo number_format($row['ci'],0,'','.'); ?></td>
					<td><?php echo $row['nombre']; ?></td>
					<td><?php echo $row['apellido']; ?></td>
					<td><?php echo $row['direccion']; ?></td>
					<td><?php echo $row['telefono']; ?></td>
					<td><?php echo $row['correo']; ?></td>
					<td><?php echo $row['fecha_nacimiento']; ?></td>
					<td><?php echo $row['edad'];?></td>
					<td><?php echo $row['fecha_ingreso']?></td>
					<td><?php echo $row['estado']?></td>
					<td><?php echo '<img src="'.$row["archivo"].'" title="'.$row["nombre"].'" width="100" heigth="400">'?></td>
				</tr>
			</tbody>		
		</table>
			</div>
			<div class="card-footer text-primary text-center">
				<?php $identificador = getenv("HTTP_USER_AGENT"); echo $identificador; ?>
			</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
	<script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			var t = $('#mi-tabla').DataTable({
				"responsive":true,
				"ordering": false,
				"dom": 'B',
				"createdRow":function(row,data,index){
					if(data[9]>45){
						$('td',row).eq(9).css({
							'background-color':'red',
							'color':'white'
						});
					}
				}
			});
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
			var tabla = $('#mi-tabla').DataTable();

			$('#mi-tabla tbody').on( 'click', 'tr', function () {
				$(this).toggleClass('selected');
			});

			$('#button').click( function (){
				alert( table.rows('.selected').data().length +' row(s) selected' );
			});
		});
	</script>
</body>
</html>