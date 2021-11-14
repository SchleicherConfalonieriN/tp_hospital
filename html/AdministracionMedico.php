<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>

<div class="opciones_medico">
<form name= "agregar_medico"method="post" action="../controllers/registroadmin.php">
  <label for="dni">DNI:</label><br>
  <input type="number"  name="agregar_dni" required="required"><br>
  <label for="nombre">Nombre:</label><br>
  <input type="text"  name="agregar_nombre" required="required"><br>
  <label for="apellido">Apellido:</label><br>
  <input type="text" id="apellido" name="agregar_apellido" required="required"><br>
  <label for="contra">Contraseña:</label><br>
  <input type="password"  name="agregar_contra" required="required"><br><br>
  <label for="mail">Correo electrónico:</label><br>
  <input type="text" id="mail" name="agregar_mail" required="required"><br><br>
   

  <label for="consultorio">Consultorio:</label><br>
  <input type="numeric" name="consultorio" required="required"><br><br>
  <select name="horario">
    <option value="M" >Mañana</option>
    <option value="T">Tarde</option>
  </select><br><br>


  <select name="tipo" id="tipo">
  	<option value="0" >Administrador</option>
  	<option value="2">Medico</option>
  </select><br><br>


<div id ="especialidad">
<label for="mail">Especialidad:</label><br>
  <input type="text" id="especialidad" name="agregar_especialidad" required="required"><br><br>
</div>

  <input type="submit" value="Registrar medico"></input>
	</form>
</div>

<div class="opciones_medico">
  <table>

LISTADO DE PERSONAL MEDICO  
  <tr>
      <td>DNI</td>
      <td>nombre del medico</td>
      <td>apellido del medico</td>
      <td>especialidad</td>
      <td>horario</td>
      <td>consultorio</td>
    </tr>


    <?php foreach ($this->listado as $l) {?>
    <tr>
        <td><?php echo $l['dni'] ?></td>
        <td><?php echo $l['nom_medico'] ?></td>
        <td><?php echo $l['ape_medico'] ?></td>
        <td><?php echo $l['especialidad']?></td>
        <td><?php echo $l['horario']?></td>
        <td><?php echo $l['consultorio']?></td>
    </tr>
    <?php } ?>
  </table>
</div>


<div class="opciones_medico">
  <form name= "editar_horario"method="post" action="../controllers/cambiarhorario.php">
  EDITAR HORARIO DE MEDICO <br> 
<label for="dni">DNI:</label><br>
<input type="number"  name="dni" required="required"><br>
  <select name="horario" >
    <option value="M"> Mañana</option>
    <option value="T"> Tarde</option>
  </select><br><br>
<input type="submit" value="Cambiar Horario"></input>
</form>
</div>



<div class="opciones_medico">

<form name= "editar_consultorio"method="post" action="../controllers/cambiarconsultorio.php">

  EDITAR CONSULTORIO <br>  

<label for="dni">DNI:</label><br>
  <input type="number"  name="dni" required="required"><br>
<label for="contra">Consultorio:</label><br>
  <input type="numeric" name="consultorio" required="required"><br><br>

<input type="submit" value="Cambiar Consultorio"></input>
</form>
</div>


<div>
<form name= "eliminar_medico"method="post" action="../controllers/eliminar.php">
  <label for="dni">DNI:</label><br>
   <input type="number"  name="eliminar_dni" required="required"><br>
<input type="submit" value="Eliminar usuario"></input>
	</form>
</div>





</body>
</html>