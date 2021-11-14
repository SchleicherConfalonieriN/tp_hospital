<?php
//controlador

require '../fw/fw.php';
require './Sesion.php';
require '../models/Medico.php';
require '../models/estudios.php';
require '../models/Turno.php';
require '../views/MenuPrincipal.php';
require '../class_helper/seguridad.php';

if ($_SESSION['tipoUsuario']!=1)
{
	header('Location:./IngresoAlSistema.php');
	exit();
}


$dni=$_SESSION['idUsuario'];

$e = new estudios();
$u = new usuario();
$s = new seguridad();
$m = new  medico();
$datos=$u->datos($dni,$s);

$t = new Turno();
$todosLosTurnos=$t->GetTurnosPorUsuario($dni,$s);
$todosLosEstudios=$t->GetEstudiosPorUsuario($dni,$s);




$v= new MenuPrincipal();

$v->info_medico = $m->informacion($dni,$s);
$v->usuario=$datos;
$v->turnos=$todosLosTurnos;
$v->estudios=$todosLosEstudios;
$v->render();