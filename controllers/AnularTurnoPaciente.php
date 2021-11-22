<?php

require '../fw/fw.php';
require '../models/Turno.php';
require '../models/Medico.php';
require '../views/AnularTurnoPaciente.php';
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
$t=new Turno();
$m=new Medico();

$datosDeTurno=$t->getDatosTurno($id_turno);
$nombreDelMedico=$m->nombreYApellido($datosDeTurno['dni_medico']);





$dni_paciente=$_SESSION['idUsuario'];

$v= new AnularTurnoPaciente();
$v->medico=$nombreDelMedico;
$v->turno=$datosDeTurno;
$v->render();

//$t=new Turno();

//verifico que el turno a anular corresponda al usuario logueado
//if(!$t->coincideIdYPaciente($id_turno,$dni_paciente)){
//	header('Location:./menuPrincipalPaciente.php');
//	exit();
//}


//$t->anularTurno($id_turno);
//header('Location:./menuPrincipalPaciente.php');


