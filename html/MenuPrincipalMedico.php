<!DOCTYPE html>
<html>
<head>
	<title>Ingreso al sistema</title>
</head>
<body>

<div>



<<?php foreach ($this->datos as $d)?>
  Bienvenido <?php echo  $d['nom_medico']; ?>  
              <?php echo  $d['ape_medico']; ?><br>
  Su consultorio el dia de hoy es el <?php echo  $d['consultorio']; ?>
</div>




<div>
  <table>
    <tr>
      <td>ID del Turno</td>
      <td>dni del paciente</td>
      <td>fecha de consulta</td>
      <td>consultorio</td>
    </tr>
    <?php echo "TURNOS RESERVADOS";  ?>
    <?php foreach ($this->turnos_reservados as $t) {?>
    <tr>
          <td><?php echo  $t['turno_id'] ?></td>
          <td><?php echo  $t['dni_paciente'] ?></td>
          <td><?php echo  $t['fecha'] ?></td>
           <td><?php echo $t['consultorio'] ?></td>
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