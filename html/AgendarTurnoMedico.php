<?php
//html
?>

<!DOCTYPE html>
<html>
<head>
	<title>Buscador de pacientes</title>
	<link rel="stylesheet" type="text/css" href="../css/fondo.css">
	<link rel="stylesheet" type="text/css" href="../css/estilosvarios.css">	
</head>
<body>
	<div>
		<h2>Agendar turno para el dia <?= htmlentities(date("d-m-Y", strtotime($this->dia))) ?> a las <?= htmlentities($this->hora) ?> horas</h2>
		<form id="formulario" method="post">
			<label for="busq">Nombre/Apellido:</label><br/>
			<input type="text" id="busq" name="busq" minlength="2" /><br/>
		</form> 
		
		<form id="formularioDos" method="post">
			<input type="hidden" id="dni_paciente" name="dni_paciente"></input>
		</form>
		
		<button id="btnBuscar">Buscar</button>

		<table id="tabla">
			<thead> 
				<tr><?php if (count($this->pacientes)>0){ ?>
					<th><?= htmlentities('Nombre')?></th>
					<th><?= htmlentities('Apellido')?></th>
					<th><?= htmlentities('Dni')?></th>
					<th></th> <?php }?>
				</tr>
			</thead>
			<tbody id="bodytabla">
			</tbody>
		</table>
		
		<?php if (count($this->pacientes)==0) echo  htmlentities('No se obtuvieron resultados')?>
		<h3><?= htmlentities($this->mensaje) ?></h3>
		<br/>
		<a href="./VolverAlMenuPrincipal.php"><button>Volver</button></a>
	</div>

	
	<script type="text/javascript">

		function escapeHtml(texto) {
			return texto.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/"/g, "&quot;").replace(/'/g, "&#039;");
		}
		
		document.getElementById("btnBuscar").onclick=function(){
			if (document.getElementById("busq").checkValidity()==true){
				document.getElementById("formulario").submit();
			}
			else alert("Debe ingresar por lo menos dos caracteres");
		}	
		
		var datos= <?php echo json_encode($this->pacientes) ?>;
		
		datos.forEach(function(valor,indice){
			objTr = document.createElement("tr");
			objTdUno = document.createElement("td");
			objTdDos = document.createElement("td");
			objTdTres = document.createElement("td");
			objTdCuatro = document.createElement("td");
			
			objTdUno.innerHTML=escapeHtml(valor['nombre']);
			objTr.appendChild(objTdUno);
			
			objTdDos.innerHTML=escapeHtml(valor['apellido']);
			objTr.appendChild(objTdDos);
			
			objTdTres.innerHTML=valor['dni'];
			objTr.appendChild(objTdTres);
			
			objTdCuatro.innerHTML="<button>Agendar Turno</button>";
			objTdCuatro.onclick=function(){
				document.getElementById("dni_paciente").value=valor['dni'];
				document.getElementById("formularioDos").submit();
			}
			objTr.appendChild(objTdCuatro);
			document.getElementById("bodytabla").appendChild(objTr);
		});	
	</script>

</body>
</html>