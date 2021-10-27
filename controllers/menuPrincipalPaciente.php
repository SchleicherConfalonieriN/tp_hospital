<?php
//controlador

require '../fw/fw.php';
require './Sesion.php';
require '../models/Usuario.php';
require '../models/Turno.php';
require '../views/MenuPrincipal.php';


if ($_SESSION['tipoUsuario']!=1)
{
	header('Location:./IngresoAlSistema.php');
	exit();
}

$dni=$_SESSION['idUsuario'];
$u = new usuario();
$u->cargarDatos($dni);

$t = new Turno();
$todosLosTurnos=$t->GetTodosPorUsuario($dni);



$v= new MenuPrincipal();
$v->usuario=$u;
$v->turnos=$todosLosTurnos;
$v->render();