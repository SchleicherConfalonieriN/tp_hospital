<?php

require '../fw/fw.php';
require '../models/Usuario.php';
require '../models/Turno.php';
require './Sesion.php';


if ($_SESSION['tipoUsuario']!=1)
{
	header('Location:./menuPrincipalPaciente.php');
	exit();
}

if(!isset($_GET['id'])) {
	header('Location:./menuPrincipalPaciente.php');
	exit();
}

if(!ctype_digit($_GET['id'])) {
	header('Location:./menuPrincipalPaciente.php');
	exit();
}

$id_turno=($_GET['id']);
$dni_paciente=$_SESSION['idUsuario'];

$t=new Turno();

//verifico que el turno a anular corresponda al usuario logueado
if(!$t->coincideIdYPaciente($id_turno,$dni_paciente)){
	header('Location:./menuPrincipalPaciente.php');
	exit();
}


$t->anularTurno($id_turno);
header('Location:./menuPrincipalPaciente.php');


