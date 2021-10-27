<?php

//html
?>


<!DOCTYPE html>
<html>
<head>
	<title>Anular Turno</title>
</head>
<body>

	<h1>¿Está seguro de uqe desea anular el turno?</h1>
	<li>Profesional: <?= $this->medico ?></li>
	<li>Dia: <?= $this->turno['fecha'] ?></li>
	<li>Hora: <?= $this->turno['hora'] ?></li>
    <a href="./AnularTurno.php?id=<?= $this->turno['turno_id'] ?>"><button>Anular</button></a>
	<a href="./menuPrincipalPaciente.php"><button>Cancelar</button></a>
</body>
</html>

