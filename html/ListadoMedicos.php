<?php

//html
?>


<!DOCTYPE html>
<html>
<head>
	<title>Nuestros Profesionales</title>
</head>
<body>

	<h1>Nuestros Profesionales</h1>


	<table>
		<tr><th>Nombre</th><th>Especialidad</th><th></th></tr>

		<?php foreach($this->medicos as $m) { ?>
		<tr><td><?= $m['nom_medico'] ?> <?= $m['ape_medico'] ?></td> <td><?= $m['especialidad'] ?></td><td><a href="SacarTurnoConMedico.php?id=<?= $m['dni'] ?>">Sacar Turno</a></td></tr>
		<?php } ?>

	</table>
	<a href="./menuPrincipalPaciente.php"><button>Volver</button></a>
</body>
</html>

