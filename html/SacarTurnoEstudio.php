<?php
//html
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sacar Turno</title>
	<link rel="stylesheet" type="text/css" href="../css/fondo.css">
	<link rel="stylesheet" type="text/css" href="../css/estilosvarios.css">

</head>
<body>
	<div>
		<form id="formulario" method="post">
			<label for="fecha">Fecha:</label><br>
			<input type="date" id="fecha" name="fecha" required="required"></br>
			<label for="hora">Hora:</label><br>
			<select name="hora" id="hora">
				<?php foreach($this->opciones as $o){ ?>
				<option value="<?=$o ?>"><?=$o ?></option><?php } ?>
			</select> 
			<h4><?=$this->mensaje ?></h4>
		</form> <br/>
		<button id="btnReservar">Reservar Turno</button>
		<br/>
	</div>
	<div>
	<a href="./VolverAlMenuPrincipal.php"><button>Volver</button></a>
	</div>
	<script type="text/javascript">
		document.getElementById("fecha").value="<?=$this->dia ?>";
		
		document.getElementById("fecha").onchange=function(){
			document.getElementById("hora").value=null;
			document.getElementById("formulario").submit();
		}
		
		document.getElementById("btnReservar").onclick=function(){
			document.getElementById("fecha").value="<?=$this->dia ?>";
			document.getElementById("formulario").submit();
		}		
	</script>

</body>
</html>