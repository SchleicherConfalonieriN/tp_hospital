<?php

//html
?>


<!DOCTYPE html>
<html>
<head>
	<title>Anular Estudio</title>
	<link rel="stylesheet" type="text/css" href="../css/fondo.css">
	<link rel="stylesheet" type="text/css" href="../css/estilosvarios.css">
</head>
<body>
	<div>
		<h1>¿Está seguro de que desea anular el estudio?</h1>
		<li>Estudio: <?= htmlentities($this->estudio['nom_estudio']) ?></li>
		<li>Descripción: <?= htmlentities($this->estudio['desc_estudio']) ?></li>
		<li>Dia: <?= htmlentities(date("d-m-Y",strtotime($this->turno['fecha']))) ?></li>
		<li>Hora: <?= htmlentities(date("H:i",strtotime($this->turno['hora']))) ?></li>
		<a href="./AnularTurno.php?id=<?= htmlentities($this->turno['turno_id']) ?>"><button>Anular</button></a>
		<a href="./VolverAlMenuPrincipal.php"><button>Cancelar</button></a>
	</div>
</body>
</html>

