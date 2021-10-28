<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>



<div>
<form name= "agregar_medico"method="post" action="../controllers/registroadmin.php">
  <label for="dni">DNI:</label><br>
  <input type="number" id="dni" name="agregar_dni" required="required"><br>
  <label for="nombre">Nombre:</label><br>
  <input type="text" id="nombre" name="agregar_nombre" required="required"><br>
  <label for="apellido">Apellido:</label><br>
  <input type="text" id="apellido" name="agregar_apellido" required="required"><br>
  <label for="contra">Contraseña:</label><br>
  <input type="password" id="contra" name="agregar_contra" required="required"><br><br>
  <label for="mail">Correo electrónico:</label><br>
  <input type="text" id="mail" name="agregar_mail" required="required"><br><br>
  <label for="mail">Especialidad:</label><br>
  <input type="text" id="especialidad" name="agregar_especialidad" required="required"><br><br>
  <select name="tipo">
  	<option value="0">Administrador</option>
  	<option value="2">Medico</option>
  </select><br><br>
  <input type="submit" value="Registrar medico"></input>
	</form>
</div>

<div>
<form name= "eliminar_medico"method="post" action="../controllers/eliminar.php">
  <label for="dni">DNI:</label><br>
   <input type="number" id="dni" name="eliminar_dni" required="required"><br>
<input type="submit" value="Eliminar usuario"></input>
	</form>
</div>


<div>
	<table>

LISTADO DE PERSONAL MEDICO	
	<tr>
      <td>nombre del medico</td>
      <td>apellido del medico</td>
      <td>especialidad</td>
    </tr>


    <?php foreach ($this->listado as $l) {?>
    <tr>
        <td><?php echo $l['nom_medico'] ?></td>
        <td><?php echo $l['ape_medico'] ?></td>
         <td><?php echo $l['especialidad']?></td>
    </tr>
    <?php } ?>



	</table>
</div>


<a href="./CerrarSesion.php"><button>Cerrar Sesión</button></a>
</body>
</html>