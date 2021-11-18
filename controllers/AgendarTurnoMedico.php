<?php

//controlador
require '../class_helper/seguridad.php';
require '../fw/fw.php';
require './Sesion.php';
require '../models/Usuario.php';
require '../models/Medico.php';
require '../models/Turno.php';
require '../views/AgendarTurnoMedico.php';


if(($_SESSION['tipoUsuario']!=2)and($_SESSION['tipoUsuario']!=0)){
	header('Location:./IngresoAlSistema.php');
	exit();
}

if ($_SESSION['tipoUsuario']==2){
	if(!isset($_GET['dia'])){
		header('Location:./MenuPrincipalMedico.php');
		exit();
	}
	if(!isset($_GET['hora'])){
		header('Location:./MenuPrincipalMedico.php');
		exit();
	}
	$dni_medico=$_SESSION['idUsuario'];
}

if ($_SESSION['tipoUsuario']==0){
	if(!isset($_GET['dia'])){
		header('Location:./MenuPrincipalAdministracion.php');
		exit();
	}
	if(!isset($_GET['hora'])){
		header('Location:./MenuPrincipalAdministracion.php');
		exit();
	}
	if(!isset($_GET['dnimedico'])){
		header('Location:./MenuPrincipalAdministracion.php');
		exit();
	}
	$dni_medico=$_GET['dnimedico'];
	
}
//validar dnimedico
$m=new Medico();
$u=new Usuario();
$t=new Turno();
$fecha=date("Y-m-d", strtotime($_GET['dia']));
//validar fecha
$hora=date("H:i", strtotime($_GET['hora']));
//validar hora
$posiblesPacientes=[];

if (isset($_POST['dni_paciente'])){
	//validarrrr
	$dni_paciente=$_POST['dni_paciente'];
	$t->agendarTurno($dni_medico,$dni_paciente,$fecha,$hora,$s);
	if ($_SESSION['tipoUsuario']==2){
		header('Location:./MenuPrincipalMedico.php');
		exit();
	}
	header('Location:./MenuPrincipalAdministracion.php');
	exit();
}

if (isset($_POST['busq'])){
	//Aca hay que validarrrr
	$busqueda=$_POST['busq'];
	$posiblesPacientes= $u->buscarPorNombreApellido($busqueda,$s);
}

$v=new AgendarTurnoMedico();
$v->pacientes=$posiblesPacientes;
$v->dia=$fecha;
$v->hora=$hora;
$v->render();
	












