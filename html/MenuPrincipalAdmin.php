<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
  <link rel="stylesheet" type="text/css" href="../css/menu.css">
</head>
<body>


<div id="Admin_Medico">
<?php require '../html/AdministracionMedico.php';    ?>
</div>

<div id="Admin_Estudio">
<?php require '../html/AdministracionEstudios.php';  ?>
</div>
<div id="Admin_Turno">
<?php require '../html/AdministracionTurnos.php';  ?>
</div>


<div>
<form name= "cambiar_contra"method="post" action="../controllers/cambiarcontraseña.php">
  <label for="contraseña">Contraseña:</label><br>
   <input type="number" id="dni" name="contraseña" required="required"><br>
<input type="submit" value="Cambiar Contraseña"></input>
  </form>
</div>


<a href="./CerrarSesion.php"><button>Cerrar Sesión</button></a>
</body>
</html>