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

$inicio = session_start();

$cerrar = session_destroy();

if ($cerrar == true) {
	echo"<script>
		Swal.fire({
			icon: 'info',
			title: 'Cerrando la sesion del usuario',
			showConfirmButton: false,
			timer:1500,
			}).then(function(){
				window.location.href='../form_login';
			});
	</script>";
}


	