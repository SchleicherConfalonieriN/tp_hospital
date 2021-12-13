<<?php 
require '../fw/fw.php';
require './Sesion.php';
require '../models/estudios.php';
require '../class_helper/seguridad.php';

// REVISION ELIMINAR ESTUDIO UTLIZAR


if(!isset($_POST['nombre'])){
	header('Location:./IngresoAlSistema.php'); 
	exit();
}


$nombre=($_POST['nombre']);


$e= new estudios();
$e->eliminar($nombre);
header('Location:./menuPrincipalAdmin.php'); 


?>