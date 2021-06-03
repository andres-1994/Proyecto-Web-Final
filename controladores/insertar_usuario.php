<?php 

include('conexion.php');

function proteger_campo($campo){

	$campo = trim($campo);
	$campo = addslashes($campo);
	$campo = htmlspecialchars($campo);
	return $campo;
}

$nombre = proteger_campo($_POST['nombre']);

$usuario = proteger_campo($_POST['usuario']);

$password = $_POST['password'];

$password2 = $_POST['password2'];

$pass_cifrado = password_hash($password, PASSWORD_DEFAULT, array("cost"=>12));

if(isset($_POST['registar'])){

	$query_usuario = 'SELECT * FROM usuarios_login WHERE usuario = "$usuario"';

	$resultado_usuario = mysqli_query($conexion, $query_usuario);

	$resultado_total = mysqli_num_rows($resultado_usuario);

	if($resultado_total ==1){
		echo "<script>
			alert('Error: Este Usuario ya existe en la BD');
			window.location.href='../form_insert_usuario'
		</script>";
	}else if($password != $password2){
		echo "<script>
			alert('Error: Las contraseñas deben coincidir');
			window.location.href='../form_insert_usuario'
		</script>";
	}else if(strlen($password) < 6){
		echo "<script>
			alert('Error: La contraseña tiene que tener minimo 6 caracteres');
			window.location.href='../form_insert_usuario';
		</script>";
	}else if(empty($_POST['checkbox'])){
		echo "<script>
			alert('Error: $usuario Acepta las condiciones');
			window.location.href='../form_insert_usuario';
		</script>";
	}else if(!preg_match('`[A-Z]`', $password)){
		echo "<script>alert('Error: debes eligir un caracter en mayuscula para la contraseña');
			window.location.href='../form_insert_usuario';
		</script>";
	}
	else{
		$sql = "INSERT INTO usuarios_login (nombre, usuario, contrasena) VALUES ('$nombre', '$usuario', '$pass_cifrado')";
		$resultado = mysqli_query($conexion, $sql);
		if($resultado){
			echo "<script>
				alert('OK:Usuario $usuario agregado con exito');
				window.location.href='../form_login';
			</script>";
		}else{
			echo "<script>
				alert('Error: No se pudo insertar usuario');
				window.location.href='../form_insert_usuario';
			</script>";
		}
	}
}
?>
