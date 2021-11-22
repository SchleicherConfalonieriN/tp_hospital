<<?php 
require '../fw/fw.php';
require './Sesion.php';
require '../models/Consultorio.php';

$c=new Consultorio();
$id= $_GET['id'];
if(isset($id)){
$c->eliminarConsultorio($id);
}
header('Location:./AdministracionInstalaciones.php');
 ?>