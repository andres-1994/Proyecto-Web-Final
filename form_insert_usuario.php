<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/form_insert_user.css">
	<title>Formulario insertar Usuarios</title>
</head>
<body>
	<form action="controladores/insertar_usuario" method="post" class="form-register" autocomplete="off">
		<h2 class="form__titulo">Crear una Cuenta Teisa</h2>
		<div class="contenedor-inputs">
			<input type="text" name="nombre" id="nombre" class="input-100" placeholder="Ingrese su Nombre y Apellido" required>
			<input type="text" name="usuario" id="usuario" class="input-100" placeholder="Ingrese un Nombre de Usuario" required>
			<input type="password" name="password" id="" class="input-48" placeholder="Ingrese una contraseña" required>
			<input type="password" name="password2" id="" class="input-48" placeholder="Repita su contraseña" required>
			<label for="checkbox" class="input-100">Acepto Términos & Condiciones <input type="checkbox" id="checkbox" name="checkbox"></label>
			<input type="submit" name="registar" class="btn_enviar input-48" value="Registrar!">
			<input type="reset" class="btn_reset input-48" value="Limpiar!">
			<p class="form__link">Ya tienes una cuenta? <a href="form_login">Inicia Sesión</a></p>
		</div>
	</form>
</body>
</html>
