<?php 

	include("conexion.php");

	$id = $_GET['id'];

	/*$query = "DELETE FROM datos_usuarios WHERE id = '$id'";*/
	$query = "UPDATE datos_usuarios SET estado ='inactivo' WHERE id = '$id'";

	$resultado = mysqli_query($conexion, $query);

	if ($resultado) {
		
		echo "<script>alert('Registro Eliminado Correctamente');
		 window.location='../form_mostrar_personal.php'</script>";

	}else{

		echo "<script>alert('No se pudo Eliminar Registro intente de nuevo'); window.location='../form_mostrar_personal.php'</script>";

	}