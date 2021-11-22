<?php
//html
?>

<!DOCTYPE html>
<html>
<head>
	<title>Nuevo Medico</title>
	<link rel="stylesheet" type="text/css" href="../css/fondo.css">
	<link rel="stylesheet" type="text/css" href="../css/admin.css">
</head>
<body>
<h2>Registrar Profesional</h2>
<div>
<form id="formulario" method="post">
	<label for="dni">DNI:</label><br>
	<input type="number" id="dni" name="dni" min="1000" max="100000000000" required="required"><br>
	<label for="nombre">Nombre:</label><br>
	<input type="text" id="nombre" name="nombre" minlength="3" maxlength="15" required="required"><br>
	<label for="apellido">Apellido:</label><br>
	<input type="text" id="apellido" name="apellido" minlength="3" maxlength="15" required="required"><br>
	<label for="contra">Contraseña:</label><br>
	<input type="password" id="contra" name="contra" required="required"><br><br>
	<label for="mail">Correo electrónico:</label><br>
	<input type="text" id="mail" name="mail" required="required"><br><br>
	<label for="especialidad">Especialidad:</label><br>
	<select name="especialidad" id="especialidad" required="required">
		<?php foreach($this->especialidades as $e){ ?><br>
		<option value="<?=htmlentities($e['especialidad_id']) ?>"><?=htmlentities($e['nom_especialidad']) ?></option><?php } ?>
	</select> <br><br>
	<label for="consultorio">Consultorio:</label><br>	
	<select name="consultorio" id="consultorio" required="required">
		<?php foreach($this->consultorios as $c){ ?>
		<option value="<?=htmlentities($c) ?>"><?=htmlentities($c) ?></option><?php } ?>
	</select><br><br>
	<label for="horario">Horario:</label><br>
	<select name="horario" id="horario" required="required">
		<option value="m">Mañana</option>
		<option value="t">Tarde</option>
	</select> <br><br>
  <input type="submit" value="Enviar"></input>
</form> 

<h3><?= $this->mensaje ?></h3>
<br/>
<a href="./MenuPrincipalAdministracion.php"><button>Volver</button></a>
</div>
</body>
</html>


