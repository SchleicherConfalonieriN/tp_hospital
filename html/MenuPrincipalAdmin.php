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
  

  <label for="contra">Consultorio:</label><br>
  <input type="numeric" name="agregar_consultorio" required="required"><br><br>
  <label for="contra">Horario de entrada:</label><br>
  <input type="text" name="agregar_He" required="required"><br><br>



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


<div>
  <form name= "editar_horario"method="post" action="../controllers/cambiarhorario.php">
  EDITAR HORARIO DE MEDICO <br> 
<label for="dni">DNI:</label><br>
<input type="number"  name="dni" required="required"><br>
  <select name="horario" id="horario">
    <option value="M"> Mañana</option>
    <option value="T"> Tarde</option>
  </select><br><br>
<input type="submit" value="Cambiar Horario"></input>
</form>
</div>



<div>

<form name= "editar_consultorio"method="post" action="../controllers/cambiarconsultorio.php">

  EDITAR CONSULTORIO  

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
   <input type="number" id="dni" name="eliminar_dni" required="required"><br>
<input type="submit" value="Eliminar usuario"></input>
	</form>
</div>

<div>
<form name= "agregar_estudios"method="post" action="../controllers/registroEstudio.php">
  

  <label for="Precio">Identificador:</label><br>
  <input type="number" id="dni" name="precio" required="required"><br>

  <label for="nombre">Nombre:</label><br>
  <input type="text" id="nombre" name="nombre" required="required"><br>
  
  <label for="descripcion">Descripcion:</label><br>
  <input type="text" id="apellido" name="descripcion" required="required"><br>
  
  <label for="Precio">Precio:</label><br>
  <input type="number" id="dni" name="precio" required="required"><br>


  <input type="submit" value="Registrar estudio"></input>
  </form>
</div>

<div>
  <table>

LISTADO DE SERVICIOS DISPONIBLES  
  <tr>
      <td>Identificador</td>
      <td>Nombre</td>
      <td>Descripcion</td>
      <td>Precio</td>
    </tr>


    <?php foreach ($this->listado_estudios as $e) {?>
    <tr>
        <td><?php echo $e['Identificador'] ?></td>
        <td><?php echo $e['Nombre'] ?></td>
        <td><?php echo $e['Descripcion'] ?></td>
        <td><?php echo $e['Precio']?></td>
       
    </tr>
    <?php } ?>
  </table>
</div>




<div>
<form name= "eliminar_estudios"method="post" action="../controllers/eliminarEstudio.php">
  <label for="nombre">Identificador:</label><br>
   <input type="number" name="Identificador" required="required"><br>
<input type="submit" value="Eliminar Estudio"></input>
  </form>
</div>









<div>
  <table>

LISTADO DE TURNOS REGISTRADOS  
  <tr>
      <td>Id_Turno</td>
      <td>Dni_Paciente</td>
      <td>Dni_Medico</td>
      <td>Fecha</td>
      <td>Hora</td>
      <td>Consultorio</td>
    </tr>


    <?php foreach ($this->turnos as $t) {?>
    <tr>
        <td><?php echo $t['turno_id'] ?></td>
        <td><?php echo $t['dni_paciente'] ?></td>
        <td><?php echo $t['dni_medico']?></td>
        <td><?php echo $t['fecha']?></td>
        <td><?php echo $t['hora']?></td>
        <td><?php echo $t['consultorio']?></td>
    </tr>
    <?php } ?>
  </table>
</div>


<div>
<form name= "eliminar_turno"method="post" action="../controllers/AnularTurnoAdmin.php">
 

   <label for="id">Id_Turno:</label><br>
   <input type="number"  name="id" required="required"><br>
<input type="submit" value="Eliminar Turno"></input>
  </form>
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