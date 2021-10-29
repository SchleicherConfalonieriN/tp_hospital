<<?php 
require '../fw/fw.php';
require './Sesion.php';
require '../models/Medico.php';
require './seguridad.php';


$dni=($_POST['eliminar_dni']);



$s = new seguridad();

$verificacion=$s->dni_validacion($dni);
if($verificacion){
$m= new medico();
$m->eliminarMedico($dni);
header('Location:./menuPrincipalAdmin.php'); 
}

?>
 