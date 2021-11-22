<!DOCTYPE html>
<html>
<head>
	<title>Menú Principal</title>
	<link rel="stylesheet" type="text/css" href="../css/fondo.css">
	<link rel="stylesheet" type="text/css" href="../css/admin.css">
</head>
<body>

<h1>Profesional: <?= htmlentities($this->usuario['nombre'])?> <?= htmlentities($this->usuario['apellido'])?></h1>
<h1>dia <?= htmlentities(date("d-m-Y", strtotime($this->fecha)))?></h1>

<div>
<form id="formulario" method="get">
<label for="fecha">Fecha:</label><br>
<input type="date" id="fecha" name="fecha" required="required"></input><br>
<input type="hidden" id="id" name="id" required="required"></input><br>
</form>



	<table>
		<tr><th>Hora</th><th>Paciente</th><th></th></tr>

		<?php foreach($this->turnos as $t) { ?>
		<tr><td><?= htmlentities(date("H:i", strtotime($t['hora'])))?></td><td><?= htmlentities($t['paciente']) ?></td>
		<td><?php if($this->modificar==true) {
			if ($t['libre']==false) echo "<a href='./ConfirmarAnulacionTurno.php?id=" . $t['id'] . "'" . ">Anular Turno</a>" ;
			if ($t['libre']==true){ echo "<a href=" . "'./AgendarTurnoMedico.php?hora=" . $t['hora'] . "&" . "dia=" . $this->fecha . "&" . "dnimedico=" . $_GET['id'] . "'" . ">Agendar Turno</a>";} 
			}?></td>
		<?php } ?>
		<?php if ($this->verAgenda==false) echo htmlentities($this->mensaje); ?>
	</table>


<div id="cambiarh">
<form action="../controllers/cambiarhorario.php" method="POST">

<label for="horario">Cambiar Horario de Trabajo:</label><br>
	<input type="number" name="dni" value ="<?php echo $_GET['id']?>" style= "display: none;" >
	<select name="horario"  required="required">
		<option value="M">Mañana</option>
		<option value="T">Tarde</option>
	</select> <br><br>
	<input type="submit" value="Enviar"></input>

</form>
</div>





<a href="./CerrarSesion.php"><button>Cerrar Sesión</button></a>
<a href="./MenuPrincipalAdministracion.php"><button>Volver al menú principal</button></a>

<script type="text/javascript">
	document.getElementById("fecha").value="<?=$this->fecha ?>";
	document.getElementById("id").value="<?=$this->usuario['dni'] ?>";
	
	document.getElementById("fecha").onchange=function(){
	document.getElementById("formulario").submit();
	}	
</script>
</div>

</body>
</html>