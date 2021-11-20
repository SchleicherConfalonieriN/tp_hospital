<<?php 


require '../class_helper/seguridad.php';
require '../fw/fw.php';
require './Sesion.php';
require '../models/Medico.php';


if (!isset($_POST['eliminar_dni'])){
header('Location:./IngresoAlSistema.php');
exit();
}

$dni=($_POST['eliminar_dni']);

$m= new medico();
$m->eliminarMedico($dni);
header('Location:./menuPrincipalAdmin.php'); 


?>
 