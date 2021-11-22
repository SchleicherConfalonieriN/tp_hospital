<!DOCTYPE html>
<html>
<head>
	<title>Menú Principal</title>
	<link rel="stylesheet" type="text/css" href="../css/fondo.css">
	<link rel="stylesheet" type="text/css" href="../css/medico.css">
</head>
<body>
<h1>Bienvenido 
<?php echo htmlentities($this->usuario['nombre']);
			echo htmlentities(" "); 
			echo htmlentities($this->usuario['apellido']);?></h1>


<h1>Su consultorio el dia de hoy es : <?=htmlentities($this->consultorio) ?></h1>
<h1>dia <?= htmlentities(date("d-m-Y", strtotime($this->fecha)))?></h1>
<br/>
<h2>AGENDA</h2>
<div>
<form id="formulario" method="get">
<label for="fecha">Fecha:</label><br>
<input type="date" id="fecha" name="fecha" required="required"></input><br>
</form>
</div>
	
	<table>
	
<?php if ($this->verAgenda==true) echo '<tr><th>Hora</th><th>Paciente</th><th>Opciones</th></tr>' ?>

		<?php foreach($this->turnos as $t) { ?>
		<tr><td>
		<?= htmlentities(date("H:i", strtotime($t['hora'])))?></td>
		<td id="paciente"><?= htmlentities($t['paciente']) ?></td>
		<td><?php if($this->modificar==true) {
		

			if ($t['libre']==false) echo "<a href='./ConfirmarAnulacionTurno.php?id=" . $t['id'] . "'" . ">Anular Turno</a>" ;
			if ($t['libre']==true) echo "<a href=" . "'./AgendarTurnoMedico.php?hora=" . $t['hora'] . "&" . "dia=" . $this->fecha . "'" . ">Agendar Turno</a>"; 
			}?></td>
		
		<?php } ?>
		
		<?php if ($this->verAgenda==false) echo htmlentities($this->mensaje); ?>

	</table>
	<br>
	<div>
<a href="./CerrarSesion.php"><button>Cerrar Sesión</button></a>
<a href="./MenuPrincipalPaciente.php"><button>Ingresar como paciente</button></a>

<script type="text/javascript">
	document.getElementById("fecha").value="<?=$this->fecha ?>";
	
	document.getElementById("fecha").onchange=function(){
		document.getElementById("formulario").submit();
	}	
</script>



<form name= "cambiar_contra"method="post" action="../controllers/cambiarcontraseña.php">
  <label for="contraseña">Contraseña:</label><br>
   <input type="number" id="dni" name="contraseña" required="required"><br>
<input type="submit" value="Cambiar Contraseña"></input>
  </form>
</div>

</body>
</html>
