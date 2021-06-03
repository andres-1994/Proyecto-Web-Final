<?php 

	include('controladores/conexion.php');

	session_start();

	if(!isset($_SESSION["usuario"])){

		header("Location:form_login.php");
	}

	$id = base64_decode($_GET['id']);

	$query = "SELECT * FROM datos_usuarios WHERE id = '$id'";

	$resultado = mysqli_query($conexion, $query);

	$row = mysqli_fetch_assoc($resultado);

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<link rel="stylesheet" href="css/formulario.css">
	<link rel="stylesheet" href="css/estilos.css">
	<title>Modificar Empleado</title>
	<style>
		a{
			text-decoration: none;
		}
	</style>
</head>
<body>
	<form action="controladores/editar_personal.php " method="post" class="form-register" autocomplete="off">
		<h1 class="form__title">Formulario Modicar Personal Teisa</h1>
		<div class="container--flex">
			<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
			<label for="nombre" class="form__label">Nombre</label>
			<input type="text" id="nombre" name="nombre" class="form-control form__input" value="<?php echo $row['nombre']; ?>" required autofocus>
			<label for="apellido" class="form__label">Apellido</label>
			<input type="text" id="apellido" name="apellido" class="form-control form__input" value="<?php echo $row['apellido']; ?>" required>
		</div>
		<div class="container--flex">
			<label for="telefono" class="form__label">Teléfono</label>
			<input type="text" id="telefono" name="telefono" class="form-control form__input" value="<?php echo $row['telefono']; ?>" required>
			<label for="correo" class="form__label">Correo</label>
			<input type="email" id="correo" name="correo" class="form-control form__input" value="<?php echo $row['correo']; ?>" required>
		</div>
		<div class="container--flex">
			<label for="direccion" class="form__label">Dirección</label>
			<input type="text" id="direccion" name="direccion" class="form-control form__input" value="<?php echo $row['direccion']; ?>" required>
		</div>
		<div class="container--flex">
			<label for="fecha" class="form__label">Fecha Nacimiento</label>
			<input type="date" id="fecha" name="fecha" class="form-control form__input" value="<?php echo $row['fecha_nacimiento']; ?>" required>
		</div>
		<div class="container--flex">
			<label for="archivo">Foto</label>
			<input type="file" id="archivo" name="archivo" class="form-control form__file">
		</div>
		<div class="container--flex">
			<input type="submit" name="modificar" value="Modificar" class="btn btn-primary form__submit">
			<button type="button" class="btn btn-warning form__reset">
				<a class="text-white" href="form_mostrar_personal">Volver</a>
			</button>
		</div>
	</form>
</body>
</html>