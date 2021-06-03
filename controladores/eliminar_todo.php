<?php 

include('conexion.php');

$boton_eliminar = $_POST['eliminar-todo'];

$eliminar = "TRUNCATE TABLE datos_usuarios";

$resultado = mysqli_query($conexion, $eliminar);

if($resultado){
	echo "<script>alert('Se a eliminado todos los registros de manera exitosa'); window.location='../form_mostrar_personal.php'</script>";
}else{
	printf("Errormessage: %s\n", mysqli_error($conexion));
}

mysqli_close($conexion);
