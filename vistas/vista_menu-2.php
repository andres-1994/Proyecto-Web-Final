<?php 

	if(!isset($_SESSION["usuario"])){

		header("Location:form_login.php");
	} 
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<title>Menu Principal</title>
</head>
<body>
	<header>
		<input type="checkbox" id="btn-menu">
		<label for="btn-menu"><i class="fas fa-bars"></i></label>
		<nav class="menu">
			<ul>
				<li><a href="../form_mostrar_personal"><i class="fas fa-home"></i> Inicio</a></li>
				<li><a href="#">
					<?php 
					date_default_timezone_set('America/Asuncion');

					$dias = array("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado");

					$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

					$hora = date('H:i');

					echo "Fecha: " . $dias[date('w')]. " " .date('d'). " de " . $meses[date('n')-1] . " Año " . date('Y') . " Hora: " . $hora ;
					?>	
				</a>
			</li>
			<li><a target="blank" href="vistas/reportes.php"><i class="far fa-file-pdf"></i> Reporte</a></li>
			<li><a href="#"><?php echo "<i class='fas fa-user'></i> usuario: " . $_SESSION["usuario"]; ?></a></li>
			<li><a href="../controladores/cerrar_login.php"><i class="fad fa-sign-out-alt"></i> Cerrar Sesión</a></li>
		</ul>
	</nav>
</header>
</body>
</html>