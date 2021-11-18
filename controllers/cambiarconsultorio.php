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

if (!isset($_POST['consultorio'])){
header('Location:./IngresoAlSistema.php');
exit();
}


$consultorio = $_POST['consultorio'];
$dni =$_POST['dni'];


$m = new medico ();


$m->cambiar_consultorio($dni,$consultorio,$s);
header('Location:./menuPrincipalAdmin.php');
 ?>