<<?php 
require '../fw/fw.php';
require './Sesion.php';
require '../models/Medico.php';



$dni=($_GET['dni']);




$m= new medico();
$m->eliminarMedico($dni);
header('Location:./ListadoMedicos.php'); 

?>
 