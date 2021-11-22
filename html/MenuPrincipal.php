<?php
//html
?>

<!DOCTYPE html>
<html>
<head>
	<title>Menú Principal</title>
	<link rel="stylesheet" type="text/css" href="../css/fondo.css">
	<link rel="stylesheet" type="text/css" href="../css/menuppal.css" />
</head>
<body>
<h1>Bienvenido <?php  echo htmlentities($this->usuario['nombre']); echo htmlentities(" ");echo htmlentities($this->usuario['apellido']);?></h1>
<br/>

<h2>Turnos medicos reservados</h2>
	<table>
		<?php if(count($this->turnos)>0) echo '<tr><th>Fecha</th><th>Hora</th><th>Profesional</th><th>Consultorio</th><th></th></tr>' ?>
		<?php foreach($this->turnos as $t) { ?>
		<tr><td><?= date("d-m-Y", strtotime($t['fecha']))?></td> <td><?= date("H:i", strtotime($t['hora']))?></td><td><?= $t['nombre'] ?> <?= $t['apellido'] ?></td><td><?= $t['consultorio'] ?></td><td><a href="./ConfirmarAnulacionTurno.php?id=<?= $t['turno_id'] ?>">Anular Turno</a></td></tr>
		<?php } ?>
	</table>
<div>
	<a href="./ListadoMedicos.php"><button>Pedir turno</button></a>
	<a href="./ListadoEspecialidades.php"><button>Pedir turno por especialidad</button></a>
</div>
<h2>Turnos de estudios medicos reservados</h2>
<br/>
	<table>
		<?php if(count($this->estudios)>0) echo '<tr><th>Fecha</th><th>Hora</th><th>Estudio</th><th></th></tr>' ?>
		<?php foreach($this->estudios as $e) { ?>
		<tr>
		<td><?php echo htmlentities(date("d-m-Y", strtotime($e['fecha'])))?></td> 
		<td><?php echo htmlentities(date("H:i", strtotime($e['hora'])))?></td>
		<td><?php echo htmlentities($e['nom_estudio']) ?></td>
		<td><a href="./ConfirmarAnulacionEstudio.php?id=<?php echo htmlentities($e['turno_id']) ?>">Anular Turno</a></td>
		</tr>
		<?php } ?>
	</table>
<div>
	<a href="./ListadoEstudios.php"><button>Pedir turno para estudios</button></a>
</div>
<div>
	<form name= "cambiar_contra"method="post" action="../controllers/cambiarcontraseña.php">
		<label for="contraseña">Contraseña:</label><br>
		<input type="number" id="dni" name="contraseña" required="required"><br>
		<input type="submit" value="Cambiar Contraseña"></input>
	</form>
	<a href="./CerrarSesion.php"><button>Cerrar Sesión</button></a>
	<?php if($this->usuario['tipo']==2) echo("<a href='./MenuPrincipalMedico.php'><button>Volver al Menú Profesional</button></a>");?>
</div>

</body>
</html>
