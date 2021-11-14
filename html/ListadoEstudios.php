<?php

//html
?>


<!DOCTYPE html>
<html>
<head>
	<title>Estudios</title>
	<link rel="stylesheet" type="text/css" href="../css/fondo.css">
	<link rel="stylesheet" type="text/css" href="../css/paciente.css">
</head>
<body>
<div id ="app_menu">
	<h1>Estudios</h1>


	<table>
		<tr><th>Nombre</th><th>Descripción</th><th>Precio</th><th></th></tr>

		<?php foreach($this->estudios as $e) { ?>
		<tr><td><?= $e['nom_estudio'] ?></td> <td><?= $e['desc_estudio'] ?></td><td><?= $e['precio'] ?></td><td><a href="SacarTurnoEstudio.php?id=<?= $e['estudio_id'] ?>">Sacar Turno</a></td></tr>
		<?php } ?>

	</table><br><br>
	<a href="./MenuPrincipalPaciente.php"><button>Volver</button></a>

</div>
</body>
</html>

