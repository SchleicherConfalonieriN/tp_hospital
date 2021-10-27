<?php

//controlador

require '../fw/fw.php';
require './Sesion.php';
require '../models/Medico.php';
require '../models/Turno.php';
require '../views/SacarTurnoConMedico.php';



if(!isset($_GET['id'])) {
	header('Location:./IngresoAlSistema.php');
	exit();
}

if(!ctype_digit($_GET['id'])){
	header('Location:./IngresoAlSistema.php');
	exit();
}

$dni_medico=$_GET['id'];

$m=new Medico();
$t=new Turno();
$TurnosDisponibles=[];

if(isset($_GET['dia'])){
	//vlidar fecha
	$fecha=$_GET('dia');
	
	$turnosPosibles=$m->generarHorariosDeAtencion();
	
	$turnosAgendados=$t->getTurnosAgendados($dni_medico,$fecha);
	
	foreach($turnosPosibles as $tp){
		$libre=true;
		foreach($turnosAgendados as $ta){
			if($tp==$ta['hora']) $libre=false;
		}
		if ($libre=true) array_push($turnosDisponibles,$tp);
	}
	
}

$v=new SacarTurnoConMedico();
$v->opciones=$TurnosDisponibles=[];
$v->render();








