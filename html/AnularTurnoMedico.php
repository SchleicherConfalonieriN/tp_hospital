<!DOCTYPE html>
<html>
<head>
	<title>Anular Turno</title>
	<link rel="stylesheet" type="text/css" href="../css/fondo.css">
</head>
<body>

	<h1>¿Está seguro de uqe desea anular el turno?</h1>
	<li>Paciente: <?= $this->paciente ?></li>
	<li>Dia: <?= $this->turno['fecha'] ?></li>
	<li>Hora: <?= $this->turno['hora'] ?></li>
    <a href="./AnularTurno.php?id=<?= $this->turno['turno_id'] ?>"><button>Anular</button></a>
	<a href="./MenuPrincipalMedico.php"><button>Cancelar</button></a>
</body>
</html>

