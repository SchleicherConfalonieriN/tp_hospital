<<?php 

require '../class_helper/seguridad.php';
require '../fw/fw.php';
require './Sesion.php';
require '../models/estudios.php';

if (!isset($_POST['Eli_estudio'])){
header('Location:./IngresoAlSistema.php');
exit();
}

$id=($_POST['Eli_estudio']);


$e= new estudios();
$e->eliminar($id);
header('Location:./menuPrincipalAdmin.php'); 


?>