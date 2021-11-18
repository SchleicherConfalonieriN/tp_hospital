<?php

//controlador
require '../class_helper/seguridad.php';
require '../fw/fw.php';
require '../models/Usuario.php';
require '../models/Turno.php';
require './Sesion.php';



if(!isset($_GET['id'])) {
	header('Location:./IngresoAlSistema.php');
	exit();

}else{


$id_turno=($_GET['id']);
//validar

$t=new Turno();

if($_SESSION['tipoUsuario']==0){
	$t->anularTurno($id_turno,$s);
	header('Location:./MenuPrincipalAdministracion.php');
	exit();
}

$dni_usuario=$_SESSION['idUsuario'];

if(!$t->coincideIdYUsuario($id_turno,$dni_usuario,$s)){
	header('Location:./MenuPrincipalPaciente.php');
	exit();
}
$t->anularTurno($id_turno,$s);
if($_SESSION['tipoUsuario']==2) {
	header('Location:./MenuPrincipalMedico.php');
	exit();
}

}
header('Location:./MenuPrincipalPaciente.php');

