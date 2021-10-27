<?php

//controlador
require '../fw/fw.php';
require '../models/Usuario.php';
require '../views/IngresoAlSistema.php';

session_start();
if(isset($_POST['dni'])){
	$u = new usuario();
//validar
	if ($u->intentarLoguear($_POST["dni"],$_POST["contra"]))
	{
		$dni=$_POST["dni"];
		if ($u->tipoDeUsuario($dni)==0){
			$_SESSION['idUsuario']=$dni;
			$_SESSION['tipoUsuario']=0;
			header('Location:./menuPrincipalAdministracion.php');
		}
		if ($u->tipoDeUsuario($dni)==1){
			$_SESSION['idUsuario']=$dni;
			$_SESSION['tipoUsuario']=1;
			header('Location:./menuPrincipalPaciente.php');
		}
		if ($u->tipoDeUsuario($dni)==2){
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

