<?php

//html
?>


<!DOCTYPE html>
<html>
<head>
	<title>Anular Turno</title>
	<link rel="stylesheet" type="text/css" href="../css/fondo.css">
	<link rel="stylesheet" type="text/css" href="../css/paciente.css">
	<link rel="stylesheet" type="text/css" href="../css/estilosvarios.css">
</head>
<body>
	<div>
		<h1>¿Está seguro de uqe desea anular el turno?</h1>
		<li>Paciente: <?= htmlentities($this->paciente) ?></li>
		<li>Dia: <?= date("d-m-Y",strtotime($this->turno['fecha'])) ?></li>
		<li>Hora: <?= date("H:i",strtotime($this->turno['hora'])) ?></li>
		<a href="./AnularTurno.php?id=<?= $this->turno['turno_id'] ?>"><button>Anular</button></a>
		<a href="./MenuPrincipalMedico.php"><button>Cancelar</button></a>
	</div>
</body>
</html>

