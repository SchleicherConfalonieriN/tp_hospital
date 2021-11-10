<?php

//controlador
require '../class_helper/seguridad.php';
require '../fw/fw.php';
require '../models/Usuario.php';
require '../views/IngresoAlSistema.php';
session_start();

if(isset($_POST['dni'],$_POST["contra"])){
$dni=$_POST['dni'];
$contra=$_POST["contra"];


$u = new usuario();
$s=new seguridad();

$datos=$u->datos($dni,$s);


	if ($s->verify_contra($contra,$datos))
	{
	
		if ($datos['tipo']==0){
			$_SESSION['idUsuario']=$dni;
			$_SESSION['tipoUsuario']=0;
			header('Location:./menuPrincipalAdmin.php');
		}
		if ($datos['tipo']==1){
			$_SESSION['idUsuario']=$dni;
			$_SESSION['tipoUsuario']=1;
			header('Location:./menuPrincipalPaciente.php');
		}
		if ($datos['tipo']==2){
			$_SESSION['idUsuario']=$dni;
			$_SESSION['tipoUsuario']=2;
			header('Location:./menuPrincipalMedico.php');
		}	
	}
}
$v = new IngresoAlSistema();
$v->render();
?>
<!--como seria el html -->

