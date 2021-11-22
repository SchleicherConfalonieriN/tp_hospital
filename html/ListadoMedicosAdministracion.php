<?php

//html
?>


<!DOCTYPE html>
<html>
<head>
	<title>Nuestros Profesionales</title>
	<link rel="stylesheet" type="text/css" href="../css/fondo.css">
		<link rel="stylesheet" type="text/css" href="../css/admin.css">
</head>
<body>

	<h1>Nuestros Profesionales</h1>


	<table>
		<tr><th>Nombre</th><th>Especialidad</th><th>Horario</th><th>Consultorio</th><th></th><th> </th><th></th></tr>

		<?php foreach($this->medicos as $m) { ?>
		<tr>
	<td>
	<?= htmlentities($m['nom_medico'])?> 
	<?= htmlentities($m['ape_medico']) ?></td> 

	<td><?= htmlentities($m['nom_especialidad']) ?></td> 
	<td><?php if($m['horario']=='t') 
	{echo htmlentities(("Tarde"));} 
	else {echo htmlentities(('Mañana'));} ?>
	</td> 
	<td><?= htmlentities($m['consultorio']) ?></td>
	
	<td><a href="ConsultarAgendaMedico.php?id=
	<?= htmlentities($m['dni']) ?>">Consultar Agenda</a></td>
	
	<td><a href="CambiarConsultorio.php?id=<?= htmlentities($m['dni']) ?>">Cambiar consultorio</a></td>

	<td><a href="eliminar.php?dni=
	<?= htmlentities($m['dni']) ?>">Eliminar Medico</a></td></tr>
		<?php } ?>

	</table>
	<br>
	<div>
	<a href="./MenuPrincipalAdministracion.php"><button>Volver</button></a></div>
</body>
</html>

