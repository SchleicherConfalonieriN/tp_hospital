<?php 
require '../fw/fw.php';
require './Sesion.php';
require '../models/Especialidad.php';

$e=new Especialidad();

if(isset($_POST['especialidad'])){
	$nombre= $_POST['especialidad'];
	$e->darDeAlta($nombre);
}
header('Location:./AdministracionInstalaciones.php');



 ?>