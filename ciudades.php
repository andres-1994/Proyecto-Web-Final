<?php 
$conexion=mysqli_connect('localhost','root','','formulario-php');

$ciudades=$_POST['ciudades'];

	$sql="SELECT id,id_departamento,ciudad from ciudades where id_departamento='$ciudades'";

	$result=mysqli_query($conexion,$sql);

	$cadena="<label></label> 
			<select class='form-control' id='lista2' name='lista2'>";

	while ($ver=mysqli_fetch_row($result)) {
		$cadena=$cadena.'<option value='.$ver[0].'>'.utf8_encode($ver[2]).'</option>';
	}

	echo  $cadena."</select>";
	

?>