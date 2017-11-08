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
		/*$miAgenda = new Agenda();

		//creo contactos
		$miAgenda->crearContacto(1, 'Sergio', 'Chillida', 'Cerezo', 666666666);
		$miAgenda->crearContacto(2, 'Jose', 'Garcia', 'Cerezo', 666666666);
		$miAgenda->crearContacto(3, 'Pablo', 'Fernandez', 'Cerezo', 666666666);

		//mostrar contactos
		echo 'Los contactos son<br>' .$miAgenda. '<br>';

		//eliminar primer contacto
		$miAgenda->eliminarContactos(1);

		//mostrar contactos
		echo 'Los contactos son<br>' .$miAgenda;*/

	?>

	<form method="POST" action="nuevocontacto.php">
		<label for="nombre">Nombre: </label>
			<input type="text" name="nombre">
		<label for="apellidouno">Apellido 1: </label>
			<input type="text" name="apellidouno">
		<label for="apellidodos">Apellido 2: </label>
			<input type="text" name="apellidodos">
		<label for="telefono">Telefono: </label>
			<input type="text" name="telefono">
			<input type="submit">
	</form><br><br>
	<table>
		<tr> 
			<th>Nombre</th>
			<th>Apellido 1</th>
			<th>Apellido 2</th>
			<th>Teléfono</th>
			<th>Acción</th>
		</tr>
	
			<?php

				$conexion = @new mysqli('localhost', 'agenda', 'agenda', 'agenda');
				$consulta = 'SELECT * FROM contactos;';
				$resultado = $conexion->query($consulta);
				$conexion->close();

				

				if($resultado->num_rows > 0){

					$contactos = $resultado->fetch_assoc();
					while($contactos != null){
						echo 	'<tr> 
									<td>' .$contactos['nombre'].'</td> 
									<td>' .$contactos['apellidouno']. '</td> 
									<td>' .$contactos['apellidodos']. '</td>
									<td>' .$contactos['telefono']. '</td>
									<td><a href="/borrarcontacto.php?idcontacto="' .$contactos['id']. '">Borrar Contacto</a></td>
								</tr>';
						$contactos = $resultado->fetch_assoc();
					}
					$resultado->free();

				}else if($resultado->num_rows == 0){

					echo 'No existen contactos en la agenda';

				}
			?>
	</table>
</body>
</html>