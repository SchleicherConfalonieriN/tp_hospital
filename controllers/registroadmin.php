<<?php 
require '../fw/fw.php';
require './Sesion.php';
require '../models/Medico.php';
require './seguridad.php';


	$dni=($_POST['agregar_dni']);
	$nombre=$_POST['agregar_nombre'];
	$apellido=$_POST['agregar_apellido'];
	$contra=$_POST['agregar_contra'];
	$mail=$_POST['agregar_mail'];
	$especialidad=$_POST['agregar_especialidad'];
	$tipo=$_POST['tipo'];


$s=new seguridad();
$dv=$s->dni_validacion($dni);
$nv=$s->nombre_validacion($nombre);
$av=$s->apellido_validacion($apellido);
$cv=$s->contra_validacion($contra);
$mv=$s->email_validacion($mail);
$ev=$s->especialidad_validacion($especialidad);
$tv=$s->tipo_validacion($tipo);


if($dv&&$nv&&$av&&$mv&&$cv&&$ev&&$tv){// condicional de que se valido

		if ($tipo==2){

			$m = new medico();
			$m->registroMedico ($dni, $nombre, $apellido, $contra, $mail, $especialidad,$tipo);
			
			header('Location:./menuPrincipalAdmin.php'); 
			}

		else{
			$m=new usuario();
			$m->DarDeAlta($dni,$nombre,$apellido,$contra,$mail,$tipo);
			}
			header('Location:./menuPrincipalAdmin.php'); 



}else{echo "error de validacion";}
?>