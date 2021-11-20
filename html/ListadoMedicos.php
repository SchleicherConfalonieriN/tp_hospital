<?php

//html
?>


<!DOCTYPE html>
<html>
<head>
	<title>Nuestros Profesionales</title>
	<link rel="stylesheet" type="text/css" href="../css/fondo.css">
	<link rel="stylesheet" type="text/css" href="../css/paciente.css">
</head>
<body>
<div id="app_list">
	<h1>Nuestros Profesionales</h1>

<div id="lista_medico"></div>
	<table>
		<tr><th>Nombre</th><th>Especialidad</th><th>Horario</th><th></th></tr>

		<?php foreach($this->medicos as $m) { ?>
		<tr><td><?= $m['nom_medico'] ?> <?= $m['ape_medico'] ?></td> <td><?= $m['especialidad'] ?></td> <td><?php if($m['horario']=='t') echo htmlentities(("Tarde")); else echo htmlentities(('Mañana')); ?></td><td><a href="SacarTurnoConMedico.php?id=<?= $m['dni'] ?>">Sacar Turno</a></td></tr>
		<?php } ?>

	</table>
	<a href="./MenuPrincipalPaciente.php"><button>Volver</button></a>
</div>
</body>
</html>

