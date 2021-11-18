<?php

//controlador
require '../class_helper/seguridad.php';
require '../fw/fw.php';
require './Sesion.php';
require '../models/estudios.php';
require '../models/Turno.php';
require '../views/SacarTurnoEstudio.php';



if(!isset($_GET['id'])){
	header('Location:./IngresoAlSistema.php');
	exit();
}



$id_estudio=$_GET['id'];
$dni_usuario=$_SESSION['idUsuario'];//isset en require session

$e=new estudios();
$t=new Turno();
$turnosDisponibles=[];
$fecha=date("Y-m-d");;
$mensaje="";


if(isset($_POST['fecha'])){
	//vlidar fecha
	$fecha=$_POST['fecha'];
	$fecha=date("Y-m-d", strtotime($fecha));
	
	$fechavalida=true;
	$hoy=date("Y-m-d");
	if($fecha<=$hoy) {
		$fechavalida=false;
		$mensaje="No se puede sacar turno para una fecha anterior al dia de hoy";
	} //no se puede sacar turno para un dia que ya pasó
	$enDosSemanas=date("Y-m-d", strtotime($hoy.'+ 15 days')); 
	if($fecha>$enDosSemanas) {
		$fechavalida=false;
		$mensaje="Se puede sacar turno para dentro de 15 dias como máximo";
		}
	$diaDeLaSemana=date('N',strtotime($fecha));
	if($diaDeLaSemana>5) {
		$fechavalida=false;
		$mensaje="No se puede sacar turno para dias sábados ni domingos";
	} 
	
	if ($fechavalida==true){
	
		$turnosPosibles=$e->generarHorariosDeEstudios($id_estudio,$s);
		
		$turnosAgendados=$t->getTurnosAgendados($id_estudio,$fecha,$s);
		

		foreach($turnosPosibles as $tp){
			$libre=true;
			foreach($turnosAgendados as $ta){
				$aux=date("H:i",strtotime ($ta['hora']));
				if($tp==$aux) $libre=false;
			}
			if ($libre==true) array_push($turnosDisponibles,$tp);
		}
		if(count($turnosDisponibles)==0) $mensaje="No hay turnos disponibles para la fecha seleccionada";
		
		if(isset($_POST['hora'])){
			//validar hora
			$hora=$_POST['hora'];
			$t->agendarTurno($id_estudio,$dni_usuario,$fecha,$hora,$s);
			header('Location:./MenuPrincipalPaciente.php');
			exit();
	}
}

	
}

	$v=new SacarTurnoEstudio();
	$v->opciones=$turnosDisponibles;
	$v->dia=$fecha;
	$v->mensaje=$mensaje;
	$v->render();









