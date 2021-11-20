<!DOCTYPE html>
<html>
<head>
	<title>Ingreso al sistema</title>
  <link rel="stylesheet" type="text/css" href="../css/fondo.css">
  <link rel="stylesheet" type="text/css" href="../css/medico.css">
</head>
<body>

<div>

<div id="APP">
<h1>Bienvenido
<?php foreach ($this->datos as $d) 
echo htmlentities($d['nom_medico']); ?>  
<?php echo  htmlentities($d['ape_medico']); ?></h1>
<h3>Su consultorio asignado es el <?php echo  htmlentities($d['consultorio']);?></h3>

<div>
  <table>
    <tr>
      <td>ID del Turno</td>
      <td>dni del paciente</td>
      <td>fecha de consulta</td>
       <td>hora de consulta</td>
      <td>consultorio</td>
    </tr>
  <h3>Turnos Reservados</h3>
    <?php foreach ($this->turnos_reservados as $t) {?>
    <tr>
          <td><?php echo htmlentities($t['turno_id']) ?></td>
          <td><?php echo htmlentities($t['dni_paciente']) ?></td>
          <td><?php echo htmlentities($t['fecha']) ?></td>
          <td><?php echo htmlentities($t['hora']) ?></td>
          <td><?php echo htmlentities($t['consultorio']) ?></td>
    </tr>
    <?php } ?>
  </table>
</div>

<div id="edit_medico">
  <h4>Modificar Turno</h4>
  <form name="modificar_turno"method="post" action="../controllers/cambiarturnofecha.php">
    <div>
    <label for="id">Id del Turno:</label><br>
   <input type="number"  name="dni" required="required"><br>
</div>

  <div>
    <label for="id">Fecha Nueva del Turno:</label><br>
   <input type="date"  name="fecha" required="required"><br>
</div>
<div>
   <label for="id">Hora Nueva del Turno:</label><br>
   <input type="time"  name="hora" required="required"><br>
</div>
<input type="submit" value="Modificar Turno"></input>

  </form>
</div>



<div id="op_turno">

<div id="eliminar_turno">
  <h4>Eliminar Turno</h4>
<form name= "eliminar_turno"method="post" action="../controllers/AnularTurnoAdmin.php">
 

   <label for="id">Id_Turno:</label><br>
   <input type="number"  name="id" required="required"><br>
<input type="submit" value="Eliminar Turno"></input>
  </form>
</div>

</div>


<form name= "cambiar_contra"method="post" action="../controllers/cambiarcontraseña.php">
  <label for="contraseña">Contraseña:</label><br>
   <input type="number" id="dni" name="contraseña" required="required"><br>
<input type="submit" value="Cambiar Contraseña"></input>
  </form>



<a href="./CerrarSesion.php"><button>Cerrar Sesión</button></a>
</div>

</body>
</html>