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

	error_reporting(E_ERROR | E_WARNING | E_PARSE); 

	session_start();

	include("conexion.php");

	$usuario = $_POST['usuario'];

	$contrasena = $_POST['contrasena']; 

	/*$query = " SELECT * FROM usuarios_login WHERE usuario = '$usuario' AND contrasena = '$contrasena' ";*/

	$query = " SELECT * FROM usuarios_login WHERE usuario = '$usuario' ";

	$resultado = mysqli_query($conexion, $query);

	$filas = mysqli_num_rows($resultado);

	$array = mysqli_fetch_array($resultado, MYSQLI_ASSOC);

	$hash = $array['contrasena'];

	if ($filas > 0 && $array['rol'] == 'admin' && password_verify($contrasena, $hash) && $_SESSION['captcha'] == $_POST['captcha']){

		$_SESSION["usuario"] = $_POST["usuario"];

		echo"<script>
			Swal.fire({
				icon: 'success',
				title: 'Bienvenido al sistema $usuario',
				showConfirmButton: false,
				timer:1200,
				}).then(function(){
					window.location.href='../form_mostrar_personal';
					});
		</script>";

	} else if ($filas > 0 && $array['rol'] == 'data_entry' && password_verify($contrasena, $hash) && $_SESSION['captcha'] == $_POST['captcha']){

		$_SESSION["usuario"] = $_POST["usuario"];

		echo"<script>
			Swal.fire({
				icon: 'success',
				title: 'Bienvenido al sistema $usuario',
				showConfirmButton: false,
				timer:1100
				}).then(function(){
					window.location.href='../form_data_entry';
					});
		</script>";

	}else if($_SESSION['captcha'] != $_POST['captcha']){
			echo"<script>
			Swal.fire({
				icon: 'error',
				title: 'Error: Captcha invalido, intente de nuevo',
				showConfirmButton: false,
				timer:1100
				}).then(function(){
					window.location.href='../form_login';
					});
		</script>";
	} 
	else {
		echo"<script>
			Swal.fire({
				icon: 'error',
				title: 'Error: Contraseña y/o Usuario no valido',
				showConfirmButton: false,
				timer:1100
				}).then(function(){
					window.location.href='../form_login';
					});
		</script>";
	}

mysqli_free_result($resultado);
mysqli_close($conexion);


/*if($filas > 0){
	$_SESSION["usuario"]=$_POST["usuario"];
	echo"<script>
		Swal.fire({
			icon: 'success',
			title: 'Bienvenido al sistema $usuario',
			showConfirmButton: false,
			timer:1800,
			}).then(function(){
				window.location.href='../form_mostrar_personal';
				});
	</script>";
}else{
	echo"<script>
		Swal.fire({
			icon: 'error',
			title: 'Error: Contraseña y/o Usuario no valido',
			showConfirmButton: false,
			timer:1800,
			}).then(function(){
				window.location.href='../form_login';
				});
	</script>";
}*/



