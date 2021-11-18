<<?php 

require '../class_helper/seguridad.php';
require '../fw/fw.php';
require './Sesion.php';
require '../models/estudios.php';



$id=($_POST['Eli_estudio']);


$e= new estudios();
$e->eliminar($id,$s);
header('Location:./menuPrincipalAdmin.php'); 


?>