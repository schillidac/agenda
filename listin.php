<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Listin</title>
</head>
<body>
	<?php
		$contactosPagina = 3;

		$conexion = new mysqli('localhost','agenda','agenda','agenda');
		$consulta = 'SELECT count(*) FROM contactos;';
		$cantidad = $conexion->query($consulta);
		$cantidad = $cantidad->fetch_row();

		if($cantidad[0] == 0){
			echo 'No existe ningún contacto en la agenda';
		}
		else{
			echo 'Tienes ' .$cantidad[0]. ' contactos en la agenda';
		}

	?>
	<table>
	<tr> 
		<th>Nombre</th>
		<th>Apellido 1</th>
		<th>Apellido 2</th>
		<th>Teléfono</th>
	</tr>
		<?php
			$consulta = 'SELECT * FROM contactos ORDER BY nombre ASC LIMIT 3;';
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
							</tr>';
					$contactos = $resultado->fetch_assoc();
				}
				$resultado->free();

			}else if($resultado->num_rows == 0){

				echo 'No existen contactos en la agenda';

			}


			//calculas páginas totales
			$total = $cantidad[0]/$contactosPagina;

			echo '<br>Hay un total de ' .$total. ' de contactos';

			for($i = 0;$i <= $total;$i++)
				echo '<a href="/listin.php?page=' .($i+1). '">' .($i+1). '</a>';


		?>
	</table>
</body>
</html>