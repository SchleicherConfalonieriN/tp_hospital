<?php
//html
?>

<!DOCTYPE html>
<html>
<head>
	<title>Consulta de Turnos</title>
	<link rel="stylesheet" type="text/css" href="../css/fondo.css">
	<link rel="stylesheet" type="text/css" href="../css/estilosvarios.css">
</head>
<body>
	<h1>Próximos turnos para: <?= htmlentities($this->usuario['nombre'])?> <?= htmlentities($this->usuario['apellido'])?></h1>
	<br/>
	<table>
		<tr><th>Fecha</th><th>Hora</th><th>Profesional</th><th>Consultorio</th><th></th></tr>
		<?php foreach($this->turnos as $t) { ?>
		<tr>
		<td><?= htmlentities(date("d-m-Y", strtotime($t['fecha'])))?></td> 
		<td><?= htmlentities(date("H:i", strtotime($t['hora'])))?></td>
		<td><?= htmlentities($t['nombre']) ?> <?= htmlentities($t['apellido']) ?></td><td><?= htmlentities($t['consultorio']) ?></td>
		<td><a href="./ConfirmarAnulacionTurno.php?id=<?= htmlentities($t['turno_id']) ?>">Anular Turno</a></td></tr>
		<?php } ?>
	</table>

	<h1>Próximos estudios para: <?= htmlentities($this->usuario['nombre'])?> <?= htmlentities($this->usuario['apellido'])?></h1>
	<br/>
	<table>
		<tr><th>Fecha</th><th>Hora</th><th>Estudio</th><th></th></tr>
		<?php foreach($this->estudios as $e) { ?>
		<tr>
		<td><?= htmlentities(date("d-m-Y", strtotime($e['fecha'])))?></td>
		<td><?= htmlentities(date("H:i", strtotime($e['hora'])))?></td>
		<td><?= htmlentities($e['nom_estudio']) ?></td>
		<td><a href="./ConfirmarAnulacionEstudio.php?id=<?= htmlentities($e['turno_id']) ?>">Anular Turno</a></td></tr>
		<?php } ?>
	</table>
	<div>
		<a href="./CerrarSesion.php"><button>Cerrar Sesión</button></a></br>
		<a href='./MenuPrincipalAdministracion.php'><button>Volver al Menú Principal</button></a>
	</div>
</body>
</html>
