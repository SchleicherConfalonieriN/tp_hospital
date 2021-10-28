<?php

//controlador
require '../fw/fw.php';
require '../models/Usuario.php';
require '../views/IngresoAlSistema.php';

session_start();
if(isset($_POST['dni'])){
	$u = new usuario();

	if ($u->intentarLoguear($_POST["dni"],$_POST["contra"]))
	{
		$dni=$_POST["dni"];
		if ($u->tipoDeUsuario()==0){
			$_SESSION['idUsuario']=$dni;
			$_SESSION['tipoUsuario']=0;
			header('Location:./menuPrincipalAdmin.php');
		}
		if ($u->tipoDeUsuario()==1){
			$_SESSION['idUsuario']=$dni;
			$_SESSION['tipoUsuario']=1;
			header('Location:./menuPrincipalPaciente.php');
		}
		if ($u->tipoDeUsuario()==2){
			$_SESSION['idUsuario']=$dni;
			$_SESSION['tipoUsuario']=2;
			header('Location:./menuPrincipalMedico.php');
		}
	}; 
};
$v = new IngresoAlSistema();
$v->render();
?>
<!--como seria el html -->

