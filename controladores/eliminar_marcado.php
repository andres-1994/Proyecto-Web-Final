<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	<title>Document</title>
</head>
<body>
	
</body>
</html>
<?php 
	
	include("conexion.php");

	if(isset($_POST['eliminar-marcado'])){
		if(empty($_POST['eliminar'])){
			echo "<script>
					Swal.fire({
						icon: 'error',
						title: 'No hay registros seleccionados',
						showConfirmButton: false,
						timer:1500,
						}).then(function(){
							window.location.href='../form_mostrar_personal';
							});
				</script>"; 
		}else{
			foreach ($_POST['eliminar'] as $id) {
				
				$query = "DELETE FROM datos_usuarios WHERE id = '$id'";

				$resultado = mysqli_query($conexion, $query);

				if($resultado){

				echo "<script>
					Swal.fire({
						icon: 'success',
						title: 'Registros eliminados con exito!',
						showConfirmButton: false,
						timer:1500,
						}).then(function(){
							window.location.href='../form_mostrar_personal';
							});
				</script>";
				}
			}
		}
	}
?>