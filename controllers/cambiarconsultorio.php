<<?php 

require '../fw/fw.php';
require './Sesion.php';
require '../models/Medico.php';
require '../models/Turno.php';
require '../class_helper/seguridad.php';

$consultorio = $_POST['consultorio'];
$dni =$_POST['dni'];


$m = new medico ();
$s = new seguridad ();

$m->cambiar_consultorio($dni,$consultorio,$s);
header('Location:./menuPrincipalAdmin.php');
 ?>