<?php
require '../class_helper/seguridad.php';
require '../fw/fw.php';
require '../models/Turno.php';
require '../models/Usuario.php';
require '../models/estudios.php';
require '../views/AnularEstudio.php';
require './Sesion.php';



if ($_SESSION['tipoUsuario']!=1)
{
	header('Location:./menuPrincipalPaciente.php');
	exit();
}




$t=new Turno();
$e=new estudios();



if(!isset($_GET['id'])) {
	header('Location:./menuPrincipalPaciente.php');
	exit();
}

$id_turno=($_GET['id']);
$datosDeTurno=$t->getDatosTurno($id_turno,$s);
$nombreDelEstudio=$e->getDatosEstudio($datosDeTurno['servicio'],$s);



$dni_paciente=$_SESSION['idUsuario'];

$v= new AnularEstudio();
$v->estudio=$nombreDelEstudio;
$v->turno=$datosDeTurno;
$v->render();



