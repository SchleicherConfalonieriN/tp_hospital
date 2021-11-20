<<?php 
require '../class_helper/seguridad.php';
require '../fw/fw.php';
require './Sesion.php';
require '../models/Medico.php';
require '../models/Usuario.php';


if(!isset($_POST['agregar_dni'])){
    header('Location:./IngresoAlSistema.php');
    exit();
}


if(!isset($_POST['agregar_nombre'])){
    header('Location:./IngresoAlSistema.php');
    exit();
}

if(!isset($_POST['agregar_apellido'])){
    header('Location:./IngresoAlSistema.php');
    exit();
}

if(!isset($_POST['agregar_contra'])){
    header('Location:./IngresoAlSistema.php');
    exit();
}

if(!isset($_POST['agregar_mail'])){
    header('Location:./IngresoAlSistema.php');
    exit();
}
if(!isset($_POST['agregar_especialidad'])){
    header('Location:./IngresoAlSistema.php');
    exit();
}
if(!isset($_POST['gr1'])){
    header('Location:./IngresoAlSistema.php');
    exit();
}
if(!isset($_POST['horario'])){
    header('Location:./IngresoAlSistema.php');
    exit();
}
if(!isset($_POST['consultorio'])){
    header('Location:./IngresoAlSistema.php');
    exit();
}


	$dni=($_POST['agregar_dni']);
	$nombre=$_POST['agregar_nombre'];
	$apellido=$_POST['agregar_apellido'];
	$contra=$_POST['agregar_contra'];
	$mail=$_POST['agregar_mail'];
	$especialidad=$_POST['agregar_especialidad'];
	$tipo=$_POST['gr1'];
	$horario=$_POST['horario'];
	$consultorio=$_POST['consultorio'];

		if ($tipo==2){

			$m = new medico();
			$m->registroMedico ($dni, $nombre, $apellido, $contra, $mail, $especialidad,$tipo,$horario,$consultorio);
			
			header('Location:./menuPrincipalAdmin.php'); 
			}

		else{
			$m=new usuario();
			$m->DarDeAlta($dni,$nombre,$apellido,$contra,$mail,$tipo);
			}
			header('Location:./menuPrincipalAdmin.php'); 

?>