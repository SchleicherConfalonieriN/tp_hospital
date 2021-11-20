
<?php

require '../class_helper/seguridad.php';
require '../fw/fw.php';
require '../models/Usuario.php';
require '../models/Turno.php';
require './Sesion.php';



if (!isset($_POST['contraseña'])){
header('Location:./IngresoAlSistema.php');
exit();
}
if (!isset($_SESSION['idUsuario'])){
header('Location:./IngresoAlSistema.php');
exit();
}


$contra= $_POST['contraseña'];
$dni = $_SESSION['idUsuario'];


$u = new usuario();


$u->cambiar_contraseña($dni,$contra);


 if($_SESSION['tipoUsuario']==0){
header('Location:./menuPrincipalAdmin.php');
 }

 if($_SESSION['tipoUsuario']==1){
header('Location:./menuPrincipalPaciente.php');
 }


if($_SESSION['tipoUsuario']==2){
header('Location:./menuPrincipalMedico.php');
 }
?>