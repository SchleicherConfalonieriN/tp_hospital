
<?php


require '../fw/fw.php';
require '../models/Usuario.php';
require '../models/Turno.php';
require './Sesion.php';

if(!(isset($_SESSION['idUsuario']))){
	header('Location:./VolverAlMenuPrincipal.php');
	exit();
}
$dni = $_SESSION['idUsuario'];


$u = new usuario();

if (isset($_POST['contra'])){
	$contra= $_POST['contra'];
	if (strlen($contra)>5){
		$u->cambiarContrasenia($dni,$contra);
	}	
}

header('Location:./VolverAlMenuPrincipal.php');
?>