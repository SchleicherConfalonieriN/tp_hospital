<?php

session_start();
if (!isset($_SESSION['tipoUsuario']))
{
	header('Location:./IngresoAlSistema.php');
	exit();
}
if ($_SESSION['tipoUsuario']==0){
	header('Location:./MenuPrincipalAdministracion.php');
	exit();
}
if ($_SESSION['tipoUsuario']==1){
	header('Location:./MenuPrincipalPaciente.php');
	exit();
}
if ($_SESSION['tipoUsuario']==2){
	header('Location:./MenuPrincipalMedico.php');
	exit();
}
header('Location:./IngresoAlSistema.php');