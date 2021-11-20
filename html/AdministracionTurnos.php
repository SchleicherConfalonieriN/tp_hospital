<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
</head>
<body>


<div>
  <table>

LISTADO DE TURNOS REGISTRADOS  
  <tr>
      <td>Id_Turno</td>
      <td>Dni_Paciente</td>
      <td>Identificador de Servicio</td>
      <td>Fecha</td>
      <td>Hora</td>
      <td>Consultorio</td>
    </tr>


    <?php foreach ($this->turnos as $t) {?>
    <tr>
        <td><?php echo htmlentities($t['turno_id'] )?></td>
        <td><?php echo htmlentities($t['dni_paciente']) ?></td>
        <td><?php echo htmlentities($t['servicio'])?></td>
        <td><?php echo htmlentities($t['fecha'])?></td>
        <td><?php echo htmlentities($t['hora'])?></td>
        <td><?php echo htmlentities($t['consultorio'])?></td>
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




</body>
</html>