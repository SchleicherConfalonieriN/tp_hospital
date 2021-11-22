<<?php 

require '../fw/fw.php';
require './Sesion.php';
require '../models/Medico.php';
require '../models/Turno.php';


$horario = $_POST['horario'];
$dni =$_POST['dni'];

$m = new medico ();


$m->cambiar_horario($dni,$horario);
header('Location:./ListadoMedicos.php');
 
?>