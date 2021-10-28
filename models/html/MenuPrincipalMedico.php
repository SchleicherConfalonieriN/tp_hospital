<!DOCTYPE html>
<html>
<head>
	<title>Ingreso al sistema</title>
</head>
<body>

<div>
  <table>

    <tr>
      <td>dni del paciente</td>
      <td>fecha de consulta</td>
      <td>consultorio</td>
    </tr>




    <?php echo "TURNOS RESERVADOS";  ?>
    <?php foreach ($this->turnos_reservados as $t) {?>
    <tr>
        <td><?php echo $t['dni_paciente'] ?></td>
        <td><?php echo $t['fecha'] ?></td>
         <td><?php echo $t['consultorio'] ?></td>
    </tr>
    <?php } ?>
  </table>


</div>

<a href="./CerrarSesion.php"><button>Cerrar Sesión</button></a>

</body>
</html>