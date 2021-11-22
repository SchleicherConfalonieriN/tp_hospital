<?php 
require '../fw/fw.php';
require './Sesion.php';
require '../models/Especialidad.php';

$e=new Especialidad();
$nombre= $_POST['especialidad'];


if(isset($nombre)){
$e->darDeAlta($nombre);
}
header('Location:./AdministracionInstalaciones.php');



 ?>