<?php 

require '../class_helper/seguridad.php';
require '../fw/fw.php';
require '../models/Usuario.php';
require '../models/Turno.php';
require './Sesion.php';


if($_SESSION['tipoUsuario']==0){
$id = $_POST['id'];



if (!isset($_POST['id'])){
header('Location:./IngresoAlSistema.php');
exit();
}


$t=new Turno();

$t->anularTurno($id,$s);
header('Location:./menuPrincipalAdmin.php');
 }

 if($_SESSION['tipoUsuario']==1){
$id = $_POST['id'];

$t=new Turno();

$t->anularTurno($id,$s);
header('Location:./menuPrincipalPaciente.php');
 }


if($_SESSION['tipoUsuario']==2){
$id = $_POST['id'];

$t=new Turno();

$t->anularTurno($id,$s);
header('Location:./menuPrincipalMedico.php');
 }

 
 ?>