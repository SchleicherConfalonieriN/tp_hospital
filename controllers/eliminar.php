<<?php 
require '../fw/fw.php';
require './Sesion.php';
require '../models/Medico.php';


if(!isset($_GET['dni'])){
	header('Location:./IngresoAlSistema.php'); //si no tiene el valor de id que vuelva
	exit();
}


$dni=($_GET['dni']);


$m= new medico();
$m->eliminarMedico($dni);
header('Location:./ListadoMedicos.php'); 

?>
 