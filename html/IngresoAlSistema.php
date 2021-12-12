
<!DOCTYPE html>
<html>
<head>
	<title>Ingreso al sistema</title>
	<link rel="stylesheet" type="text/css" href="../css/fondo.css">
    <link rel="stylesheet" type="text/css" href="../css/login.css">
</head>
<body>
	<div id="login">
		<div id= "datos">
			<form method="post">
				<label class="lab" for="dni">DNI</label><br>
				<input class="datosin" type="text" id="dni" name="dni" required="required"><br>
				<label class="lab" for="contra">Contraseña</label><br>
				<input class="datosin" type="password" id="contra" name="contra" required="required"><br><br>
				<br/>
				<h3><?= $this->mensaje ?></h3>
				</div>		
				<div id="Ingresar">
					<input type="submit" value="Ingresar">
				</div>
		</form> 
		
		<div class="Registrarse">
			<a class="Registrarse" href="./NuevoUsuario.php">Registrarse</a>
		</div>
	</div>
</body>
</html>
