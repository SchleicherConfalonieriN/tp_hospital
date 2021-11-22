<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Gestion del Hospital</title>
	<link rel="stylesheet" type="text/css" href="../css/fondo.css">
	<link rel="stylesheet" type="text/css" href="../css/admin.css">
</head>
<body>
<div class="pos">
<div class="pos1">
	<h2>Registrar Consultorio</h2>
<form action="../controllers/AgregarConsultorio.php" method="POST">
	<label>Colocar Numero de Consultorio</label>
	<input type="number" name="consultorio" max="500" min="0" required="required">
	<input type="submit" value="Registrar Consultorio">
</form>
</div>


<div class="pos2">
<h2>Listado de Consultorios</h2>	
<table>
	<tr><th>ID</th><th>Numero</th><th>Eliminar</th></tr>
	<?php foreach ($this->consultorio as $con){ ?>
<tr><td><?= $con['consultorio_id']?></td> <td><?= $con['numero']?></td>
<td><a href="../controllers/EliminarConsultorio.php?id=<?= $con['consultorio_id'] ?>">Eliminar Consultorio</a></td></tr>

	<?php } ?>
</table>
</div>
</div>

<div class="pos">
<div class="pos1">
	<h2>Registrar Especialidad</h2>
<form action="../controllers/AgregarEspecialidad.php" method="POST">
	<label>Colocar Numero de Consultorio</label>
	<input type="text" name="especialidad" minlength="3" maxlength="15" required="required">
	<input type="submit" value="Registrar Especialidad">
</form>
</div>

<div class="pos2">

<h2>Listado de Especialidades</h2>
<table>
	<tr><th>ID</th><th>Nombre</th><th>Eliminar</th></tr>
	<?php foreach ($this->especialidades as $esp){ ?>
<tr><td><?= $esp['especialidad_id']?></td> <td><?= $esp['nom_especialidad']?></td>  
	<td> <a href="../controllers/EliminarEspecialidad.php?id=<?= $esp['especialidad_id'] ?>">Eliminar Especialidad</a></td></tr>
	<?php } ?>
</table>
<a href="./MenuPrincipalAdministracion.php"><button>Volver al menú principal</button></a>
</div>
</div>

</body>
</html>