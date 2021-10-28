<?php
//html
?>

<!DOCTYPE html>
<html>
<head>
	<title>Menú Principal</title>
</head>
<body>
<h1>Hola <?= $this->usuario['nombre']?> <?= $this->usuario['apellido']?></h1>
<br/>
	<table>
		<tr><th>Fecha</th><th>Hora</th><th>Profesional</th><th>Consultorio</th><th></th></tr>

		<?php foreach($this->turnos as $t) { ?>
		<tr><td><?= date("d-m-Y", strtotime($t['fecha']))?></td> <td><?= date("H:i", strtotime($t['hora']))?></td><td><?= $t['nombre'] ?> <?= $t['apellido'] ?></td><td><?= $t['consultorio'] ?></td><td><a href="./AnularTurnoPaciente.php?id=<?= $t['turno_id'] ?>">Anular Turno</a></td></tr>
		<?php } ?>

	</table>
<a href="./CerrarSesion.php"><button>Cerrar Sesión</button></a>
<a href="./ListadoMedicos.php"><button>Pedir Turno</button></a>
</body>
</html>
