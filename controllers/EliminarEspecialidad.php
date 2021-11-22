<?php 
require '../fw/fw.php';
require './Sesion.php';
require '../models/Especialidad.php';


$e=new Especialidad();
$id= $_GET['id'];
if(isset($id)){
$e->eliminarEspecialidad($id);
}
header('Location:./AdministracionInstalaciones.php');
 ?>