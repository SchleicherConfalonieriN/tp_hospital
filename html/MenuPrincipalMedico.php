<!DOCTYPE html>
<html>
<head>
	<title>Ingreso al sistema</title>
</head>
<body>

<div>


Bienvenido
<?php foreach ($this->datos as $d)
 echo  $d['nom_medico']; ?>  
 <?php echo  $d['ape_medico']; ?><br><br>
Su consultorio el dia de hoy es el <?php echo  $d['consultorio'];?>
</div><br><br><br><br>




<div>
  <table>
    <tr>
      <td>ID del Turno</td>
      <td>dni del paciente</td>
      <td>fecha de consulta</td>
       <td>hora de consulta</td>
      <td>consultorio</td>
    </tr>
    <?php echo "TURNOS RESERVADOS";  ?><br><br>
    <?php foreach ($this->turnos_reservados as $t) {?>
    <tr>
          <td><?php echo  $t['turno_id'] ?></td>
          <td><?php echo  $t['dni_paciente'] ?></td>
          <td><?php echo  $t['fecha'] ?></td>
           <td><?php echo  $t['hora'] ?></td>
           <td><?php echo $t['consultorio'] ?></td>
    </tr>
    <?php } ?>
  </table>
</div>

<div>
  <form name="modificar_turno"method="post" action="../controllers/cambiarturnofecha.php">
    
    <label for="id">Id del Turno:</label><br>
   <input type="number"  name="dni" required="required"><br>


    <label for="id">Fecha Nueva del Turno:</label><br>
   <input type="date"  name="fecha" required="required"><br>

   <label for="id">Hora Nueva del Turno:</label><br>
   <input type="time"  name="hora" required="required"><br>

<input type="submit" value="Modificar Turno"></input>

  </form>
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