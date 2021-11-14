<<?php 

require '../fw/fw.php';
require './Sesion.php';
require '../models/Medico.php';
require '../models/Turno.php';
require '../class_helper/seguridad.php';


$fecha=$_POST['fecha'];
$hora=$_POST['hora'];
$dni=$_POST['dni'];
$s= new seguridad();
$t= new Turno();

$t->cambiarTurnoFecha($dni,$fecha,$hora,$s);

header('Location:./MenuPrincipalMedico.php')
 ?>