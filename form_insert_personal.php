<?php 

session_start();

if(!isset($_SESSION["usuario"])){

	header("Location:form_login.php");
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="css/formulario.css">
	<link rel="stylesheet" href="css/estilos.css">
	<title>Formulario Insertar Nuevo</title>
</head>
<body>
	<form action="controladores/insertar.php" method="post" class="form-register" enctype="multipart/form-data" autocomplete="off">
		<div class="container--flex">
			<label for="ci" class="form__label">C.Identidad / DNI</label>
			<input type="text" id="ci" name="ci" class="form-control form__input" placeholder="Ingrese su CI y/o DNI" required>
		</div>
		<div class="container--flex">
			<label for="nombre" class="form__label">Nombre</label>
			<input type="text" id="nombre" name="nombre" class="form-control form__input" placeholder="Ingrese su nombre" required>
			<label for="apellido" class="form__label">Apellido</label>
			<input type="text" id="apellido" name="apellido" class="form-control form__input" placeholder="Ingrese su apellido" required>
		</div>
		<div class="container--flex">
			<label for="telefono" class="form__label">Teléfono</label>
			<input type="number" id="telefono" name="telefono" class="form-control form__input" placeholder="📱 Ingrese su teléfono" required>
			<label for="correo" class="form__label">Correo</label>
			<input type="email" id="correo" name="correo" class="form-control form__input" placeholder="✉ Ingrese su correo" required>
		</div>
		<div class="container--flex">
			<label for="direccion" class="form__label">Dirección</label>
			<input type="text" id="direccion" name="direccion" class="form-control form__input" placeholder="Ingrese su direccion" required>
		</div>
		<div class="container--flex">
			<label for="fecha" class="form__label">Fecha Nacimiento</label>
			<input type="date" id="fecha" name="fecha" class="form-control form__input" required>
		</div>
		<div class="container--flex">
			<label for="archivo">Foto</label>
			<input type="file" id="archivo" name="archivo" class="form-control form__file" onchange="return fileValidation()" required>
		</div>
		<div id="load-bar" class="load-bar"></div>
		<div class="container--flex">
			<button type="submit" name="enviar" id="enviar" class="btn btn-primary form__submit text-white">Registrar</button>
			<input type="reset" value="Limpiar" class="btn btn-warning form__reset text-white">
		</div>
		<div class="container--flex">
			<a href="form_mostrar_personal" class="text-info">Volver</a>
		</div>
	</form>
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="javascript/script_nombres.js"></script>
	<script src="javascript/load-bar.js"></script>
</body>
</html>