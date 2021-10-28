<<?php 
require '../fw/fw.php';
require './Sesion.php';
require '../models/Medico.php';


	$dni=($_POST['agregar_dni']);
	$nombre=$_POST['agregar_nombre'];
	$apellido=$_POST['agregar_apellido'];
	$contra=$_POST['agregar_contra'];
	$mail=$_POST['agregar_mail'];
	$especialidad=$_POST['agregar_especialidad'];
	$tipo=$_POST['tipo'];


	
if ($tipo==2){

$m = new medico();
$m->registroMedico ($dni, $nombre, $apellido, $contra, $mail, $especialidad,$tipo);
}

else{
$m=new usuario();
$m->DarDeAlta($dni,$nombre,$apellido,$contra,$mail,$tipo);
}
header('Location:./menuPrincipalAdmin.php'); ?>*/