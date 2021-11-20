<?php

//controlador
require '../class_helper/seguridad.php';
require '../fw/fw.php';
require '../models/Usuario.php';
require '../views/IngresoAlSistema.php';
session_start();

if (count($_POST)>0){
if (!isset($_POST['dni'])){
header('Location:./IngresoAlSistema.php');
exit();
}
if (!isset($_POST['contra'])){
header('Location:./IngresoAlSistema.php');
exit();
}


$dni=$_POST['dni'];
$contra=$_POST["contra"];


$u = new usuario();

$datos=$u->datos($dni,$s);


	if (seguridad::verify_contra($contra,$datos))
	{
	
		if ($datos['tipo']==0){
			$_SESSION['idUsuario']=$dni;
			$_SESSION['tipoUsuario']=0;
			header('Location:./MenuPrincipalAdmin.php');
		}
		if ($datos['tipo']==1){
			$_SESSION['idUsuario']=$dni;
			$_SESSION['tipoUsuario']=1;
			header('Location:./MenuPrincipalPaciente.php');
		}
		if ($datos['tipo']==2){
			$_SESSION['idUsuario']=$dni;
			$_SESSION['tipoUsuario']=2;
			header('Location:./MenuPrincipalMedico.php');
		}	
	}
}

$v = new IngresoAlSistema();
$v->render();
?>


