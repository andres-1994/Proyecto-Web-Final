
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/form_login.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;1,300&display=swap" rel="stylesheet"> 
	<title>Janik CRM</title>
</head>
<body>
	<div class="contenedor">
		<form action="controladores/comprueba_login" method="POST" autocomplete="off">
			<h2 class="titulo_sesion">Formulario Iniciar Sesión</h2>
			<input type="text" name="usuario" id="usuario" class="caja-input" placeholder="&#128100; ingrese usuario" required>
			<input type="password" name="contrasena" id="contrasena" class="caja-input" placeholder="&#128272; ingrese contraseña" required>
			<img src="controladores/captcha.php" alt="" class="caja-captcha">
			<input type="password" name="captcha" class="caja-input" placeholder="&#128272; ingrese captcha" required>
			<button type="submit" name="ingresar" id="ingresar">Ingresar</button>
		</form>
		<a href="form_insert_usuario">
			<button>Crear una Cuenta</button>
		</a>
	</div>
	
</body>
</html>         