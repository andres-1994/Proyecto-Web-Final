<?php 

$servidor = "localhost";

$usuario = "root";

$contrasena = "";

$db_name = "formulario-php";

$conexion = mysqli_connect("$servidor", "$usuario", "$contrasena", "$db_name");

/* verificar la conexión */
if (mysqli_connect_errno()) {

    printf("Falló la conexión: %s\n", mysqli_connect_error());

    exit();
}

mysqli_set_charset($conexion, "utf8");

if (!mysqli_set_charset($conexion, "utf8")) {

    printf("Error cargando el conjunto de caracteres utf8: %s\n", mysqli_error($conexion));

    exit();
}





