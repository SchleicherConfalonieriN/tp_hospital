<?php
//html
?>

<!DOCTYPE html>
<html>
<head>
	<title>Ingreso al sistema</title>
</head>
<body>
<form id="formulario" method="post">
  <label for="dni">DNI:</label><br>
  <input type="number" id="dni" name="dni" required="required"><br>
  <label for="nombre">Nombre:</label><br>
  <input type="text" id="nombre" name="nombre" required="required"><br>
  <label for="apellido">Apellido:</label><br>
  <input type="text" id="apellido" name="apellido" required="required"><br>
  <label for="contra">Contraseña:</label><br>
  <input type="password" id="contra" name="contra" required="required"><br><br>
  <label for="mail">Correo electrónico:</label><br>
  <input type="text" id="mail" name="mail" required="required"><br><br>
  <input type="submit" value="Enviar"></input>
</form> 
<?PHP echo($this->mensaje); ?>
<br/>
<a href="./IngresoAlSistema.php"><button>Volver</button></a>
</body>
</html>