<?php

	$nombre = $_POST['nombre'];
	$apellidouno = $_POST['apellidouno'];
	$apellidodos = $_POST['apellidodos'];
	$telefono = $_POST['telefono'];

	$conexion = @new mysqli('localhost', 'agenda', 'agenda', 'agenda');

	$consulta = 'INSERT INTO contactos (nombre, apellidouno, apellidodos, telefono) VALUES ("' .$nombre. '", "' .$apellidouno. '", "' .$apellidodos. '", "' .$telefono. '");';

	$resultado = $conexion->query($consulta);

	if(!$resultado)
		echo 'Error, los datos no se han insertado';
	else
		echo 'Datos corréctamente insertados';

	print_r($resultado);
	echo '<br>Filas afectadas: ' .$conexion->affected_rows;



?>