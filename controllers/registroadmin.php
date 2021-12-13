POST<<?php 
require '../fw/fw.php';
require './Sesion.php';
require '../models/Medico.php';
require '../class_helper/seguridad.php';




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


if(!isset($_POST['tipo'])){
    header('Location:./IngresoAlSistema.php'); 
    exit();
}


	$dni=($_POST['agregar_dni']);
	$nombre=$_POST['agregar_nombre'];
	$apellido=$_POST['agregar_apellido'];
	$contra=$_POST['agregar_contra'];
	$mail=$_POST['agregar_mail'];
	$especialidad=$_POST['agregar_especialidad'];
	$tipo=$_POST['tipo'];



		if ($tipo==2){
			if(!isset($_POST['agregar_especialidad'])){
    			header('Location:./IngresoAlSistema.php'); 
   			 	exit(); 	
			}


			$m = new medico();
			$m->registroMedico ($dni, $nombre, $apellido, $contra, $mail, $especialidad,$tipo,$s);
			
			header('Location:./menuPrincipalAdmin.php'); 
			}

		else{
			$m=new usuario();
			$m->DarDeAlta($dni,$nombre,$apellido,$contra,$mail,$tipo,$s);
			}
			header('Location:./menuPrincipalAdmin.php'); 

?>