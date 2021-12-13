<?php

//html
?>


<!DOCTYPE html>
<html>
<head>
	<title>Nuestros Profesionales</title>
	<link rel="stylesheet" type="text/css" href="../css/fondo.css">
	<link rel="stylesheet" type="text/css" href="../css/admin.css">
	<link rel="stylesheet" type="text/css" href="../css/estilosvarios.css">
</head>
<body>
	<h1>Nuestros Profesionales</h1>

	<table>
		<tr><th>Nombre</th><th>Especialidad</th><th>Horario</th><th></th></tr>

		<?php foreach($this->medicos as $m) { ?>
		<tr>
			<td>
			<?= htmlentities($m['nom_medico']) ?> <?= htmlentities($m['ape_medico']) ?></td>
			<td><?= htmlentities($m['nom_especialidad']) ?></td> 
			
		<td><?php 
			if($m['horario']=='t')
			{ echo htmlentities("Tarde");} 
			else {echo htmlentities('Mañana');} ?></td>
		<td><a href="SacarTurnoConMedico.php?id=<?= htmlentities($m['dni']) ?>">Sacar Turno</a></td></tr>
		<?php } ?>

	</table>
	
	<div>
		<a href="./MenuPrincipalPaciente.php"><button>Volver</button></a>
	</div>
</body>
</html>

