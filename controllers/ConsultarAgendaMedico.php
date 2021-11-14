<?php
//controlador

require '../fw/fw.php';
require './Sesion.php';
require '../models/Medico.php';
require '../models/Turno.php';
require '../views/ConsultarAgendaMedico.php';
require '../views/MenuPrincipalMedico.php';


if ($_SESSION['tipoUsuario']==2)
{
	$dni=$_SESSION['idUsuario'];
	$u = new usuario();
	$datosDelUsuario=$u->getDatos($dni,$s);
}

if ($_SESSION['tipoUsuario']==0)
{
	if(!(isset($_GET['id']))) header('Location:./MenuPrincipalAdministracion.php');
	//validar
	$dni=$_GET['id'];
	$u = new usuario();
	$datosDelUsuario=$u->getDatos($dni,$s);
}


$t = new Turno();
$hoy=date("Y-m-d");
$fecha=$hoy;
if(isset($_GET['fecha'])) $fecha=$_GET['fecha']; //validarrrrrr
$fecha=date("Y-m-d",strtotime($fecha));
$turnosAgendados=$t->getTodosPorMedicoYFecha($dni, $fecha,$s);

$m=new Medico();
$posiblesTurnos=$m->generarHorariosDeAtencion($dni,$s);

$turno=[];
$todosLosTurnos=[];

foreach ($posiblesTurnos as $pt){
	$libre=true;
	$turno['hora']=$pt;	
	$turno['paciente']="Libre";
	$turno['consultorio']=0;
	$turno['libre']=$libre;
	foreach ($turnosAgendados as $ta){
		$aux=date("H:i",strtotime($ta['hora']));
		if ($pt==$aux){
			$libre=false;
			$turno['consultorio']=$ta['consultorio'];
			$turno['paciente']=$ta['nombre'] . " " . $ta['apellido'];
			$turno['id']=$ta['turno_id'];			
		}
		$turno['libre']=$libre;
	}	
	array_push($todosLosTurnos,$turno);
}

if ($_SESSION['tipoUsuario']==2){
	$v= new MenuPrincipalMedico();
	$v->fecha=$fecha;
	$v->usuario=$datosDelUsuario;
	$v->turnos=$todosLosTurnos;
	$v->render();
	exit();
}

if ($_SESSION['tipoUsuario']==0){
	$v= new ConsultarAgendaMedico();
	$v->fecha=$fecha;
	$v->usuario=$datosDelUsuario;
	$v->turnos=$todosLosTurnos;
	$v->render();
	exit();
}

header('Location:./IngresoAlSistema.php');