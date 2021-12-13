<?php

//html
?>


<!DOCTYPE html>
<html>
<head>
	<title>Estudios</title>
	<link rel="stylesheet" type="text/css" href="../css/fondo.css">
	<link rel="stylesheet" type="text/css" href="../css/admin.css">
	<link rel="stylesheet" type="text/css" href="../css/estilosvarios.css">
</head>
<body>
	<h1>Estudios</h1>
	<table>
		<tr><th>Nombre</th><th>Descripción</th><th>Precio</th><th></th></tr>

		<?php foreach($this->estudios as $e) { ?>
		<tr>
		<td><?= htmlentities($e['nom_estudio']) ?></td> 
		<td><?= htmlentities($e['desc_estudio']) ?></td>
		<td><?= htmlentities($e['precio']) ?></td><td><a href="SacarTurnoEstudio.php?id=<?= htmlentities($e['estudio_id']) ?>">Sacar Turno</a></td></tr>
		<?php } ?>

	</table>
	<div>
	<a href="./MenuPrincipalPaciente.php"><button>Volver</button></a>
	</div>
</body>
</html>

