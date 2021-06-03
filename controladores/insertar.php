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

error_reporting(0); 

include('conexion.php');

function proteger_campo($campo){

	$campo = trim($campo);

	$campo = addslashes($campo);

	$campo = htmlspecialchars($campo);

	$campo = strtolower($campo);

	$campo = ucwords($campo);

	return $campo;
}

$ci = proteger_campo($_POST["ci"]);

$nombre = proteger_campo($_POST["nombre"]);

$apellido = proteger_campo($_POST["apellido"]);

$telefono = proteger_campo($_POST["telefono"]);  

$correo = htmlspecialchars(addslashes(strtolower($_POST["correo"])));

$direccion = proteger_campo($_POST["direccion"]);

$fecha = $_POST["fecha"];

if ($_FILES["archivo"]){

	$nombre_base = basename($_FILES["archivo"]["name"]);

	$nombre_final = date("d-m-y"). "-" . date("H-i-s"). "-" . $nombre_base;

	$ruta = "../archivos/" . $nombre_final;

	$subirarchivo = move_uploaded_file($_FILES["archivo"]["tmp_name"], $ruta);

	if ($subirarchivo) {
		if(isset($_POST['enviar'])){

			$query_correo = " SELECT * FROM datos_usuarios WHERE correo = '$correo' OR telefono = '$telefono'";

			$resultado_correo = mysqli_query($conexion, $query_correo);

			$resultado_total = mysqli_num_rows($resultado_correo);

			if($resultado_total==0){

				$insertarSQL = "INSERT INTO datos_usuarios(ci, nombre, apellido, telefono, correo, direccion, fecha_nacimiento, archivo) VALUES ('$ci', '$nombre', '$apellido', '$telefono', '$correo', '$direccion', '$fecha', '$ruta')";
				/*$insertar = mysqli_prepare($conexion, "INSERT INTO datos_usuarios(nombre, apellido, telefono, correo, direccion, fecha_nacimiento, archivo) VALUES (?,?,?,?,?,?,?)");
				mysqli_stmt_bind_param($insertar, 'sssssss', $nombre, $apellido, $telefono, $correo, $direccion, $fecha, $ruta);
				mysqli_stmt_execute($insertar);*/

				$resultado = mysqli_query($conexion, $insertarSQL);
				if($resultado){
					echo "<script>
							Swal.fire({
								icon: 'success',
								title: 'Empleado agregado con exito',
								showConfirmButton: false,
								timer:1400,
								}).then(function(){
									window.location.href='../form_mostrar_personal';
									});
						</script>";
				}else{
					printf("Errormessage: %s\n", mysqli_error($conexion));
				}
			}else{				
				echo "<script>alert('Error: Correo y/o numero telefonico ya existente en la Base de datos');window.location='../form_insert_personal'; </script>";
			}
		}
	}	
}else{
	echo "Error al subir el archivo";
}

mysqli_free_result($resultado);

mysqli_close($conexion);
