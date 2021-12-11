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
		<h1>¿Está seguro de que desea anular el turno?</h1>
		<li>Profesional: <?= htmlentities($this->medico) ?></li>
		<li>Dia: <?= date("d-m-Y",strtotime($this->turno['fecha'])) ?></li>
		<li>Hora: <?= date("H:i",strtotime($this->turno['hora'])) ?></li></br>
		<a href="./AnularTurno.php?id=<?= $this->turno['turno_id'] ?>"><button>Anular</button></a></br>
		<a href="./menuPrincipalPaciente.php"><button>Cancelar</button></a>
	</div>
</body>
</html>

