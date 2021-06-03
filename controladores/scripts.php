<?php 
	
	/*echo "<b>Bienvenido Usuario: " . $_SESSION["usuario"] . " ! " . "<br></b>";*/
	
	$consulta = "SELECT * FROM datos_usuarios";

	$resultado = mysqli_query($conexion, $consulta);

	$total = mysqli_num_rows($resultado);

	echo "<b> Total de Empleados: ".$total." <br></b>";
 

	$consulta = "SELECT id, nombre, apellido FROM datos_usuarios ORDER BY id ASC LIMIT 1";

	$resultado = mysqli_query($conexion, $consulta);

	$row = mysqli_fetch_assoc($resultado);

	do{
		echo '<b>Primer Empleado ingresado: ' . $row['id']. ' - '. $row['nombre'].' - '. $row['apellido'].'</b><br>';

	}while($rows = $row = mysqli_fetch_array($resultado));

 

	$consulta = "SELECT id, nombre, apellido FROM datos_usuarios ORDER BY id DESC LIMIT 1";

	$resultado = mysqli_query($conexion, $consulta);

	$row = mysqli_fetch_assoc($resultado);

	do{
		echo '<b>Ultimo Empleado Ingresado: ' . $row['id']. ' - '. $row['nombre']. ' - '. $row['apellido']. '</b></br>';

	}while($rows = $row = mysqli_fetch_array($resultado));



	/*date_default_timezone_set('America/Asuncion');

	$dias = array("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado");

	$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

	$hora = date('H:i');

	echo "<b>Fecha: " . $dias[date('w')]. " " .date('d'). " de " . $meses[date('n')-1] . " del año " . date('Y') . " Hora: " . $hora . "</b>" ;*/

?>