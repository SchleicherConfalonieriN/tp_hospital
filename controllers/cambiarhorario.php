<<?php 

require '../class_helper/seguridad.php';
require '../fw/fw.php';
require './Sesion.php';
require '../models/Medico.php';
require '../models/Turno.php';




if (!isset($_POST['dni'])){
header('Location:./IngresoAlSistema.php');
exit();
}


if (!isset($_POST['horario'])){
header('Location:./IngresoAlSistema.php');
exit();
}


$horario = $_POST['horario'];
$dni =$_POST['dni'];



$m = new medico ();
$s = new seguridad ();

$m->cambiar_horario($dni,$horario);
header('Location:./menuPrincipalAdmin.php');
 ?>