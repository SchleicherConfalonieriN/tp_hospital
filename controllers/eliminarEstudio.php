<<?php 
require '../fw/fw.php';
require './Sesion.php';
require '../models/estudios.php';
require '../class_helper/seguridad.php';


$id=($_POST['Eli_estudio']);



$s = new seguridad();


$e= new estudios();
$e->eliminar($id,$s);
header('Location:./menuPrincipalAdmin.php'); 


?>