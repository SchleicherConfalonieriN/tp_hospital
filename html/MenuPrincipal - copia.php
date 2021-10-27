<?php
//html
?>

<!DOCTYPE html>
<html>
<head>
	<title>Menú Principal</title>
</head>
<body>
<h1>Hola <?php echo $this->usuario->NombreYApellido()?></h1>
<br/>
	<table>
		<tr><th>Fecha</th><th>Hora</th><th>Profesional</th><th>Consultorio</th></tr>

		<?php foreach($this->turnos as $t) {
			$m=new usuario();
			$m->cargarDatos($t['dni_medico']);
			?>
		<tr><td><?= $t['fecha'] ?></td> <td><?= $t['hora'] ?></td><td><?= $m->NombreYApellido() ?></td><td><?= $t['consultorio'] ?></td></tr>
		<?php } ?>

	</table>
<a href="./CerrarSesion.php"><button>Cerrar Sesión</button></a>
</body>
</html>
