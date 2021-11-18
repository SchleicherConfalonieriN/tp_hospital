<<?php 


require '../class_helper/seguridad.php';
require '../fw/fw.php';
require './Sesion.php';
require '../models/Medico.php';


$dni=($_POST['eliminar_dni']);

$m= new medico();
$m->eliminarMedico($dni,$s);
header('Location:./menuPrincipalAdmin.php'); 


?>
 