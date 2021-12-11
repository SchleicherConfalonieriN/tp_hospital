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
		<h1>Buscador de pacientes</h1>
		<form id="formulario" method="post">
			<label for="busq">Nombre/Apellido:</label><br/>
			<input type="text" id="busq" name="busq" /><br/><br/>
		</form> 
		
		<form id="formularioDos" method="post" action="../controllers/ConsultarTurnosPaciente.php">
			<input type="hidden" id="dni_paciente" name="dni_paciente"></input>
		</form> 

		<button id="btnBuscar">Buscar</button><br/><br/>

		<table id="tabla">
			<thead> 
				<tr>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Dni</th>
					<th></th>
				</tr>
			</thead>
			<tbody id="bodytabla">
			</tbody>
		</table>


		<br/>
		<a href="./VolverAlMenuPrincipal.php"><button>Volver</button></a>
	</div>
	<script type="text/javascript">
	
		function escapeHtml(texto) {
			return texto.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/"/g, "&quot;").replace(/'/g, "&#039;");
		}
		
		document.getElementById("btnBuscar").onclick=function(){
			document.getElementById("formulario").submit();
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
			
			objTdCuatro.innerHTML="<button>Consultar Turnos</button>";
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