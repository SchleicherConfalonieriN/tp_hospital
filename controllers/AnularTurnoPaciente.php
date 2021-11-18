<?php

require '../fw/fw.php';
require '../models/Turno.php';;
require '../models/Medico.php';
require '../views/AnularTurnoPaciente.php';
require '../views/AnularTurnoMedico.php';
require '../views/AnularTurnoAdministracion.php';
require './Sesion.php';
require '../class_helper/seguridad.php';


if(!isset($_GET['id'])) {
	header('Location:./IngresoAlSistema.php');
	exit();
}

if(!ctype_digit($_GET['id'])) {
	header('Location:./IngresoAlSistema.php');
	exit();
}

if ($_SESSION['tipoUsuario']==1)
{
	$id_turno=($_GET['id']);
	$t=new Turno();
	$m=new Medico();

	$datosDeTurno=$t->getDatosTurno($id_turno);
	$nombreDelMedico=$m->nombreYApellido($datosDeTurno['servicio'],$s);
	
	$dni_paciente=$_SESSION['idUsuario'];

	$v= new AnularTurnoPaciente();
	
	$v->medico=$nombreDelMedico;
	$v->turno=$datosDeTurno;
	$v->render();
	exit();
}
if ($_SESSION['tipoUsuario']==2)
{
	$id_turno=($_GET['id']);
	$t=new Turno();
	$u=new Usuario();

	$datosDeTurno=$t->getDatosTurno($id_turno,$s);
	$nombreDelPaciente=$u->nombreYApellido($datosDeTurno['dni_paciente'],$s);

	$dni_paciente=$_SESSION['idUsuario'];

	$v= new AnularTurnoMedico();
	$v->paciente=$nombreDelPaciente;
	$v->turno=$datosDeTurno;
	$v->render();
	exit();
}

if ($_SESSION['tipoUsuario']==0)
{
	$id_turno=($_GET['id']);
	$t=new Turno();
	$u=new Usuario();
	$m=new Medico();

	$datosDeTurno=$t->getDatosTurno($id_turno,$s);
	

	$nombreDelPaciente=$u->nombreYApellido($datosDeTurno['dni_paciente'],$s);
		
	$nombreDelMedico=" ";
	$nombreDelMedico=$m->nombreYApellido($datosDeTurno['servicio'],$s);
	
	$v= new AnularTurnoAdministracion();
	$v->paciente=$nombreDelPaciente;
	$v->medico=$nombreDelMedico;
	$v->turno=$datosDeTurno;
	$v->render();
	exit();
}
header('Location:./IngresoAlSistema.php');


