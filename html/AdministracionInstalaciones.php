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
	<input type="number" name="consultorio">
	<input type="submit" name="Registrar Consultorio">
</form>
</div>


<div class="pos2">
<h2>Listado de Consultorio</h2>	
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
	<input type="text" name="especialidad">
	<input type="submit" name="Registrar Especialidad">
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
</div>
</div>


</body>
</html>