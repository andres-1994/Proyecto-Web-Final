<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	<title></title>
</head>
<body>
</body>
</html>
<?php 

	include('conexion.php');

	function proteger_campo($campo){

		$campo = trim($campo);

		$campo = addslashes($campo);

		$campo = htmlspecialchars($campo);

		$campo = strtolower($campo);

		$campo = ucwords($campo);

		return $campo;
	}

	$id = $_POST['id'];

	$nombre = proteger_campo($_POST["nombre"]);

	$apellido = proteger_campo($_POST["apellido"]);

	$telefono = proteger_campo($_POST["telefono"]);

	$correo = strtolower($_POST["correo"]);

	$direccion = proteger_campo($_POST["direccion"]);

	$fecha = $_POST["fecha"];

	$actualizar = " UPDATE datos_usuarios SET nombre='$nombre', apellido='$apellido', telefono='$telefono', correo='$correo', direccion='$direccion', fecha_nacimiento='$fecha' WHERE id='$id' ";

	$resultado = mysqli_query($conexion, $actualizar);

	if($resultado){
		echo "<script>
				Swal.fire({
					icon: 'success',
					title: 'Empleado editado con exito',
					showConfirmButton: false,
					timer:1200,
					}).then(function(){
					window.location.href='../form_mostrar_personal';
					});
		</script>";
	}else{
		echo "<script>
				Swal.fire({
					icon: 'error',
					title: 'No se pudo modificar registro',
					showConfirmButton: false,
					timer:1200,
					}).then(function(){
					window.location.href='../form_modifica_personal';
					});
		</script>";
	}

	
