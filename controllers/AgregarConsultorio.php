<?php 
require '../fw/fw.php';
require './Sesion.php';
require '../models/Consultorio.php';

$c= new Consultorio();

if(isset($_POST['consultorio'])){
	$consultorio= $_POST['consultorio'];
	if(!($c->existeConsultorio($consultorio))) $c->darDeAlta($consultorio);	
}
header('Location:./AdministracionInstalaciones.php');

 ?>