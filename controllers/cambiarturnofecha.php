<<?php 

require '../class_helper/seguridad.php';
require '../fw/fw.php';
require './Sesion.php';
require '../models/Medico.php';
require '../models/Turno.php';


if (!isset($_POST['hora'])){
header('Location:./IngresoAlSistema.php');
exit();
}
if (!isset($_POST['fecha'])){
header('Location:./IngresoAlSistema.php');
exit();
}
if (!isset($_POST['dni'])){
header('Location:./IngresoAlSistema.php');
exit();
}


$fecha=$_POST['fecha'];
$hora=$_POST['hora'];
$dni=$_POST['dni'];

$t= new Turno();

$t->cambiarTurnoFecha($dni,$fecha,$hora,$s);

header('Location:./MenuPrincipalMedico.php')
 ?>