<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
  
  <link rel="stylesheet" type="text/css" href="../css/admin.css">
  <link rel="stylesheet" type="text/css" href="../css/fondo.css">

</head>
<body>

<div id="app">

<div id="m">

<div class ="om" id="btn_medico"><input type="button" value="Medico">
</div>

<div class ="om" id="btn_estudio"><input type="button"value="Estudio">
</div>

<div class ="om"  id="btn_turno"><input type="button" value="Turno"> 
</div>


</div>


<div id="cont_admin">
    <div id="Admin_Medico">
      <?php require '../html/AdministracionMedico.php';    ?>
    </div>

    <div id="Admin_Estudio">
      <?php require '../html/AdministracionEstudios.php';  ?>
    </div>
    
    <div id="Admin_Turno">
      <?php require '../html/AdministracionTurnos.php';  ?>
    </div>
</div>



<div id="m_contra">
<form name= "cambiar_contra"method="post" action="../controllers/cambiarcontraseña.php">
  <label for="contraseña">Contraseña:</label><br>
   <input type="number" id="dni" name="contraseña" required="required"><br>
<input type="submit" value="Cambiar Contraseña"></input>
  </form>


</div>
<a href="./CerrarSesion.php"><button>Cerrar Sesión</button></a>
</div>
</div>


</div>
<script src="../js/menu.js" type="text/javascript"></script>
</body>
</html>
