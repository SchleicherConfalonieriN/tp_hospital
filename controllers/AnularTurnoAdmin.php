<?php 
require '../fw/fw.php';
require '../models/Usuario.php';
require '../models/Turno.php';
require './Sesion.php';





if($_SESSION['tipoUsuario']==0){
$id = $_POST['id'];

$t=new Turno();

$t->anularTurno($id);
header('Location:./menuPrincipalAdmin.php');
 }

 if($_SESSION['tipoUsuario']==1){
$id = $_POST['id'];

$t=new Turno();

$t->anularTurno($id);
header('Location:./menuPrincipalPaciente.php');
 }


if($_SESSION['tipoUsuario']==2){
$id = $_POST['id'];

$t=new Turno();

$t->anularTurno($id);
header('Location:./menuPrincipalMedico.php');
 }
 ?>