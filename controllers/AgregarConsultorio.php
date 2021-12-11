<?php 
require '../fw/fw.php';
require './Sesion.php';
require '../models/Consultorio.php';

$c= new Consultorio();
$consultorio= $_POST['consultorio'];


if(isset($consultorio)){
	if(!($c->existeConsultorio($consultorio))) $c->darDeAlta($consultorio);	
}
header('Location:./AdministracionInstalaciones.php');

 ?>