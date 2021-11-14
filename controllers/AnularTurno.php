<?php

//controlador

require '../fw/fw.php';
require '../models/Usuario.php';
require '../models/Turno.php';
require './Sesion.php';
require '../class_helper/seguridad.php';
$s=new seguridad();

if(!isset($_GET['id'])) {
	header('Location:./IngresoAlSistema.php');
	exit();
}

if(!ctype_digit($_GET['id'])) {
	header('Location:./IngresoAlSistema.php');
	exit();
}

$id_turno=($_GET['id']);
//validar

$t=new Turno();

if($_SESSION['tipoUsuario']==0){
	$t->anularTurno($id_turno,$s);
	header('Location:./MenuPrincipalAdministracion.php');
	exit();
}

$dni_usuario=$_SESSION['idUsuario'];
//validar

//verifico que el turno a anular corresponda al usuario logueado
if(!$t->coincideIdYUsuario($id_turno,$dni_usuario,$s)){
	header('Location:./MenuPrincipalPaciente.php');
	exit();
}
$t->anularTurno($id_turno,$s);
if($_SESSION['tipoUsuario']==2) {
	header('Location:./MenuPrincipalMedico.php');
	exit();
}
header('Location:./MenuPrincipalPaciente.php');

