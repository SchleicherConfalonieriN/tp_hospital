<<?php 

require '../class_helper/seguridad.php';
require '../fw/fw.php';
require './Sesion.php';
require '../models/Medico.php';
require '../models/Turno.php';


$consultorio = $_POST['consultorio'];
$dni =$_POST['dni'];


$m = new medico ();


$m->cambiar_consultorio($dni,$consultorio,$s);
header('Location:./menuPrincipalAdmin.php');
 ?>