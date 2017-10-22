<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
		
		require_once('inc/agenda.inc.php');

		//creo objeto agenda
		$miAgenda = new Agenda();

		//creo contactos
		$miAgenda->crearContacto(1, 'Sergio', 'Chillida', 'Cerezo', 666666666);
		$miAgenda->crearContacto(2, 'Jose', 'Garcia', 'Cerezo', 666666666);
		$miAgenda->crearContacto(3, 'Pablo', 'Fernandez', 'Cerezo', 666666666);

		//mostrar contactos
		echo 'Los contactos son<br>' .$miAgenda. '<br>';

		//eliminar primer contacto
		$miAgenda->eliminarContactos(1);

		//mostrar contactos
		echo 'Los contactos son<br>' .$miAgenda;



	?>
</body>
</html>