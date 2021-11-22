<<?php 
require '../fw/fw.php';
require './Sesion.php';
require '../models/estudios.php';
require '../class_helper/seguridad.php';

// REVISION ELIMINAR ESTUDIO UTLIZAR

$nombre=($_POST['nombre']);


$e= new estudios();
$e->eliminar($nombre);
header('Location:./menuPrincipalAdmin.php'); 


?>