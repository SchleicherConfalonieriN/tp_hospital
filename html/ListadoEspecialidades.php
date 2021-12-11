<?php

//html
?>


<!DOCTYPE html>
<html>
<head>
	<title>Nuestras Especialidades</title>
	<link rel="stylesheet" type="text/css" href="../css/fondo.css">
	<link rel="stylesheet" type="text/css" href="../css/admin.css">
	<link rel="stylesheet" type="text/css" href="../css/estilosvarios.css">
</head>
<body>
<div>
	<h1>Seleccione la especialidad</h1>
		<?php foreach($this->especialidades as $e) { ?>
		<li><a href="ListadoMedicos.php?especialidad_id=<?= $e['especialidad_id'] ?>"><?= htmlentities($e['nom_especialidad']) ?></a></li>
		<?php } ?>
		</br>
	<a href="./MenuPrincipalPaciente.php"><button>Volver</button></a>
</div>
</body>
</html>

